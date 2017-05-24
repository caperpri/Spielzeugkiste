<?php
//Funktion für den Select-Tag(Stunden)
function hour() {
	for ($i = 0; $i <= 24; $i++) {
	
		if ( strlen($i) == 2 ) { 
			$hour = $i;
		} else { 
			$hour = '0'.$i;
		}
		
		echo '<option value="'.$hour.'">'.$hour.'</option>';
	}
}

//Funktion für den Select-Tag(Minuten)
function minutes() {
	
	for ($i = 0; $i <= 59; $i+=5) {
	
		if ( strlen($i) == 2 ) { 
			$min = $i;
		} else { 
			$min = '0'.$i;
		}
	
		echo '<option value="'.$min.'">'.$min.'</option>';
	}
}

//Funktion für den Select-Tag(Sekunden)
function sekunden() {
	
	for ($i = 0; $i <= 59; $i+=5) {
		
		if ( strlen($i) == 2 ) { 
			$sek = $i;
		} else { 
			$sek = '0'.$i;
		}
	
		echo '<option value="'.$sek.'">'.$sek.'</option>';
	}
}

function bearbeiten_hour($time){

$hour = explode(":", $time);

	echo '<option select="selected"value="'.$hour[0].'">'.$hour[0].'</option>';

	for ($i = 0; $i <= 59; $i+=5) {
	
		if ( strlen($i) == 2 ) { 
			$hour = $i;
		} else { 
			$hour = '0'.$i;
		}
	
	echo '<option value="'.$hour.'">'.$hour.'</option>';
	
	}
}

function bearbeiten_min($time){

$min = explode(":", $time);

	echo '<option select="selected"value="'.$min[1].'">'.$min[1].'</option>';

	for ($i = 0; $i <= 59; $i+=5) {
	
		if ( strlen($i) == 2 ) { 
			$min = $i;
		} else { 
			$min = '0'.$i;
		}
	
	echo '<option value="'.$min.'">'.$min.'</option>';
	
	}
}

function bearbeiten_sek($time){

$sek = explode(":", $time);

	echo '<option select="selected"value="'.$sek[2].'">'.$sek[2].'</option>';

	for ($i = 0; $i <= 59; $i+=5) {
	
		if ( strlen($i) == 2 ) { 
			$sek = $i;
		} else { 
			$sek = '0'.$i;
		}
	
	echo '<option value="'.$sek.'">'.$sek.'</option>';
	
	}
}



function javascript() {

echo '	<script language="javascript" type="text/javascript" src="../js/js_funktionen.js"></script>
			<script language="javascript" type="text/javascript" src="../js/calender.js"></script>';

	if((isset ($_POST["ansehen"]) ) || (isset ($_POST["anlegen"]) ) ||  (isset ($_POST["override_termin"]) ) || (isset ($_POST["update"]) ) || (isset ($_POST["un_loeschen"]) )) {
	
		echo ' 	<script type="text/javascript">
						display_toggle("ansehen_toggle");
					</script>';
	}
	
	if (isset ($_POST["bearbeiten"]) ) {
		echo '	<script type="text/javascript">
						b_calender();
					</script>';
	}
	
	if (isset ($_POST["suchen"]) ) {
		echo '	<script type="text/javascript">
						display_toggle("suchen_toggle");
					</script>';
	}



}




?>