<table>
<thead>
	<tr> 
		<th>Lp.</th>
		<th>Imię i Nazwisko</th>
		<th>Data od:</th>
		<th>Data do:</th>
		<th>Miejsce wyjazdu:</th>
		<th>Miejsce przyjazdu:</th>
	</tr>
</thead>
<tbody>
<?php
	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$sql = "SELECT * FROM Delegacje";
		$polaczenie->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");

		if($rezultat = @$polaczenie->query($sql))
		{
			if($rezultat->num_rows>0)
			{
				while($wiersz = $rezultat->fetch_assoc())
				{
					echo "<tr>";
					foreach ($wiersz as $value) 
					{
						echo "<td>" . $value . "</td>";
					}
					echo "</tr>";
				}
				$rezultat->free_result();
			}
		}
		$polaczenie->close();
	}		
?>		
</tbody>
</table>		