<?php
	session_start();
	require_once "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	$polaczenie->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");

	if($polaczenie->connect_errno!=0)
	{
		die("Error: ".$polaczenie->connect_errno);
	}		
?>

<table id="kontrahenci">
<thead> 
	<th>NIP</th>
	<th>REGON</th>
	<th>NAZWA</th>
	<th>CZY PŁATNIK VAT?</th>
	<th>ULICA</th>
	<th>NUMER DOMU</th>
	<th>NUMER MIESZKANIA</th>
</thead>
<tbody>
<?php
	$sql = "SELECT * FROM Kontrahenci";

	if($rezultat = $polaczenie->query($sql))
	{
		if($rezultat->num_rows>0)
		{
			while($wiersz = $rezultat->fetch_assoc())
			{
				if($wiersz['Czy usuniety?']==0){
					if ($wiersz['Czy platnik VAT?'] ==1) $checkedAttr = "checked";
					else $checkedAttr = "";	
					
					echo "<tr>";
					echo "<form method='post' action='zapisz.php?nip=".$wiersz['NIP']."'>";
					echo "<td><input type='text' name='nowynip' class='input' value=" . $wiersz['NIP'] . "></td>";
					echo "<td><input type='number' name='nowyregon' class='input' value=" . $wiersz['REGON'] . "></td>";
					echo "<td><input type='text' name='nowanazwa' class='input' value=" . $wiersz['Nazwa'] . "></td>";
					echo "<td><input type='checkbox' name='nowyczyvat' id='czyplatnikvat' value='1' class='checkbox' " . $checkedAttr . "><label for='czyplatnikvat'>Tak</label></td>";
					echo "<td><input type='text' name='nowaulica' class='input' value=" . $wiersz['Ulica'] . "></td>";
					echo "<td><input type='text' name='nowynrdomu' class='input' value=" . $wiersz['Numer domu'] . "></td>";
					echo "<td><input type='text' name='nowynrmieszkania' class='input' value=" . $wiersz['Numer mieszkania'] . "></td>";
					echo "<td>";
					echo '<a href="zapisz.php?nip='.$wiersz['NIP'].'"><button type="submit" name="zapisz" class="zapiszusun" width="50%" value="Zapisz"/>Zapisz</button></a>';
					echo "</form>";
					echo '<a href="usun.php?nip='.$wiersz['NIP'].'"><button type="submit" name="usun" class="zapiszusun" width="50%" value="Usuń" width="100px"/>Usuń</button></a>';
					echo "</td>";
					echo "</tr>";
				}
			}
			$rezultat->free_result();
		}
	}
	$polaczenie->close();
?>
<tr>
	<form method="post" action="dodaj.php">
		<td><input class="input" id="nip" name="nip" type="text"/></td>
		<td><input class="input" id="regon" name="regon" type="number"/></td>
		<td><input class="input" id="nazwa" name="nazwa" type="text"/></td>
		<td><input class="checkbox" id="czyvat" value="1" name="czyvat" type="checkbox"/><label for="czyvat">Tak</label></td>
		<td><input class="input" id="ulica" name="ulica" type="text"/></td>
		<td><input class="input" id="nrdomu" name="nrdomu" type="text"/></td>
		<td><input class="input" id="nrmieszkania" name="nrmieszkania" type="text"/></td>	
		<td><input type="submit" name="dodaj" class="input" value="Dodaj"/></td>
	</form>
</tr>
</tbody>
</table>	
<?php
if(isset($_SESSION["updated"])){
	echo "<script> alert('Zapisano')</script>";
	unset($_SESSION["updated"]);
}
?>