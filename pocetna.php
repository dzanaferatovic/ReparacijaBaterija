<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Battery repair</title>
	<link rel="stylesheet" type="text/css" href="Stilovi/stil.css">
	<link rel="stylesheet" type="text/css" href="Stilovi/logo.css">
	<script type="text/javascript" src="Skripte/skripta.js"></script>
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
			<li class="aktivna">Pocetna</li>
			<li> <a href="onama.php"> O nama </a> </li>
			<li> <a href="cjenovnik.php"> Cjenovnik </a> </li>
			<li> <a href="kontakt.php"> Kontakt </a> </li>
			<li> <a href="vanjskilinkovi.php"> Vanjski linkovi </a> </li>
			<?php
        		if(isset($_SESSION['user'])){
        			echo "<li> <a href='dodajnovost.php'>Dodaj novost</a><li>";
          			echo "<li> <a href='login.php?potvrdi=logout'>Logout</a><li>";
        		}
        		else{
          			echo "<li> <a href='login.php'>Login</a> </li>";
        		}
       		?>
		</ul>
	</div>
	
	<div class="sredina">
		<div class="kolona-lijeva">
			<h3>Novosti</h3>
			<div id="odabirFiltera">
	        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Filter:
	            <select id="odaberi" onchange="filtriraj()">
	                <option value="sve">Sve novosti</option>
	                <option value="danasnje">Današnje novosti</option>
	                <option value="sedmicne">Sedmične novosti</option>
	                <option value="mjesecne">Mjesečne novosti</option>
	            </select>
        	</div>

        	<form id="formaSortiranja" action="pocetna.php" method="get">
        	<div id="odabirFiltera">
        	Sortiraj po:
        	<a href="pocetna.php">datumu&nbsp;</a>
        	<a href="pocetna.php?sortiranje=abecedno">abecedi</a>

        	</div>
        	</form>

        	
        	<?php
        	if(!file_exists("Podaci/novosti.csv")){
        		exit();
        	}

        	$file=fopen("Podaci/novosti.csv","r");
        	$novosti=array();

        	while(!feof($file)) {
        		$novostN=fgetcsv($file);

        		if($novostN[0]==' ') {
        			print "<script type='text/javascript'>alert('Nema novosti');</script>";
        		}
        		else if($novostN[0]!='') {
        			$novosti[]=$novostN;
        		}
        	}
        	fclose($file);

        	
        	function poDatumu($novost1, $novost2) {
        		$datumPrve=strtotime($novost1[3]);
        		$datumDruge=strtotime($novost2[3]);
        		return $datumDruge>$datumPrve;
        	}

        	function poNaslovu($novost1, $novost2) {
        		$naslovPrve=$novost1[0];
        		$naslovDruge=$novost2[0];

        		return $naslovDruge<$naslovPrve;
        	}

			if(isset($_GET['sortiranje']) && $_GET['sortiranje']=="abecedno") {
				//sortirajpoabecedi
				usort($novosti,"poNaslovu");

			}
			else {
				//sortiraj po datumu
				usort($novosti,"poDatumu");
		
			}

        	for($i=0; $i<count($novosti); $i++) {
        		print "<div class=\"vijest\">";
        		print "<p class=\"nazivVijesti\">";
        		print $novosti[$i][0];
        		print "</p>";
        		print "<img src=".$novosti[$i][2]." alt=\"slika\">";
        		print "<p class=\"vrijemeRijecima\"> </p>";
        		print "<p>";
        		print $novosti[$i][1];
        		print "</p>";
        		print "<p> Autor:".$novosti[$i][4]."</p>";
        		print "<p class=\"vrijemeVijesti\">".$novosti[$i][3]."</p>";
        		print "</div>";
        	}
        	?>    	
		</div>
		
		<div class="kolona-desna">
			<div class="red-desne">
				<p>
					"Battery repair.doo" <br> Hasana Sućeske 2 <br>+38733111222 <br>+39761223445 <br> batteryrepair@gmail.com <br>
				</p>
			</div>
			
			<div class="red-desne">
				<div class="komentarWrap">
						<label id="klabela" for="komentar">Ukoliko imate neki komentar ili pitanje, upišite u polje ispod: </label>
						<textarea id="komentar" name="komentar" cols="60" rows="8" > </textarea>
						<input type="submit" id="dugme" value="Pošalji" /> 
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>