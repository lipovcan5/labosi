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

	</div>

	<div class="sadrzaj2">

	
<h2 style="text-align: center; padding: 30px;">Upis pacijenata</h2>
			<form action="unosPodataka.php" method="POST">
				<table class="unos">
					<tr>
						<td><label for="name">Ime:</label></td>
						<td><input type="text" name="firstname" id="name"></td>
					</tr>
					<tr>
						<td><label for="surname">Prezime:</label></td>
						<td><input type="text" name="lastname" id="surname"></td>
					</tr>
					<tr>
						<td><label for="spol">Spol:</label></td>
						<td><input type="radio" name="gender" value="M" id="spol">M<br>
							<input type="radio" name="gender" value="Ž" id="spol">Ž</td>
					<tr>
						<td><label for="date">Datum rođenja:</label></td>
						<td><input type="date" name="birthDate" id="date"></td>
					</tr>
					<tr>
						<td><label for="city">Mjesto rođenja:</label></td>
						<td><input type="text" name="birthPlace" id="city"></td>
					</tr>
					<tr>
						<td><label for="adresa">Adresa i mjesto stanovanja:</label></td>
						<td><input type="text" name="address" id"adresa"></td>
					</tr>
					<tr>
						<td><label for="krvnaGrupa">Krvna grupa:</label></td>
						<td><select name="bloodGroup">
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="AB">AB</option>		
								<option value="0">0</option>			
							</select>
							<select name="bloodType">
								<option value="+">+ (pos)</option>
								<option value="-">- (neg)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="bolesti">Prijašnje medicinske tegobe<br /> (srčane tegobe, talk, virusne, bolesti (Hepatitis, HIV)):</label></td>
						<td>
							<input type="radio" name="diseases" value="DA" id="bolesti">Da<br>
							<input type="radio" name="diseases" value="NE" id="bolest">Ne<br>
						</td>
					</tr>	
					<tr>
						<td><label for="tegobe">Koje tegobe osoba ima:</label></td>
						<td><input type="text" name="diseasesDescription" id"tegobe"></td>
					</tr>
					<tr>
						<td><label for="alergija">Jeli osoba alergična na lijekove:</label></td>
						<td><input type="radio" name="allergy" value="DA" id="alergija">Da<br />
						<input type="radio" name="allergy" value="NE" id="alergija">NE<br />
						<input type="radio" name="allergy" value="NEZNA" id="alergija">Ne zna</td>
					</tr>
					<tr>
						<td><label for="lijek">Na koje lijekove je osoba alergična:</label></td>
						<td><input type="text" name="allergyDescription" id="lijek"></td>
					</tr>
						<td></td>
						<td><input type="submit" value="Spremi"></td>
					</tr>
				</table>
			</form>
	</div>
</nav>



<footer class="site-footer">
		<h4>Copyright ZKD, 2014</h4>
	</footer>

</body>
</html>