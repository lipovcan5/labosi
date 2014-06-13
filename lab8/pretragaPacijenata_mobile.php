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
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/grid.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>

</head>

<body>
	<div data-role="page" id="pageone">
		<div div data-role="header">
			<div class="ui-content">
			<div class="logo">
				<img src="logo.png" alt="logo" style="width:150px; height:100px; " />
			</div>
			<div class="status">

	
			</div>
		</div>
			<div data-role="navbar">
				<ul>
				<a href="login.php"><li>Početna</li></a>
				<a href="cv.php"><li>Životopis</li></a>
				<a href="popis.php"><li>Popis pacijenata</li></a>
				<a href="unos.php"><li>Unos pacijenata</li></a>
				<a href="filter.php"><li>Filter</li></a>
				<a href="graf.php" target="_blank"><li>Graf M/Ž</li></a>
				<a href="doktori.php"><li>Doktori</li></a>
				<a href="json.php"><li>JSON</li></a>
				<a href="pretragaPacijenata_mobile.php"><li>Pretraga mobitel</li></a>
				</ul>
			</div>
		</div>


		<div data-role="main" class="ui-content">
	
			<div class="ui-content">
				<h2>Pretraga pacijenata</h2>
				<form method="POST" action="prikazPretrage_mobile.php">
					
					<label for="name">Ime</label>
					<input type="text" name="firstname" id="name">
			
					<label for="surname">Prezime</label>
					<input type="text" name="lastname" id="surname">

					<label for="bloodGroup">Krvna grupa</label>
					<select name="bloodGroup" id="bloodGroup">
							<option value=""></option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="AB">AB</option>		
							<option value="0">0</option>			
					</select>
				
					<label for="bloodType">Tip krvi</label>
					<select name="bloodType" id="bloodType">
						<option value=""></option>
						<option value="+">+ (pos)</option>
						<option value="-">- (neg)</option>
					</select>
			
					<input type="submit" value="Pronađi">
				</form>
			</div>
		</div>

		<div data-role="footer">
			<h4>Copyright ZKD, 2014</h4>
		</div>
	</div>
</body>
</html>