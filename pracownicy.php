<table id="pracownicy">
<thead>
	<tr>
		<th>Lp.</th>
		<th>Imię</th>
		<th>Nazwisko</th>
		<th>Stanowisko</th>
		<th>Data zatrudnienia</th>
		<th>Ilość dni urlopowych</th>
	</tr>
</thead>
<tbody>
	<tr> 
		<td>1</td>
		<td>Anna</td>
		<td>Kowalska</td>
		<td>Sekretarka</td>
		<td>1.02.2020</td>
		<td>6</td>
	</tr>
	<tr> 
		<td>2</td>
		<td>Jan</td>
		<td>Nowak</td>
		<td>Konserwator</td>
		<td>20.01.2020</td>
		<td>14</td>
	</tr>
	<tr> 
		<td>3</td>
		<td>Izabela</td>
		<td>Wiśniewska</td>
		<td>Księgowa</td>
		<td>17.08.2020</td>
		<td>20</td>
	</tr>
	<tr> 
		<td>4</td>
		<td>Jakub</td>
		<td>Nowakowski</td>
		<td>Informatyk</td>
		<td>1.10.2020</td>
		<td>26</td>
	</tr>
	<tr> 
		<td>5</td>
		<td>Grzegorz</td>
		<td>Kowal</td>
		<td>Elektryk</td>
		<td>4.05.2020</td>
		<td>2</td>
	</tr>
</tbody>
</table>
<label for="ColorPickerOdd">Tło wierszy nieparzystych:</label>
<input id="ColorPickerOdd" type="color" value="#ADD8E6" onInput="changeColorOdd(this)"/><br/>
<label for="ColorPickerEven">Tło wierszy parzystych:</label>
<input id="ColorPickerEven" type="color" value="#ADD8E6" onInput="changeColorEven(this)"/>
<script>
function changeColorOdd(picker) { 				
	var tr = document.getElementById("pracownicy").getElementsByTagName('tbody')[0].getElementsByTagName('tr');
	
	for(i=0;i<tr.length;i++)
	{
		if(i%2==0) tr[i].style.backgroundColor = picker.value; 
	}  
} 
function changeColorEven(picker) { 				
	var tr = document.getElementById("pracownicy").getElementsByTagName('tbody')[0].getElementsByTagName('tr');
	
	for(i=0;i<tr.length;i++)
	{
		if(i%2!=0) tr[i].style.backgroundColor = picker.value; 
	}						 
}		
</script>					