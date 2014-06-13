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
	 <script type="text/javascript" src="js/search.js"></script>
</head>
<header class="site-header">
	
	<div class="logo">
	<a href="<?php echo getUrl("index"); ?>"><img src="logo.png" width="200px;" alt="logo"></a>
	</div>
	
	<div class="ime">
		<h4> <?php echo $_SESSION['ime']; ?>
		<button><a href="<?php echo getUrl("odjava"); ?>">Odjavi se</a></button></h4>
	</div>


</header>
<body>
<nav class="navigation1">
	
	<div class="main-navigation">
		<a href="login.php"><li>Pocetna</li></a>
		<a href="cv.php"><li>Zivotopis</li></a>
		<a href="popis.php"><li>Popis pacijenata</li></a>
		<a href="unos.php"><li>Unos pacijenata</li></a>
		<a href="filter.php"><li>Filter</li></a>
		<a href="graf.php" target="_blank"><li>Graf M/Ž</li></a>
		<a href="doktori.php"><li>Doktori</li></a>
		<a href="json.php"><li>JSON</li></a>
	</div>

	<div class="sadrzaj2">

	
<h2 style="text-align: center; padding: 30px;">Doktori</h2>
			<form action="trazi.php" method="GET">
				<input type="text" name="ime" placeholder="Ime">
				<br />
				<input type="text" name="prezime"placeholder="Prezime">
				<br />
				<input type="submit" value="Pretrazi">
			</form>


	</div>
</nav>



<footer class="site-footer">
		<h4>Copyright ZKD, 2014</h4>
	</footer>

</body>
</html>