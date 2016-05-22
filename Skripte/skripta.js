window.onload=function ()
{
	document.getElementById("v1").innerHTML=vrijeme(2015,4-1,25,16,16,16);
	document.getElementById("v2").innerHTML=vrijeme(2016,4-1,27,11,17,2);
	document.getElementById("v3").innerHTML=vrijeme(2016,4-1,3,15,22,11);
	document.getElementById("v4").innerHTML=vrijeme(2016,4-1,28,21,11,10);
	document.getElementById("v5").innerHTML=vrijeme(2016,5-1,1,11,15,2);
	document.getElementById("v6").innerHTML=vrijeme(2016,5-1,1,17,17,2);
	document.getElementById("v7").innerHTML=vrijeme(2016,5-1,2,20,17,20);
	document.getElementById("v8").innerHTML=vrijeme(2016,5-1,2,10,17,20);
	document.getElementById("v9").innerHTML=vrijeme(2016,5-1,10,20,17,20);
	document.getElementById("v10").innerHTML=vrijeme(2016,5-1,15,22,17,20);
	document.getElementById("v11").innerHTML=vrijeme(2016,5-1,22,10,17,20);
	document.getElementById("v12").innerHTML=vrijeme(2016,5-1,22,17,21,20);
	document.getElementById("v13").innerHTML=vrijeme(2016,5-1,22,17,49,20);
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
	var min=Math.round(vrSekunde/60);
	return min.toString();
}

function uSate(vrSekunde)
{
	var sat = Math.round(vrSekunde / 3600);
	return sat.toString();
}

function uDane(vrSekunde)
{
	var dan=Math.round(vrSekunde/86400);
	return dan.toString();
}

function uSedmice(vrSekunde)
{
	var sed=Math.round(vrSekunde/604800);
	return sed.toString();
}

function vrijeme(y,m,d,h,min,s)	//mj idu od 0(Januar)..
{
	var vrObjave=new Date(y,m,d,h,min,s);
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

		ispis+=" ("+vrObjave.getDate()+"."+vrObjave.getMonth()+"."+vrObjave.getFullYear()+" "+vrObjave.getHours()+":"+vrObjave.getMinutes()+":"+vrObjave.getSeconds()+")";
	return ispis;
}
