<?php


// Inialize session
session_start();


// Retrieve username and password from database according to user's input
$username="ivan";
$password="pero";

if(!(isset($_SESSION['usr']) && isset($_SESSION['pswd']))) {
if ($_POST['usr']==$username && $_POST['pswd'] == $password) {
// Set username session variable
$_SESSION['usr'] = $_POST['usr'];
$_SESSION['pswd'] = $_POST['pswd'];
}else
header('Location: login.html');
}

if(empty($_GET["page"]))
	$page = "index";
else
	$page = $_GET["page"];

function getUrl($page){
	return "?page=$page";
}

$neki_sadrzaj = "";
$title = "";

switch($page){
	case "index":
		$neki_sadrzaj = "<b>Dobro došlo ".$username."</b>. <br /><br />
						Korisničko ime : ".$username." <br />
						Lozinka : ".$password.""  ;
		$title = "Pocetna";
	break;


	case "cv":
		$neki_sadrzaj = "<p>skdjhfskdjhfkjdfh</p>";


	case "odjava":
		session_unset();
		session_destroy();
		header("location:login.html");
	break;


	/* Ovo se ozvodi ako se upise nepostojeca stranica */
	default:
		$neki_sadrzaj = "Stranica ne postoji";
}


?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	 <meta charset="UTF-8" />
	 <link rel="stylesheet" href="stil.css">
</head>
<header class="site-header">
	
	<div class="logo">
	<a href="<?php echo getUrl("index"); ?>"><img src="logo.png" width="200px;" alt="logo"></a>
	</div>
	
	<div class="ime">
		<h4> <?php echo $_SESSION["usr"]; ?>
		<button><a href="<?php echo getUrl("odjava"); ?>">Odjavi se</a></button></h4>
	</div>


</header>
<body>
<nav class="navigation1">
	
	<div class="main-navigation">
		<a href="login.php"><li>Početna</li></a>
		<a href="cv.php"><li>Životopis</li></a>
		<a href="popis.php"><li>Popis pacijenata</li></a>

	</div>
	<div class="sadrzaj">
		<a href="#osobni"> Osobni podaci</a>
		<a href="#skolovanje">Školovanje</a>
		<a href="#radno-iskustvo">Radno iskustvo</a>
		<a href="#znanje">Znanje</a>

		<h2 id="osobni">Osobni podaci</h2>
		<b>Ime:</b> Ivan <br />
		<b>Prezime:</b> Marinić <br />
		<b>Mjesto rođenja:</b> Zagreb <br />
		<b>Datum rođenja:</b> 29.04.1992 <br /><br /> 

		<h2 id="skolovanje">Školovanje</h2>
		<b>Osnovna škola:</b> Eugen Kvaternik (Rakovica) <br />
		<b>Srednja škola:</b> Tehničar za računalstvo (Slunj) <br />
		<b>Fakultet:</b> Tehničko veleučilište u Zagreb<br /><br />

		<h2 id="radno-iskustvo">Radno iskustvo</h2>
		<b>Prodavač na Plitvičkim jezerima dvije sezone</b><br /><br />

		<h2 id="znanje"> Znanja</h2>
		Dobro rukovanje s računalom <br />
						Poznavnanje Microsoftovih alata <br />
						Servis računala i mobitela <br /><br /><br />
						


	</div>
</nav>

<footer class="site-footer">
		<h4>Copyright ZKD, 2014</h4>
	</footer>

</body>
</html>