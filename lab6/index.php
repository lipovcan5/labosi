<?php
ini_set('xdebug.max_nesting_level', 200);
//bootstrap the application
require_once 'bootstrap.php';

// sustav ne koristi lokalne sesije, nego kriptirane kolačiće kod korisnika. Ovo je lozinka.
$app->add(new \Slim\Middleware\SessionCookie(array('secret' => 'DWA2013')));



// funkcija koja provjerava je li korisnik autenticiran. U osnovi provjerava SESSION vrijednost 
// 'user', i ako nije ulogiran preusmjerava ga na login stranicu
$authenticate = function ($app) {
    return function () use ($app) {
        if (!isset($_SESSION['user'])) {
            $_SESSION['urlRedirect'] = $app->request()->getPathInfo();
            $app->flash('error', 'Login required');
            $app->redirect($app->urlFor('login'));
        }
    };
};

// postavlja neke parametre prije davanja stranice template enginu - u ovom
// slučaju samo postavlja ime korisnika 
$app->hook('slim.before.dispatch', function () use ($app) {
    $user = null;
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }
    $app->view()->setData('user', $user);
});

// Kontrola što se dobiva na stranici na čistom URL-u, bez ikakve dodatne oznake.
// Prije pokretanja ove funkcije poziva se $authenticate funkcija.
// Napomena: isključivo GET metoda radi na ovu stranicu.
$app->get('/', $authenticate($app), function () use ($app) {
    
    // sav kod za stranicu se nalazi u logic/basePage.php
    require_once "logic/basePage.php";
    
    $app->render('basePage');
})->name('basePage');


// Kontrola za stranicu za /login 
// GET za login - netko se tek želi spojiti. Primjetiti kako $app poziva get
$app->get('/login', function () use ($app) {
    $app->render('login');
})->name('login');


// Kontrola za stranicu za /login 
//POST za login - predaja parametara. Primjetiti kako $app poziva post
$app->post('/login', function () use ($app) {
    require_once "logic/auth.php";
    if (isset($_SESSION['user']) && strlen($_SESSION['user']) > 0) {
        $app->redirect($app->urlFor('basePage'));
    } else {
        $app->flashNow("error", "Greška u korisničkom imenu ili lozinci");
        $app->render('login');
    }
});


// Kontrola za logout
// isključivo GET pristup stranici.
$app->get('/logout', $authenticate, function () use ($app) {
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        $app->flashNow("error", "Hvala na korištenju sustava");
        $app->render('login');
    } else {
        $app->flashNow("error", "Za odspajanje je potrebno prvo biti spojeni!");
        $app->render('login');
    }

});

// kontrola za pregled jedne vijesti. Sav kod je umetnut ovdje u kontroler
// isključivo GET pristup stranici
$app->get('/news/:id', $authenticate($app), function($id) use ($app) {
    
    include_once('logic/idiormUse.php');

    // ovo se moglo napisati i drugačije, pogledati dokumentaciji Idiorma
    $vijest = ORM::for_table('vijesti')
        ->select('vijesti.*')
        ->where('id', $id )
        ->find_array();

    $app->view()->setData('vijest', $vijest[0]);
    $app->render('oneNews');
});

$app->view()->setData('basePageURL', $app->urlFor('basePage') );

//let Slim work its magic
$app->run();
