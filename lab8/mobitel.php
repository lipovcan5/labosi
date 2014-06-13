	

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
				<img src="img/logo.png" alt="logo"/>
			</div>
			<div class="status">
				<?php echo $_SESSION['user']; ?>
				<button type="button" onclick="location.href='<?php echo getUrl("odjava"); ?>'">Odjava</button>
			</div>
		</div>
			<div data-role="navbar">
				<ul>
					<li><a href="zivotopis.php">Osobni podaci</a></li>
					<li><a href="popis.php">Popis pacijenata</a></li>
					<li><a href="unos.php">Unos pacijenata</a></li>
					<li><a href="filtriranjePodataka.php">Ispis podataka</a></li>
					<li><a href="grafikoni.php">Grafovi</a></li>
					<li><a href="trazi.php">Pretraga doktora</a></li>
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