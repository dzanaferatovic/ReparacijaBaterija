<?php session_start(); 
date_default_timezone_set("Europe/Sarajevo"); 
?>

<?php
if(isset($_POST['nazivNove']) && isset($_POST['tekstNove']) && $_POST['unesi']=="Spasi") {
  if($_POST['slikaURL']!='' && $_POST['slikaURL']!=' ') {
    $novosti= array(htmlentities($_REQUEST['nazivNove']),htmlentities($_REQUEST['tekstNove']),htmlentities($_REQUEST['slikaURL']),date('d.m.Y H:i:s'),htmlentities($_SESSION['user']),htmlentities($_REQUEST['telefonNove']));
  }

  else {
    $str="Slike/slika.jpg";
    $novosti= array(htmlentities($_REQUEST['nazivNove']),htmlentities($_REQUEST['tekstNove']),$str,date('d.m.Y H:i:s'),htmlentities($_SESSION['user']),htmlentities($_REQUEST['telefonNove']));
  }


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
 <li> <a href="onama.php"> O nama </a> </li>
 <li> <a href="cjenovnik.php"> Cjenovnik </a> </li>
 <li> <a href="kontakt.php"> Kontakt </a> </li>
 <li> <a href="vanjskilinkovi.php"> Vanjski linkovi </a> </li>
 <li class="aktivna">Dodaj novost<li>
  <li> <a href='login.php?potvrdi=logout'>Logout</a><li>
  </ul>
</div>


<div class="sredina">
  <form id="formaDodajNovost" action="dodajnovost.php" method="post">

   <div class="unos">
   <label>Naziv novosti: </label>
   <input type="text" id="nazivNove" name="nazivNove" placeholder="Nova novost--najmanje 2 slova" onkeyup="validirajUnosNazivaNovosti(this.value)" />
   </div>
   <br>

   <div class="unos">
   <label>Tekst novosti:</label>
   <textarea id="tekstNove" name="tekstNove" cols="80" rows="20" > </textarea>
   </div>
   <br>

   <div class="unos">
   <label> Slika: </label>
   <input type="text" id="slikaURL" name="slikaURL" placeholder="http://slike.ba/slika.png--nije obavezno" />
   </div>
   <br>

   <div class="unos">
   <label> Dvoslovni kod drzave: </label>
   <input type="text" id="dvoslovni" placeholder="BA--tacno dva slova" onkeyup="validirajDvoslovnu(this.value)" />
   </div>
   <br>

   <div class="unos">
   <label> Broj telefona: </label>
   <input type="text" id="telefonNove" name="telefonNove" placeholder="+38733123123" onkeyup="validirajPozivniBroj(this.value)" />
   </div>
   <br>

   <input type="submit" id="buttonLogin" value="Spasi" name="unesi"/> 

 </form>		
</div>

</body>
</html>