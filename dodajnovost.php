<?php session_start(); ?>

<?php
if(isset($_POST['novostNova']) && $_POST['unesi']=="Spasi") {
  $novosti= array(htmlentities($_REQUEST['novostNova']),date('D M d Y H:i:s O'),htmlentities($_SESSION['user']));
  $file=fopen("Podaci/novosti.csv","a");

  if(fputcsv($file,$novosti)){
    fclose($file);
    $dodaliNovost="Uspjesno ste dodali novost!";
    echo "<script type='text/javascript'>alert('$dodaliNovost');</script>";
  }
  else{
    fclose($file);
    $dodaliNovostNe="Dodavanje novosti nije uspjelo!";
    echo "<script type='text/javascript'>alert('$dodaliNovostNe');</script>";
  }

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
 <li class="aktivna">Dodaj novost<li>
  <li> <a href='login.php?potvrdi=logout'>Logout</a><li>
  </ul>
</div>


<div class="sredina">
  <form id="forma" action="dodajnovost.php" method="post">

   <p id="lblnovaN">Unesite tekst nove novosti:</p>
   <textarea id="txtnovaN" name="novostNova" cols="80" rows="15" > </textarea>
   <br>

   <input type="submit" id="buttonLogin" value="Spasi" name="unesi"/> 

 </form>		
</div>

</body>
</html>