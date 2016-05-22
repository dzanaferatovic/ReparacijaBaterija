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
			<li> <a href="pocetna.php">Pocetna</a></li>
			<li> <a href="onama.php"> O nama </a> </li>
			<li> <a href="cjenovnik.php"> Cjenovnik </a> </li>
			<li> <a href="kontakt.php"> Kontakt </a> </li>
			<li class="aktivna">Vanjski linkovi</li>
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
		<ul id="linkovi">
			<li><a href="https://facebook.com"><img src="Slike/ikonica.png" alt="icon"> <br>Facebook "Battery repair" </a> </li>
			<li><a href="https://twitter.com"><img src="Slike/ikonica.png" alt="icon"> <br>Twitter "Battery repair" </a> </li>
			<li><a href="https://www.linkedin.com"><img src="Slike/ikonica.png" alt="icon"> <br>Linkedin "Battery repair" </a> </li>
			<li><a href="https://olx.ba"><img src="Slike/ikonica.png" alt="icon"> <br>Olx.ba "Battery repair" </a> </li>
		</ul>
		
	</div>
	
</body>
</html>