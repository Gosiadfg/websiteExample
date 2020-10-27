<table id="fakturyVAT">
<thead>
	<tr> 
		<th>Lp.</th>
		<th>Opis</th>
		<th>MPK</th>
		<th>Kwota Netto</th>
		<th>Ilość</th>
		<th>VAT</th>
		<th>Kwota Brutto</th>
		<th>Wartość Netto</th>
		<th>Wartość Brutto</th>
	</tr>
</thead>
<tbody>
	<tr>
		<td>1</td>
		<td>Produkt 1</td>
		<td>9</td>
		<td><input id="netto1" class="input" name="1" type="number" value="100.00" oninput="calculate(this)"/></td>
		<td><input id="ilosc1" class="input" name="1" type="number" value="1" oninput="calculate(this)"/></td>
		<td>
			<select id="1" name="1" onchange="calculate(this)">
				<option value="0">ZW</option>
				<option value="0">NP.</option>
				<option value="0">0%</option>
				<option value="3">3%</option>
				<option value="8">8%</option>
				<option value="23">23%</option>
			</select>
		</td>
		<td id="brutto1">100.00</td>
		<td id="wartoscnetto1">100.00</td>
		<td id="wartoscbrutto1">100.00</td>
	</tr>
	<tr>
		<td>2</td>
		<td>Produkt 2</td>
		<td>15</td>
		<td><input id="netto2" class="input" name="2" type="number" value="1500.50" oninput="calculate(this)"/></td>
		<td><input id="ilosc2" class="input" name="2" type="number" value="1" oninput="calculate(this)"/></td>
		<td>
			<select id="2" name="2" onchange="calculate(this)">
				<option value="0">ZW</option>
				<option value="0">NP.</option>
				<option value="0">0%</option>
				<option value="3">3%</option>
				<option value="8">8%</option>
				<option value="23">23%</option>
			</select>
		</td>
		<td id="brutto2">1500.50</td>
		<td id="wartoscnetto2">1500.50</td>
		<td id="wartoscbrutto2">1500.50</td>
	</tr>
	<tr>
		<td>3</td>
		<td>Produkt 3</td>
		<td>11</td>
		<td><input id="netto3" class="input" name="3" type="number" value="1390.99" oninput="calculate(this)"/></td>
		<td><input id="ilosc3" class="input" name="3" type="number" value="1" oninput="calculate(this)"/></td>
		<td>
			<select id="3" name="3" onchange="calculate(this)">
				<option value="0">ZW</option>
				<option value="0">NP.</option>
				<option value="0">0%</option>
				<option value="3">3%</option>
				<option value="8">8%</option>
				<option value="23">23%</option>
			</select>
		</td>
		<td id="brutto3">1390.99</td>
		<td id="wartoscnetto3">1390.99</td>
		<td id="wartoscbrutto3">1390.99</td>
	</tr>
	<tr>
		<td>4</td>
		<td>Produkt 1</td>
		<td>14</td>
		<td><input id="netto4" class="input" name="4" type="number" value="100.00" oninput="calculate(this)"/></td>
		<td><input id="ilosc4" class="input" name="4" type="number" value="2" oninput="calculate(this)"/></td>
		<td>
			<select id="4" name="4" onchange="calculate(this)">
				<option value="0">ZW</option>
				<option value="0">NP.</option>
				<option value="0">0%</option>
				<option value="3">3%</option>
				<option value="8">8%</option>
				<option value="23">23%</option>
			</select>
		</td>
		<td id="brutto4">100.00</td>
		<td id="wartoscnetto4">200.00</td>
		<td id="wartoscbrutto4">200.00</td>
	</tr>
	<tr>
		<td>5</td>
		<td>Produkt 2</td>
		<td>16</td>
		<td><input id="netto5" class="input" name="5" type="number" value="1500.50" oninput="calculate(this)"/></td>
		<td><input id="ilosc5" class="input" name="5" type="number" value="2" oninput="calculate(this)"/></td>
		<td>
			<select id="5" name="5" onchange="calculate(this)">
				<option value="0">ZW</option>
				<option value="0">NP.</option>
				<option value="0">0%</option>
				<option value="3">3%</option>
				<option value="8">8%</option>
				<option value="23">23%</option>
			</select>
		</td>
		<td id="brutto5">1500.50</td>
		<td id="wartoscnetto5">3001.00</td>
		<td id="wartoscbrutto5">3001.00</td>
	</tr>
</tbody>
</table>
<button type="submit" onclick="buttonClick()" value="Powyżej 1000,00 zł Netto"/>Powyżej 1000,00 zł Netto</button>	
<script>
function calculate(select) { 					
	var kwotanetto = document.getElementById("netto"+select.name).value;
	var ilosc = document.getElementById("ilosc"+select.name).value;
	var kwotabrutto = kwotanetto*(parseInt(select.value)+100)/100;
	
	document.getElementById("brutto"+select.name).innerHTML = kwotabrutto.toFixed(2);		
	document.getElementById("wartoscnetto"+select.name).innerHTML = (kwotanetto*ilosc).toFixed(2);	
	document.getElementById("wartoscbrutto"+select.name).innerHTML = (kwotabrutto*ilosc).toFixed(2);
} 	
function buttonClick() { 				
	var tr = document.getElementById("fakturyVAT").getElementsByTagName('tbody')[0].getElementsByTagName('tr');
	
	for(i=0;i<tr.length;i++)
	{
		if(document.getElementById("netto"+(i+1)).value>1000)
		{
			tr[i].style.backgroundColor = "green"; 
		}
		else if (tr[i].style.backgroundColor == "green")
		{
			tr[i].style.backgroundColor = "lightblue";
		}
	}	
}
</script>