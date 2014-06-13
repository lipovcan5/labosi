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
		<h4> <?php echo $_SESSION["usr"]; ?>
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

	</div>

	<div class="sadrzaj2">

	
<?php
				echo ('<table class="unos">
					<tr>
						<td>');
							echo $_POST['firstname'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['lastname'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['gender'];
				echo('</td>
					<tr>
						<td>');
							echo $_POST['birthDate'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['birthPlace'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['address'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['bloodGroup'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['bloodType'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['diseases'];
				echo('</td>
					</tr>	
					<tr>
						<td>');
							echo $_POST['diseasesDescription'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['allergy'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['allergyDescription'];
				echo('</td>
					</tr>
				</table>');
			?>
	</div>
</nav>



<footer class="site-footer">
		<h4>Copyright ZKD, 2014</h4>
	</footer>

</body>
</html>