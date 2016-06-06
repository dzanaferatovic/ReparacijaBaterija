window.onload=function ()
{
	var vijesti=document.getElementsByClassName("vijest");

	for(var i=0; i<vijesti.length; i++) {
		var vrijemeTrenutne=stringUDatum(vijesti[i].childNodes[5].innerHTML);
		vijesti[i].childNodes[2].innerHTML=vrijeme(vrijemeTrenutne);
	}
}

function stringUDatum(stringic) {
	var datumvrijeme=stringic.split(" ");
	var dmy=datumvrijeme[0].split(".");
	var hms=datumvrijeme[1].split(":");

	var dancic=parseInt(dmy[0]);
	var mjesecic=parseInt(dmy[1])-1;
	var godinica=parseInt(dmy[2]);
	var satic=parseInt(hms[0]);
	var minutice=parseInt(hms[1]);
	var sekundice=parseInt(hms[2]);

	var datum=new Date(godinica,mjesecic,dancic,satic,minutice,sekundice);

	return datum;
}

function razlikaUSekundama(prvi, drugi) 
{
    var prvi_ms = prvi.getTime();	//vraca milisekunde od 1jan1970
    var drugi_ms = drugi.getTime();
    var razlika_ms = Math.abs(drugi - prvi);
    return Math.round(razlika_ms/1000);
}

function uMinute(vrSekunde)
{
	var min=Math.floor(vrSekunde/60);
	return min.toString();
}

function uSate(vrSekunde)
{
	var sat = Math.floor(vrSekunde / 3600);
	return sat.toString();
}

function uDane(vrSekunde)
{
	var dan=Math.floor(vrSekunde/86400);
	return dan.toString();
}

function uSedmice(vrSekunde)
{
	var sed=Math.floor(vrSekunde/604800);
	return sed.toString();
}

function vrijeme(vrObjave)	//mj idu od 0(Januar)..
{
	var trenutno=new Date(); //trenutno vrijeme

	var razlika=razlikaUSekundama(vrObjave, trenutno);
	var x;

	var ispis="Novost objavljena prije ";

		if(razlika<60 && razlika>0)	//ako je objavljeno manje od minutu
		{
			ispis+="par sekundi.";
		}

		else if(razlika>=60 && razlika<3600)		//ako je objavljeno manje od sat a vise od min
		{
			x=uMinute(razlika);		//vraca string

			if(x.endsWith('1')) ispis=ispis+x+" minutu.";
			else if(x.endsWith('2') || x.endsWith('3') || x.endsWith('4')) ispis=ispis+x+" minute.";
			else ispis=ispis+x+" minuta.";
		}

		else if(razlika>=3600 && razlika<86400)		//ako je objavljeno vise od sat a manje od dan
		{
			x=uSate(razlika);

			if(x.endsWith('1')) ispis=ispis+x+" sat.";
			else if(x.endsWith('2') || x.endsWith('3') || x.endsWith('4')) ispis=ispis+x+" sata.";
			else ispis=ispis+x+" sati.";
		}

		else if(razlika>=86400 && razlika<604800) 		//objavljeno prije par dana, manje od sedmicu
		{
			x=uDane(razlika);

			if(x.endsWith('1')) ispis=ispis+x+" dan.";
			else ispis=ispis+x+" dana.";
		}

		else if(razlika>=604800 && razlika<2419200) 		//objavljeno prije nekoliko sedmica, manje od mjesec
		{
			x=uSedmice(razlika);

			if(x.endsWith('1')) ispis=ispis+x+" sedmicu.";
			else if(x.endsWith('2') || x.endsWith('3') || x.endsWith('4')) ispis=ispis+x+" sedmice.";
			else ispis=ispis+x+" sedmica.";
		}

		else if(razlika>=2419200)
		{
			ispis="";
		}
	return ispis;
}

/*function prikaziDanasnje() {
	var sada=new Date();
	var danSada=sada.getUTCDate();
	var mjesecSada=sada.getUTCMonth();
	var godinaSada=sada.getUTCFullYear();

	var vijesti=document.getElementsByClassName("vijest");

	for(var i=0; i<vijesti.length; i++) {
		var vrijemeTrenutne=stringUDatum(vijesti[i].childNodes[3].innerHTML);
		if(vrijemeTrenutne.getUTCDate()==danSada && vrijemeTrenutne.getUTCMonth()==mjesecSada && vrijemeTrenutne.getUTCFullYear()==godinaSada)
		{
			vijesti[i].style.display="inline-block";
		}

		else vijesti[i].style.display="none";
	}
}*/

function prikaziDanasnje() {
	var sada=new Date();
	var vijesti=document.getElementsByClassName("vijest");

	for(var i=0; i<vijesti.length; i++) {
		var vrijemeTrenutne=stringUDatum(vijesti[i].childNodes[5].innerHTML);
		var razlikaus=razlikaUSekundama(vrijemeTrenutne,sada);

		var intSati=parseInt(uSate(razlikaus));

		if(intSati<24)
		{
			vijesti[i].style.display="inline-block";
		}
		else vijesti[i].style.display="none";
	}
}

function prikaziSedmicne() {
	var sada=new Date();
	var vijesti=document.getElementsByClassName("vijest");

	for(var i=0; i<vijesti.length; i++) {
		var vrijemeTrenutne=stringUDatum(vijesti[i].childNodes[5].innerHTML);
		var razlikaus=razlikaUSekundama(vrijemeTrenutne,sada);

		if(uSedmice(razlikaus)=="0" || uSedmice(razlikaus)=="1")
		{
			vijesti[i].style.display="inline-block";
		}

		else vijesti[i].style.display="none";
	}
}

function prikaziMjesecne() {
	var sada=new Date();
	var vijesti=document.getElementsByClassName("vijest");

	for(var i=0; i<vijesti.length; i++) {
		var vrijemeTrenutne=stringUDatum(vijesti[i].childNodes[5].innerHTML);

		if(vrijemeTrenutne.getUTCMonth()==sada.getUTCMonth() && vrijemeTrenutne.getUTCFullYear()==sada.getUTCFullYear())
		{
			vijesti[i].style.display="inline-block";
		}

		else vijesti[i].style.display="none";
	}

}

function prikaziSve() {
	var vijesti=document.getElementsByClassName("vijest");

	for(var i=0; i<vijesti.length; i++) {
		vijesti[i].style.display="inline-block";
	}
}

function filtriraj() {
	odabrana=document.getElementById("odaberi").value;
	if(odabrana=="danasnje") {
		prikaziDanasnje();
	}

	else if(odabrana=="sedmicne") {
		prikaziSedmicne();
	}

	else if(odabrana=="mjesecne") {
		prikaziMjesecne();
	} 

	else {
		prikaziSve();
	}
}

/*function sortiraj() {
	odabrana=document.getElementById("odaberiSort").value;

	if(odabrana=="poabecedi") {
		window.location.href="pocetna.php?odabrana=poabecedi";
	}

	else {
		window.location.href="pocetna.php";
	}
}*/


