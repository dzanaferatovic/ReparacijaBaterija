  <?php
  session_start();

  if(isset($_POST['potvrdi']) && $_POST['potvrdi']=="Potvrdi")
  {
  	$file = fopen("Podaci/korisnici.txt","r");
  	while(!feof($file)){
  		$provjeri=fgetcsv($file);

  		if($provjeri[0]==$_POST['username']){
  			if($provjeri[1]==md5($_POST['password'])){
  				$_SESSION['user']=$_POST['username'];
  				header("Location: pocetna.php"); 
  				die();
  			}

  			else {
  				$pogresanPw="Unijeli ste pogresan password!";
  				echo "<script type='text/javascript'>alert('$pogresanPw');</script>";
  			}
  		}

  		else {
  				$pogresanUs="Username ne postoji!";
  				echo "<script type='text/javascript'>alert('$pogresanUs');</script>";
  		}
  	}
  	fclose($file);
  }

  else if(isset($_GET['potvrdi']) && $_GET['potvrdi']==='logout')
  {
  	session_destroy();
  	header("Location: pocetna.php"); 
  	die();
  }
  ?>


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
  			<li> <a href="vanjskilinkovi.php"> Vanjski linkovi </a> </li>
  			<li class="aktivna"> Login </a> </li>
  		</ul>
  	</div>


  	<div class="sredina">
  		<form id="forma" action="login.php" method="post">

  			<label for="username">Username: </label>
  			<input type="text" name="username" placeholder="korisnicko ime"/>
  			<br>
  			<br>

  			<label for="password">Password: </label>
  			<input type="password" name="password" placeholder="korisnicka sifra"/>
  			<br>
  			<br>

  			<input  id="buttonLogin" type="submit" value="Potvrdi" name="potvrdi"/> 

  		</form>		
  	</div>

  </body>
  </html>