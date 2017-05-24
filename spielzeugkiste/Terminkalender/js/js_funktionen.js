
var toggles = ["calender_toggle","home_toggle","anlegen_toggle","bearbeiten_toggle","ansehen_toggle","suchen_toggle"] ;



//setzt das ausgewählte Toggle auf block
function display_toggle(div) {

	no_display();
	
	document.getElementById(div).style.display ="block";

}

//setzt alle Toggles auf display: none
function no_display() {

	var arraylength = toggles.length -1;
	
	for (var i = 0; i<=  arraylength; i++) {
		document.getElementById(toggles[i]).style.display ="none";
	}

}



function display_suche(div) {

document.getElementById(div).style.display = "block";
document.getElementById("aus").style.display = "inline-block";
document.getElementById("an").style.display = "none";

}

function nodisplay_suche(div) {
document.getElementById(div).style.display = "none";
document.getElementById("aus").style.display = "none";
document.getElementById("an").style.display = "inline-block";
}


function termin_anlegen(year, month, day, wochent){
	var label = document.getElementById("label_anlegen");
	var hidden_d = document.getElementById("datum_anlegen");
	
	var datumhidden = year+'-'+monthformat(month)+'-'+dayformat(day);
	var datumlabel = dayname(wochent)+' - '+dayformat(day)+' '+monthname(month)+' '+year+'<span class="icon pointer" onclick="calender()"><img src="../images/icon.png" /></span>';;
	
	display_toggle("anlegen_toggle");
	
	label.innerHTML = datumlabel;
	hidden_d.value = datumhidden;

}

function termin_bearbeiten(year, month, day, wochent){
	var label = document.getElementById("label__bearbeiten");
	var hidden_d = document.getElementById("datum_bearbeiten");
	
	var datumhidden = year+'-'+monthformat(month)+'-'+dayformat(day);
	var datumlabel = dayname(wochent)+' - '+dayformat(day)+' '+monthname(month)+' '+year+' <span class="icon pointer" onclick="b_calender()"><img src="../images/icon.png" /></span>';
	
	display_toggle("bearbeiten_toggle");
	
	label.innerHTML = datumlabel;
	hidden_d.value = datumhidden;

}



/************************************************
FORMARTIERUNGEN
**************************************************/

function dayformat (day){
	
	var n = day.toString().length;
	
	if( n < 2) {
		day = '0'+day;
		return day;
	} else {
		return day;
	}
}

//formatiert die Monatszahlen auf zweistellig (01 statt 1)
function monthformat(month){
	month= month+1;
	var n = month.toString().length;
	
	if( n < 2) {
		day = '0'+month;
		return month;
	} else {
		return month;
	}
}

//sucht das Wort für den Monat heraus
function monthname(month) {
	var monthnames = ["Januar", "Februar" , "März" , "April" , "Mai" , "Juni" , "Juli" , "August", "September" , "Oktober" , "November" , "Dezember"]
	return  monthnames[month];
}

//sucht das Wort für den Tag heraus
function dayname(wochent) {
	var daynames = ["Sonntag","Montag","Dienstag","Mittwoch", "Donnerstag", "Freitag", "Samstag"];
	return daynames[wochent];
}