function validirajUnosImena(uneseni)
{
	var regularni=/[A-Z]+[a-z]+\w/g;
	var provjera=uneseni.match(regularni);

	if(uneseni.length==0) document.getElementById("ime").style.backgroundColor="white";
	else if(provjera!=null)
	{
		if(provjera[0]==uneseni) document.getElementById("ime").style.backgroundColor="white";
		else document.getElementById("ime").style.backgroundColor="red";
	}

	else document.getElementById("ime").style.backgroundColor="red";
}

function validirajUnosPrezimena(uneseni)
{
	var regularni=/[A-Z]+[a-z]+\w/g;
	var provjera=uneseni.match(regularni);

	if(uneseni.length==0) {
		document.getElementById("prezime").style.backgroundColor="white";
	}
	else if(provjera!=null)
	{
		if(provjera[0]==uneseni) document.getElementById("prezime").style.backgroundColor="white";
		else document.getElementById("prezime").style.backgroundColor="red";
	}

	else {
		document.getElementById("prezime").style.backgroundColor="red";
	}
}

function validirajUnosEmaila(uneseni)
{
	var regularni=/[a-z]((\-|\.|\_){0,1}[a-z0-9]+)*\@([a-z0-9]+\.)+[a-z]+/g;
	var provjera=uneseni.match(regularni);

	if(uneseni.length==0) {
		document.getElementById('eemail').style.backgroundColor="white";
	}

	else if(provjera!=null)
	{
		if(provjera[0]==uneseni) document.getElementById('eemail').style.backgroundColor="white";
		else document.getElementById('eemail').style.backgroundColor="red";
	}

	else {
		document.getElementById('eemail').style.backgroundColor="red";
	}
}

function validirajUnosNazivaNovosti(uneseni) {
	var regularni=/[A-Za-z]+[A-Za-z0-9]+([A-Za-z0-9]*\s*)*/g;
	var provjera=uneseni.match(regularni);

	if(uneseni.length==0) document.getElementById('nazivNove').style.backgroundColor="white";
	else if(provjera!=null)
	{
		if(provjera[0]==uneseni) document.getElementById('nazivNove').style.backgroundColor="white";
		else document.getElementById('nazivNove').style.backgroundColor="red";
	}

	else document.getElementById('nazivNove').style.backgroundColor="red";
}


function validirajDvoslovnu(uneseni) {
	var regularni=/^([A-Za-z][A-Za-z])$/;
	var provjera=uneseni.match(regularni);
	if(uneseni.length==0) document.getElementById('dvoslovni').style.backgroundColor="white";

	if(provjera!=null)
	{
		if(provjera[0]==uneseni && uneseni.length==2) {
			document.getElementById('dvoslovni').style.backgroundColor="white";
		}
		else document.getElementById('dvoslovni').style.backgroundColor="red";
	}

	else document.getElementById('dvoslovni').style.backgroundColor="red";
}

function validirajPozivniBroj(uneseni) {
	var ajax=new XMLHttpRequest();
	var telefon=uneseni;
	var dvoslovniKod=document.getElementById("dvoslovni").value;

	if((telefon=="" || telefon==" ") && (dvoslovniKod!="" || dvoslovniKod!=" ")) document.getElementById("telefonNove").style.backgroundColor="white";
	if(dvoslovniKod=="" || dvoslovniKod==" ") document.getElementById("telefonNove").style.backgroundColor="red";

	ajax.onreadystatechange=function() {
	if (ajax.readyState == 4 && ajax.status == 200) {
		vracenaDrzava=JSON.parse(ajax.responseText);

		 if(vracenaDrzava[0]!=null) {
		 	var pozivniBroj=vracenaDrzava[0]['callingCodes'][0];
		 	if(telefon.startsWith("+"+pozivniBroj)) {
		 		document.getElementById("telefonNove").style.backgroundColor="white";
		 	}

		 	else {
		 		document.getElementById("telefonNove").style.backgroundColor="red";
		 	}
		 }
		}

		else if(ajax.readyState == 4 && ajax.status == 200) alert("Greska:nepoznat URL");

    ajax.open("GET","https://restcountries.eu/rest/v1/alpha?codes="+dvoslovniKod,true);
	ajax.send();
	}
}
