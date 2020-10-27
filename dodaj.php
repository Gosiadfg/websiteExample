<?php
	require_once "connect.php";
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	$polaczenie->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");

	if($polaczenie->connect_errno!=0)
	{
		die("Error: ".$polaczenie->connect_errno);
	}		
	
	$nip = $_POST['nip'];
	if($nip!="")
	{
		$regon = $_POST['regon']; 
		$nazwa = $_POST['nazwa'];
		$czyvat = $_POST['czyvat']; 
		$ulica = $_POST['ulica'];
		$nrdomu = $_POST['nrdomu']; 
		$nrmieszkania = $_POST['nrmieszkania'];
		
		if($regon==""){
			$sql = "INSERT INTO Kontrahenci VALUES ('$nip', NULL, '$nazwa', '$czyvat', '$ulica', '$nrdomu', '$nrmieszkania', 0)";
		}
		else{
			$sql = "INSERT INTO Kontrahenci VALUES ('$nip', '$regon', '$nazwa', '$czyvat', '$ulica', '$nrdomu', '$nrmieszkania', 0)";
		}
	
		$rezultat = $polaczenie->query($sql);
		if(!$rezultat) throw new Exception($polaczenie->error);
	}
	
	$polaczenie->close();
	header('Location: index.php?id=5');
?>