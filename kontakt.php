<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Battery repair</title>
	<link rel="stylesheet" type="text/css" href="Stilovi/stil.css">
	<link rel="stylesheet" type="text/css" href="Stilovi/logo.css">
	<script type="text/javascript" src="Skripte/unos.js"></script>
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
			<li><a href="onama.php"> O nama </a></li>
			<li><a href="cjenovnik.php"> Cjenovnik </a></li>
			<li class="aktivna"> Kontakt </li>
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
		<form id="forma">
			<label for="ime">Ime: </label>
			<input type="text" id="ime" placeholder="Hamo" onkeyup="return validirajUnosImena(this.value)" />
			<br>
			<br>
			
			<label for="prezime">Prezime: </label>
			<input type="text" id="prezime" placeholder="Hamić" onkeyup="return validirajUnosPrezimena(this.value)"/>
			<br>
			<br>
			
			<label for="mail">E-mail: </label>
			<input type="email" id="mail" placeholder="text@gmail.com" onkeyup="return validirajUnosEmaila(this.value)">
			<br>
			<br>
			
			<label for="message">Poruka:</label>
			<br>
			<br>
			<textarea id="message" name="message"> </textarea>
			<br>
			
			<input  id="button1" type="submit" value="Pošalji" /> 
			<input id="button2" type="reset" value="Otkaži"/>
		</form>
	</div>
	

</body>
</html>