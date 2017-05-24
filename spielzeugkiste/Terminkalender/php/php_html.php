<?php

function show_home_termin($id, $uhr, $schrift) {

		echo ' <div class="form_body block border_r_l hovergreen">
					<div class="inline form_label width100">
						<div class="width30 inline">'.$uhr.'</div>
						<div class="width45 inline">'.$schrift.'</div>
						
						<div class="width20 inline">
							<form action="index.php" method="post">
								<button type="submit"class="pointer width100 button" name="ansehen" value="'.$id.'">Ansehen</button>
							</form>
						</div>
						
					</div>
				</div>';

}

function show_home_kein_t() {
	echo '<div class="form_body block border_r_l">
				<div class="form_label width100">
					Keine Termine
				</div>
			</div>';
	
}

function home_header_termin($date) {

	echo '<div class="form_header">
				<div id="f_h_label">		
					Ihre Termine am '.$date.'
				</div>
			</div>';
	
} 

function home_footer_termin() {
	echo '<div class="home_footer">
			</div>';
}

function ansehen_footer($id) {
	
	echo '<form class="inline width100 talign_center" action="index.php" method="post">
				<button class="width50 inline footer_button pointer"type="submit" name="loeschen" value="'.$id.'">Löschen</button>
				<button class="width50 inline footer_button pointer"type="submit" name="bearbeiten" value="'.$id.'">bearbeiten</button>
			</form>';
}

function loeschen_footer($id) {
	echo '<form class="inline width100 talign_center" action="index.php" method="post">
				<button class="width50 inline footer_button pointer"type="submit" name="un_loeschen" value="'.$id.'">Unwiderruflich Löschen</button>
			</form>';
}

function footer_override($eintrag) {

$eintrag = $eintrag[1].';'.$eintrag[2].';'.$eintrag[3].';'.$eintrag[4].';'.$eintrag[5];
	echo '<form class="inline width100 talign_center" action="index.php" method="post">
				<button class="footer_button pointer width50 center" type="submit" name="override_termin" value="'.$eintrag.'">Dennoch Speichern</button>
			</form>';
}

//SUCHE
function show_monthly($id, $uhr, $schrift,$d_datum, $monatname){

echo '<div class="center form_body " >
						
			<div class="form_label width100 relative">
				<div class="width25 inline  ">'.$d_datum.'</div>
				<div class="width20 inline ">'.$uhr.'</div>
				<div class="width30 inline ">'.$schrift.'</div>
				<div class="width25 inline absoluter">
					<form action="index.php" method="post">
						<button type="submit"class="pointer button" name="ansehen" value="'.$id.'">Ansehen</button>
					</form>
				</div>

			</div>
				
		</div>';
				
		
			
}

?>