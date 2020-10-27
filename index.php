<!DOCTYPE HTML>
<html lang="pl">
<head>
  <meta charset="utf-8"/>
  <title>Zadanie zdalne e-MSI</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body>
	<div id="container">	
		<div id="Lewy">
			<a href="index.php?id=1" id="1">Różne kontrolki HTML<br/></a>
			<a href="index.php?id=2" id="2">Tabela Pracowników<br/></a>
			<a href="index.php?id=3" id="3">Tabela Faktur VAT<br/></a>
			<a href="index.php?id=4" id="4">Tabela Delegacji BD<br/></a>
			<a href="index.php?id=5" id="5">Dane Kontrahentów<br/></a>
		</div>
		<div id="Prawy">	
		<?php
			if(isset($_GET['id'])){ 
				echo"<script language='javascript'>
						var link = document.getElementById('Lewy').getElementsByClassName('active');
						if(link.length>0) link[0].className = link[0].className.replace('active', '');
						document.getElementById(".$_GET['id'].").className='active';
					</script>
					";
			}
			switch($_GET['id']){
				case '1':
					include 'kontrolki.php';
				break;
				
				case '2':
					include 'pracownicy.php';
				break;

				case '3':
					include 'faktury.php';
				break;

				case '4':
					include 'delegacje.php';
				break;

				case '5':
					include 'kontrahenci.php';
				break;
			}
		?>
		</div>	
	</div>
</body>
</html>