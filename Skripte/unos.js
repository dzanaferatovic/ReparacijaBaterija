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

	if(uneseni.length==0) document.getElementById("prezime").style.backgroundColor="white";
	else if(provjera!=null)
	{
		if(provjera[0]==uneseni) document.getElementById("prezime").style.backgroundColor="white";
		else document.getElementById("prezime").style.backgroundColor="red";
	}

	else document.getElementById("prezime").style.backgroundColor="red";
}

function validirajUnosEmaila(uneseni)
{
	var regularni=/[a-z0-9_]*+(\.[a-z0-9_]*)+@{1}+([a-z0-9])*+(\.[a-z][a-z]*)/gi;
	var provjera=uneseni.match(regularni);

	if(uneseni.length==0) document.getElementById("mail").style.backgroundColor="white";
	else if(provjera!=null)
	{
		if(provjera[0]==uneseni) document.getElementById("mail").style.backgroundColor="white";
		else document.getElementById("mail").style.backgroundColor="red";
	}

	else document.getElementById("mail").style.backgroundColor="red";
}
