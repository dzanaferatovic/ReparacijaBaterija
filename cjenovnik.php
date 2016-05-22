<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Battery repair</title>
	<link rel="stylesheet" type="text/css" href="Stilovi/stil.css">
	<link rel="stylesheet" type="text/css" href="Stilovi/logo.css">
</head>

<body>
	<div class="meni">
		<div class="logo">
			<div class="baterija">
				<div class="battery charging"> </div>
				<div class="battery-veliki"> </div>
				<div class="battery-mali"> </div>
			</div>
			
			<div class="naslov">
				<div id="tekstlogo"> B a t t e r y&nbsp;&nbsp;&nbsp;r e p a i r </div>
			</div>
		</div>
		
		<ul>
			<li><a href="pocetna.php">Pocetna</a> </li>
			<li> <a href="onama.php">  O nama </a> </li>
			<li class="aktivna"> Cjenovnik </li>
			<li> <a href="kontakt.php"> Kontakt </a> </li>
			<li> <a href="vanjskilinkovi.php"> Vanjski linkovi </a> </li>
			<?php
        		if(isset($_SESSION['user'])){
        			echo "<li> <a href='dodajnovost.php'>Dodaj novost</a><li>";
          			echo "<li> <a href='login.php?potvrdi=logout'>Logout</a> <li>";
        		}
        		else{
          			echo "<li> <a href='login.php'>Login</a> </li>";
        		}
       		?>
		</ul>
	</div>
	
	<div class="sredina">
			<div id="cjNaslov">Cjenovnik reparacija za najčesće tražene modele</div>
			
			<table id="tabela">
				<tr>
					<th>Proizvođač</th>
					<th>Tip</th>
					<th>Laptop/akku</th>
					<th>Trajanje reparacije</th>
					<th>Cijena</th>
				</tr>
				
				
				<tr>
					<td>Dell</td>
					<td>A18292</td>
					<td>Laptop</td>
					<td>3 dana</td>
					<td>70KM</td>
				</tr>
				
				<tr>
					<td class="parni">HP</td>
					<td class="parni">B3948</td>
					<td class="parni">Laptop</td>
					<td class="parni">4dana</td>
					<td class="parni">75KM</td>
				</tr>
				
				<tr>
					<td>Bosch</td>
					<td>O99O</td>
					<td>Akku</td>
					<td>3dana</td>
					<td>120KM</td>
				</tr>
				
				<tr>
					<td class="parni">Apple</td>
					<td class="parni">A1237</td>
					<td class="parni">Laptop</td>
					<td class="parni">2dana</td>
					<td class="parni">100KM</td>
				</tr>
			</table>
		</div>
	

</body>
</html>