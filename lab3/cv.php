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

 	<script>
	function prikazi(_id) {
		var x = document.getElementById(_id);
		/*if(x.style.visibility == 'visible')
			x.style.visibility = 'hidden';
		else x.style.visibility = 'visible';*/
		if(x.style.display == 'table')
			x.style.display = 'none';
		else x.style.display = 'table';
	}
	function sakrij(_id) {
		var x = document.getElementById(_id);
		x.style.zIndex = -9999;
		x.style.visibility = 'hidden';
	}
	</script>
</head>
<header class="site-header">
	
	<div class="logo">
	<a href="<?php echo getUrl("index"); ?>"><img src="logo.png" width="200px;" alt="logo"></a>
	</div>
	
	<div class="ime">
		<h4> <?php echo $_SESSION["ime"]; ?>
		<button><a href="<?php echo getUrl("odjava"); ?>">Odjavi se</a></button></h4>
	</div>


</header>
<body>
<nav class="navigation1">
	<div id="reklama">
			<h1>OVO JE REKLAMA</h1>
			<form><button type="button" onclick="sakrij('reklama')">Zatvori</button></form>
		</div>
	<div class="main-navigation">
		<a href="login.php"><li>Početna</li></a>
		<a href="cv.php"><li>Životopis</li></a>
		<a href="popis.php"><li>Popis pacijenata</li></a>
		<a href="unos.php"><li>Unos pacijenata</li></a>

	</div>
	
	<div class="sadrzaj">
	<div class="sadrzaj-navigation">
		<a href="#osobni"> Osobni podaci</a>
		<a href="#skolovanje">Školovanje</a>
		<a href="#radno-iskustvo">Radno iskustvo</a>
		<a href="#znanje">Znanje</a>
	</div>
		<p onclick="prikazi('osobni')">Osobni podaci</p>
				<div id="osobni">
					<table class="cv">			
					<tr>
							<td><b>Ime i prezime:</td>
							<td>Ivan Marinić</td>
						</tr>
						<tr>
							<td><b>Mjesto:</td>
							<td>Lipovača</td>
						</tr>
						<tr>
							<td><b>Datum rođenja:</td>
							<td>29.04.1992.</td>
						</tr>
					</table>
				</div>

				<p onclick="prikazi('skolovanje')">Podaci o školovanju</p>
				<div id="skolovanje">
					<table class="cv">
						</tr>
						<tr>
							<td><b>Osnovna škola:</td>
							<td>Osnovna škola Eugena Kvaternika Rakovica</td>
						</tr>
						<tr>
							<td><b>Srednja škola:</td>
							<td>Srednja škola Slunj</td>
						</tr>
						<tr>
							<td><b>Fakultet:</td>
							<td>Tehničko veleučilište u Zagrebu</td>
						</tr>
					</table>
				</div>
				
				<p onclick="prikazi('znanje')">Znanja i vještine</p>
				<div id="znanje">
					<table class="cv">
						</tr>
						<tr>
							<td><b>Programiranje:</td>
							<td>C, C#, ASP.NET, Java</td>
						</tr>
						<tr>
							<td><b>Baze podataka:</td>
							<td>MySQL</td>
						</tr>
						<tr>
							<td><b>Dizajniranje:</td>
							<td>HTML, CSS</td>
						</tr>
					</table>
				</div>
		
						


	</div>
</nav>

<footer class="site-footer">
		<h4>Copyright ZKD, 2014</h4>
	</footer>

</body>
</html>