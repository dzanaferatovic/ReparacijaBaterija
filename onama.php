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
			<li><a href="pocetna.php">Pocetna</a></li>
			<li class="aktivna"> O nama </li>
			<li> <a href="cjenovnik.php"> Cjenovnik </a> </li>
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
		<div class="kolona-lijeva">
			<div id="onNaslov">O "Battery repair"</div>
				<div class="vijest">
					<img src="slike/slika2.jpg" alt="slika">
					<p> 
						"Battery repair" je firma koja se bavi reparacijom laptop i akku baterija.
						Nastala je 2015. godine i od tada... bla bla bla HTML5 is a markup language used for structuring 
						and presenting content on the World Wide Web. 
						It is the fifth and current version of the HTML standard.
						It was published in October 2014 by the World Wide Web Consortium (W3C) to improve the language with 
						support for the latest multimedia, while keeping it easily readable by humans - and consistently understood by 
						computers and devices such as web browsers, parsers, etc. HTML5 is intended to subsume not only HTML 4, 
						but also XHTML 1 and DOM Level 2 HTML.
					</p>
				</div>
						
		</div>
		
		<div class="kolona-desna">
			<div class="red-desne">
				<p>
					"Battery repair.doo" <br> Hasana Sućeske 2 <br>+38733111222 <br>+39761223445 <br> batteryrepair@gmail.com <br>
				</p>
			</div>
			
		</div>
	</div>
	

</body>
</html>