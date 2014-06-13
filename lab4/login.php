<?php


// Inialize session
session_start();



$link = mysqli_connect('localhost','root','root','ljekarna');

	if(mysqli_connect_errno()) {
		printf("Connect faild: %s\n", mysqli_connect_error());
		exit();
	}




$result = mysqli_query($link,"SELECT * FROM korisnici");
$a=mysqli_num_rows($result);


$i=0;
while($row = mysqli_fetch_array($result))
  {
  $korisnik[$i]=$row['username'];	
  $lozinka[$i]=$row['password'];
  $ime[$i]=$row['name'];	
  $i++;
  }
 
 


 



// Retrieve username and password from database according to user's input
if(!(isset($_SESSION['usr']) && isset($_SESSION['pswd']))) {
for ($j=0; $j < $a; $j++) { 
	if($_POST['usr']==$korisnik[$j] && md5($_POST['pswd']) == $lozinka[$j]){
		$username=$korisnik[$j];
		$password=$lozinka[$j];
		$ime2=$ime[$j];
	}
}


if ($_POST['usr']==$username && md5($_POST['pswd']) == $password) {
// Set username session variable
$_SESSION['usr'] = $_POST['usr'];
$_SESSION['pswd'] = $_POST['pswd'];
$_SESSION['ime'] = $ime2;
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
		$neki_sadrzaj = "<b>Dobro došao ".$_SESSION['ime']."</b>. <br /><br />
						Korisničko ime : ".$_SESSION['usr']." <br />
						Lozinka : ".$_SESSION['pswd'].""  ;
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
		<a href="login.php"><li>Početna</li></a>
		<a href="cv.php"><li>Životopis</li></a>
		<a href="popis.php"><li>Popis pacijenata</li></a>
		<a href="unos.php"><li>Unos pacijenata</li></a>
		<a href="filter.php"><li>Filter</li></a>
		<a href="graf.php" target="_blank"><li>Graf M/Ž</li></a>

	</div>
	<div class="sadrzaj">
		<?php echo $neki_sadrzaj ?>
	</div>
</nav>

<footer class="site-footer">
		<h4>Copyright ZKD, 2014</h4>
	</footer>

</body>
</html>