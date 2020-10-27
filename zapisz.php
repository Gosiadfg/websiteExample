<?php
	session_start();
	
	require_once "connect.php";
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	$polaczenie->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");

	if($polaczenie->connect_errno!=0)
	{
		die("Error: ".$polaczenie->connect_errno);
	}		
	$nip = $_GET['nip'];

	$nowyNip = $_POST['nowynip'];
	$regon = $_POST['nowyregon']; 
	$nazwa = $_POST['nowanazwa'];
	$czyvat = $_POST['nowyczyvat']; 
	$ulica = $_POST['nowaulica'];
	$nrdomu = $_POST['nowynrdomu']; 
	$nrmieszkania = $_POST['nowynrmieszkania'];

	if($regon==""){
		$sql = "UPDATE Kontrahenci SET NIP='$nowyNip', REGON=NULL, Nazwa='$nazwa', `Czy platnik VAT?`='$czyvat', Ulica='$ulica', `Numer domu`='$nrdomu', `Numer mieszkania` = '$nrmieszkania' WHERE NIP='$nip'";
	}
	else{
		$sql = "UPDATE Kontrahenci SET NIP='$nowyNip', REGON='$regon', Nazwa='$nazwa', `Czy platnik VAT?`='$czyvat', Ulica='$ulica', `Numer domu`='$nrdomu', `Numer mieszkania` = '$nrmieszkania' WHERE NIP='$nip'";
	}
	
	$rezultat = $polaczenie->query($sql);
	
	if(!$rezultat){
		throw new Exception($polaczenie->error);
	}
	else{
		$_SESSION["updated"]=1;
	}

	$polaczenie->close();
	header('Location: index.php?id=5');
?>	