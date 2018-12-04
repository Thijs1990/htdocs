var scherm = document.querySelector('.scherm'); //dit is het scherm
var tmpGetal = ""; //dit is de getal invoer
var resDecimal = []; //dit is de getal opslag
var resOperator = []; //dit is de operator opslag

//deze functie start als ergens geklikt wordt
document.onclick = function(event) {
//nummerknoppen vullen het tijdelijke getal aan en updaten het scherm ermee
	if (event.target.className == 'number' && resOperator != "2") {
		tmpGetal += (event.target.value);
		scherm.innerText = tmpGetal;
	}
//decimaal, deze kan maar 1 keer in tmpGetal komen
	else if ((event.target.className == 'decimal') && (tmpGetal.indexOf(".") == -1)) {
		tmpGetal += (event.target.value);
		scherm.innerText = tmpGetal;

	}
/*operator kan ik alleen gebruiken als ik een getal heb ingevoerd, er nog geen operator is en het laatste teken in tmpGetal geen decimaalpunt is.
Dit zorgt ervoor dat ik geen 2 operators in een string kan invoeren en dat ik niet kan rekenen met een onmogelijk getal(decimaal aan het eind)*/
	else if (event.target.className == 'operator' && tmpGetal.length > 0 && resOperator.length == 0 && tmpGetal.slice(-1) != ".") {
		resDecimal.push(tmpGetal); //slaat het tijdelijke getal op om straks mee te rekenen
		tmpGetal = ""; //leegt het tijdelijke getal om de invoer van een nieuw getal mogelijk te maken
		resOperator.push(event.target.value);
		scherm.innerText += event.target.value;
//hier komt kwadraat later terecht, dat is wat gestroomlijnder
        /*if (event.target.className == "square") {
            resOperator.push("2");
            scherm.innerText += resOperator[0].sup();//is er een manier om dit mooi te laten werken met superscript?
        }
        else { tmpGetal = ""; }*/
    }
//kwadraat, dit werkt grotendeels hetzelfde als operator. Omdat bij kwadraat geen tweede getal nodig is wist deze functie tmpGetal niet uit, die heb ik namelijk nodig voor de functie uitrekenen.
	else if ((event.target.className == "square") && (tmpGetal.length > 0) && (resOperator.length == 0) && (tmpGetal.slice(-1) != ".")) {
        resDecimal.push(tmpGetal);
	    resOperator.push("2");
        scherm.innerHTML += resOperator[0].sup();//is er een manier om dit mooi te laten werken met superscript?
    }
//AC knop activeert de clear functie
	else if (event.target.className == 'clear') {
		clear()
		scherm.innerText = tmpGetal;
		}
//de = knop activeert de functie uitrekenen en daarna de functie clear. Hier wordt het tweede tijdelijke getal ompgeslagen en de strings in resDecimal omgezet naar nummers
	else if ((event.target.className == 'calculate') && (resDecimal.length == 1) && (tmpGetal.length > 0) && (tmpGetal.slice(-1) != ".")) {
		resDecimal.push(tmpGetal);
		scherm.innerText = uitrekenen(parseFloat(resDecimal[0]), parseFloat(resDecimal[1]), resOperator[0]);
		clear();
	};
}
//deze functie leegt alles behalve het scherm
function clear(){
	tmpGetal = "";
	resDecimal = [];
	resOperator = [];
}
//hier wordt de som uitgerekend
function uitrekenen(getal1, getal2, operator) {
	console.log(getal1, operator, getal2);
	if (operator == "+") {
		return(getal1 + getal2)
	}
	else if (operator == "-") {
		return(getal1 - getal2)
	}
	else if (operator == "/" ) {
//delen door 0 geeft error
        if (getal2 == 0) {
			return("ERROR")
		}
		else {
			return(getal1 / getal2)
		}
	}
//bij kwadraat zijn getal 1 en getal 2 identiek
	else if ((operator == "x") || (operator == "2"))  {
		return(getal1 * getal2)
	}
}
