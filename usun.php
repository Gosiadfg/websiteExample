<?php		  
	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	$polaczenie->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");

	if($polaczenie->connect_errno!=0)
	{
		die("Error: ".$polaczenie->connect_errno);
	}		
	
	$nip = $_GET['nip'];

	$sql = "UPDATE Kontrahenci SET `Czy usuniety?`=1 WHERE NIP='$nip'";
	//$sql = "DELETE FROM Kontrahenci WHERE NIP='$nip'";

	$rezultat = $polaczenie->query($sql);
	
	if(!$rezultat) throw new Exception($polaczenie->error);
	
	$polaczenie->close();
	header('Location: index.php?id=5');
?>		