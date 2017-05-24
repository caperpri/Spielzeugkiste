var label = document.getElementById("label");
var current = document.getElementById("cur");
var div = document.getElementById("divid");
var monthnames = ["Januar", "Februar" , "März" , "April" , "Mai" , "Juni" , "Juli" , "August", "September" , "Oktober" , "November" , "Dezember"]
		

//startet den normalen Calender
function calender() {

	//setzt den Calender auf sichtbar 
	display_toggle("calender_toggle");
	//sucht das heutige Datum
	var date = new Date();
	//sucht das Jahr des gefundenen Datums
	var n =	date.getFullYear();
	//nimmt den Monat
	var monat = date.getMonth();

	//setzt die Buttons zum blättern
	document.getElementById("prev").setAttribute('onclick', 'prev("anlegen")');
	document.getElementById("next").setAttribute('onclick', 'next("anlegen")');	
	
	//zeigt den gesetzten Monat und das Jahr
	label.innerHTML = monthnames[monat]+' ' + n;

	//ruft die Tablefunktion die alles erstellt
	table(n, monat,"anlegen");
}

function b_calender() {

	display_toggle("calender_toggle");

	var date = new Date();
	var n =	date.getFullYear();
	var monat = date.getMonth();
	document.getElementById("prev").setAttribute('onclick', 'prev("bearbeiten")');
	document.getElementById("next").setAttribute('onclick', 'next("bearbeiten")');
			
		label.innerHTML = monthnames[monat]+' ' + n;
		
		table(n, monat,"bearbeiten");
}

//Tabellenerstellung
//setzt das herausgesuchte Jahr und Monat.
//Setzt den Tag auf 1 und sucht den Wochentag heraus.
function table(year,month,seite) {
	//setzt das weitergegebene Datum 
	var date = new Date();
		date.setFullYear(year);
		date.setMonth(month);
	//setzt das Datum immer auf den Monats Ersten
		date.setDate(1);

	var getday = date.getDay();

//Funktion um den letzten Tag des Monats zu finden			
	var last = lastday(year, month);

//Variable für den Day-count	
	var dayc = 1;
	var datumt = new Date();

//Tabelle gecleart	
	current.innerHTML = "";

//For-Schleife für die maximale Reihenanzahl
//maximale Anzahl = 7	
	for (var i = 0; i<=6; i++) {

//Daycount wird mit dem letzten Tag abgeglichen, solange Daycount nicht höher is
//als der letzte Tag des Monats, geht die Schleife weiter 	
		if (dayc <=last) {
			
			var row = current.insertRow(i);

//Spaltenerstellung
//Maximale Spalten von 7			
		for (var col = 0; col <=6; col++) {
				
			var cell =row.insertCell(col);

//Wenn die Spaltenzahl dem Wochentag-index gleicht wird eingetragen			
			if (col == getday && dayc <= last) {

//sucht col=0 um Sonntag zu markieren			
				if (col == 0) {

					datumt.setDate(dayc);
					if (seite == "anlegen"){
					cell.innerHTML = '<span id="'+dayc+'"  onclick="termin_anlegen('+year+','+month+','+dayc+','+getday+')"onmouseover="hover('+dayc+')" onmouseout="out('+dayc+' ,'+col+')" style="display:block; width: 100%; height:100%; background-color: hsla(7, 80%, 56%, 0.25); border: none;text-decoration: none; cursor:pointer">'+dayc+'</span>';
					}
					if (seite == "bearbeiten"){
					cell.innerHTML = '<span id="'+dayc+'"  onclick="termin_bearbeiten('+year+','+month+','+dayc+','+getday+')"onmouseover="hover('+dayc+')" onmouseout="out('+dayc+' ,'+col+')" style="display:block; width: 100%; height:100%; background-color: hsla(7, 80%, 56%, 0.25); border: none;text-decoration: none; cursor:pointer">'+dayc+'</span>';
					}
					
					dayc++;
					getday = date.getDay(date.setDate(dayc));
				
				} else {
				
//schreibt die Tage in die Spalten				
		
				datumt.setDate(dayc);
//unterteilt die Arten des Kalenders				
				if (seite == "anlegen"){
				cell.innerHTML = '<span id="'+dayc+'"    onclick="termin_anlegen('+year+','+month+','+dayc+','+getday+')" onmouseover="hover('+dayc+')" onmouseout="out('+dayc+' ,'+col+')" style="display:block; width: 100%; height:100%; background-color: white; border: none;text-decoration: none; cursor:pointer">'+dayc+'</span>';
				}
				if (seite == "bearbeiten"){
				cell.innerHTML = '<span id="'+dayc+'"    onclick="termin_bearbeiten('+year+','+month+','+dayc+','+getday+')" onmouseover="hover('+dayc+')" onmouseout="out('+dayc+' ,'+col+')" style="display:block; width: 100%; height:100%; background-color: white; border: none;text-decoration: none; cursor:pointer">'+dayc+'</span>';
				}
				dayc++;
				getday = date.getDay(date.setDate(dayc));
				
				}		
			} else	{
			if (col == 0) {
			
			cell.innerHTML = '<span style="display:block; width: 100%; height:100%; background-color: hsla(7, 80%, 56%, 0.25); border: none;text-decoration: none; cursor:pointer"></span>';
			
			} else {	

				cell.innerHTML = '  ';
			}
			}
		}
		}
	}
}


	

//Funktion um den letzten Tag heraus zu suchen	
function lastday(year, month) {
		
	var date = new Date((new Date(year, month+1, 1) )-1);
	var lastday = date.getDate();
	return lastday;
}

//Funktion um den vorherigen Monat herauszusuchen
function prev(which) {
	var str =document.getElementById("label").innerHTML;
	var month_year = str.split(" ");
	
	var month = monthnames.indexOf(month_year[0]);
		month--;
		
		if (month >= 0 ) {
		
			label.innerHTML = monthnames[month]+' ' + month_year[1];
			table(month_year[1],month, which);
		
		} else {
		
			month_year[1]--;
			month = 11;
			label.innerHTML = monthnames[month]+' ' + month_year[1];
			table(month_year[1],month, which);
		}
}

//Funktion um den nächsten Monat herauszusuchen
function next(which) {
	
	var str =document.getElementById("label").innerHTML;
	var month_year = str.split(" ");
	
	var month = monthnames.indexOf(month_year[0]);
		month++;

		if (month <= 11 ) {

		label.innerHTML = monthnames[month]+' ' + month_year[1];
			
			table(month_year[1],month, which);

		} else {

			month_year[1]++;
			month = 0;
			label.innerHTML = monthnames[month]+' ' + month_year[1];
			table(month_year[1],month,which);
		}
	
}



function hover(colid) {

	document.getElementById(colid).style.backgroundColor = "hsla(88,49%,54%,0.25)";

}

function out(colid, col) {
	if (col == 0) {
		document.getElementById(colid).style.backgroundColor = "hsla(7, 80%, 56%, 0.25)";
	} else {
		document.getElementById(colid).style.backgroundColor = "white";
	}
}
