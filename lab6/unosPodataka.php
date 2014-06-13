<?php

    echo $_POST['firstname']."','".$_POST['lastname']."','".$_POST['gender']."','".$_POST['birthDate']."','".$_POST['birthPlace']."','".$_POST['address']."','".$_POST['bloodGroup']."','".$_POST['bloodType']."','".$_POST['diseases']."','".$_POST['diseasesDescription']."','".$_POST['allergy']."','".$_POST['allergyDescription']."')";

	$link = mysqli_connect('localhost','root','root','ljekarna');

	if(mysqli_connect_errno()) {
		printf("Connect faild: %s\n", mysqli_connect_error());
		exit();
	}

	$query="INSERT INTO podaci (ime,prezime,spol,datumRodenja,mjestoRodenja,adresa,krvnaGrupa,tipKrvi,tegobe,opisTegobe,alergije,opisAlergije) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

	$stmt = mysqli_stmt_init($link);

	if(mysqli_stmt_prepare($stmt,$query)) {
		mysqli_stmt_bind_param($stmt,'ssssssssssss',$_POST['firstname'],$_POST['lastname'],$_POST['gender'],$_POST['birthDate'],$_POST['birthPlace'],$_POST['address'],$_POST['bloodGroup'],$_POST['bloodType'],$_POST['diseases'],$_POST['diseasesDescription'],$_POST['allergy'],$_POST['allergyDescription']);
		$test = mysqli_stmt_execute($stmt);
	}

	if($test==true) echo('upisano');
	else echo ('greška!');
//	$query="INSERT INTO podaci (ime,prezime,spol,datumRodenja,mjestoRodenja,adresa,krvnaGrupa,tipKrvi,tegobe,opisTegobe,alergije,opisAlergije) VALUES ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['gender']."','".$_POST['birthDate']."','".$_POST['birthPlace']."','".$_POST['address']."','".$_POST['bloodGroup']."','".$_POST['bloodType']."','".$_POST['diseases']."','".$_POST['diseasesDescription']."','".$_POST['allergy']."','".$_POST['allergyDescription']."')";
//	$result=mysqli_query($link,$query) or die('Error qouering database');

	mysqli_close($link);
?>