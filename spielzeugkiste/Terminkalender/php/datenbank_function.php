<?php
include '../config.php';
include 'php_html.php';


if (isset ($_POST["anlegen"]) ) {

$date_erstellung = date('Y-m-d H:i:s');
$datum = $_POST["datum"];
$schrift =$_POST["uberschrift"];
$uhr = $_POST["uhr_hour"].':'. $_POST["uhr_min"].':'. $_POST["uhr_sek"];
$memo = $_POST["memo"];

}

function anlegen($date_erstellung, $datum, $schrift, $uhr, $memo) {
include '../config.php';

	$sel_prufung = "SELECT * FROM tbl_termin WHERE ereignisdatum = '$datum' AND uhrzeit = '$uhr' AND text_schrift = '$schrift'";
	$insert = "INSERT INTO tbl_termin (termin_id , erstellungsdatum , ereignisdatum , uhrzeit , text_schrift , text_memo , bearbeitungsdatum) 
	VALUES (NULL, '$date_erstellung', '$datum', '$uhr', '$schrift', '$memo', NULL)";

	$result_prufung = $conn->query($sel_prufung);
			if ($result_prufung-> num_rows == 0) {
			$conn->query($insert);
			$last_id = mysqli_insert_id($conn);
			
			if ($last_id != 0) {
				$eintrag = array("success",$date_erstellung, $datum, $schrift, $uhr, $memo);
				return $eintrag;
			} else {
				$eintrag = array("fail",$date_erstellung, $datum, $schrift, $uhr, $memo);
				return $eintrag;
			}
			
		}  else {
			while($row = $result_prufung->fetch_assoc()) {
				$d_id = $row["termin_id"];
				$d_datum= $row["ereignisdatum"];
				$d_uhr = $row["uhrzeit"];
				$d_schrift = $row["text_schrift"];
				$d_memo = $row["text_memo"]; 
					
					$eintrag = array("override",$date_erstellung, $datum, $schrift, $uhr, $memo);
					return $eintrag;
				
			}
		}
} 



function override($eintrag) {
include '../config.php';
$eintrag = explode(";",$eintrag);
$date_erstellung = $eintrag[0];
$datum = $eintrag[1];
$schrift =$eintrag[2];
$uhr =$eintrag[3];
$memo = $eintrag[4];

	$insert = 	"INSERT INTO tbl_termin (termin_id , erstellungsdatum , ereignisdatum , uhrzeit , text_schrift , text_memo , bearbeitungsdatum) 
						VALUES (NULL, '$date_erstellung', '$datum', '$uhr', '$schrift', '$memo', NULL)";

		$conn->query($insert);
		$last_id = mysqli_insert_id($conn);
			
			if ($last_id != 0) {
				$eintrag = array("success",$date_erstellung, $datum, $schrift, $uhr, $memo);
				return $eintrag;
			}
}



if (isset ($_POST["update"]) ) {
	$id = $_POST["update"];

	$date_bearbeitung = date('Y-m-d H:i:s');
	$datum = $_POST["datum"];
	$schrift = $_POST["uberschrift"];
	$uhr = $_POST["uhr_hour"].':'. $_POST["uhr_min"].':'. $_POST["uhr_sek"];
	$memo = $_POST["memo"];

	$sql = "UPDATE tbl_termin
					SET ereignisdatum = '$datum', uhrzeit = '$uhr', text_schrift = '$schrift', text_memo = '$memo', bearbeitungsdatum = '$date_bearbeitung'
					WHERE termin_id = $id";

	$result= $conn ->query($sql);
}


function check_anlegen($date_erstellung, $datum, $schrift, $uhr, $memo) {
include '../config.php';

$sel_prufung = "SELECT * FROM tbl_termin 
						WHERE erstellungsdatum = '$date_erstellung' 
						AND ereignisdatum = '$datum' 
						AND uhrzeit = '$uhr' 
						AND text_schrift = '$schrift'
						AND text_memo = '$memo'";
	
		$result_prufung = $conn->query($sel_prufung);
		if ($result_prufung-> num_rows > 0) {
			while($row = $result_prufung->fetch_assoc()) {
				$id = $row["termin_id"];
				return $id;
			}
		}
}

function check_bearbeitung($date_bearbeitung, $datum, $schrift, $uhr, $memo) {
include '../config.php';

$sel_prufung = "SELECT * FROM tbl_termin 
						WHERE bearbeitungsdatum = '$date_bearbeitung' 
						AND ereignisdatum = '$datum' 
						AND uhrzeit = '$uhr' 
						AND text_schrift = '$schrift'
						AND text_memo = '$memo'";
	
		$result_prufung = $conn->query($sel_prufung);
		if ($result_prufung-> num_rows > 0) {
			return TRUE;
		}
}

//BEARBEITUNG HERAUSSUCHEN
function sel_bearbeiten($id) {
include '../config.php';

	$sel = "SELECT * FROM tbl_termin
				WHERE termin_id = '$id'";
				
	$result = $conn->query($sel);
	
	while($row = $result->fetch_assoc()) {
				$d_id = $row["termin_id"];
				$d_datum= $row["ereignisdatum"];
				$d_uhr = $row["uhrzeit"];
				$d_schrift = $row["text_schrift"];
				$d_memo = $row["text_memo"]; 
	
		$bearbeiten = array($d_datum, $d_schrift,$d_uhr, $d_memo,$d_id);
		return $bearbeiten;
	}
}

function select_l($id) {
include '../config.php';

	$sel = "SELECT * FROM tbl_termin
				WHERE termin_id = '$id'";
				
	$result = $conn->query($sel);
	
	while($row = $result->fetch_assoc()) {
				$id = $row["termin_id"];
				$datum= $row["ereignisdatum"];
				$uhr = $row["uhrzeit"];
				$schrift = $row["text_schrift"];
				$memo = $row["text_memo"]; 
		
		$loeschen = array($datum, $schrift,$uhr, $memo,$id);
		return $loeschen;
	}
}



//SELECT FUR ANSEHEN
function sel_ansehen($id) {
include '../config.php';

	$sel = "SELECT * FROM tbl_termin
				WHERE termin_id = '$id'";
				
	$result = $conn->query($sel);
	
	while($row = $result->fetch_assoc()) {
				$d_id = $row["termin_id"];
				$d_datum= $row["ereignisdatum"];
				$d_uhr = $row["uhrzeit"];
				$d_schrift = $row["text_schrift"];
				$d_memo = $row["text_memo"]; 
	
		$ansehen = array($d_datum, $d_schrift,$d_uhr, $d_memo,$d_id);
		return $ansehen;
	}
}

function delete($id) {
include '../config.php';

	$delete = "DELETE FROM tbl_termin WHERE termin_id = '$id' ";
	$result = $conn->query($delete);
		
	$sel = "SELECT * FROM tbl_termin WHERE termin_id = '$id'";
	$result = $conn->query($sel);
	if ($result-> num_rows == 0) {
		return TRUE;
	}
	
}

function show_next_days() {
include '../config.php';

$date = date('Y-m-d');

	for ($i=0; $i<=2; $i++) {
		$date = new DateTime('+'.$i.' day');
		$date = $date->format('Y-m-d');
	
		$sel_all = "SELECT * FROM tbl_termin WHERE ereignisdatum = '$date' ";
		$result = $conn->query($sel_all);
	
		home_header_termin($date);
		
		if ($result-> num_rows == 0) {
			show_home_kein_t();
		}
			while($row = $result->fetch_assoc()) {
				$d_id = $row["termin_id"];
				$d_datum= $row["ereignisdatum"];
				$d_uhr = $row["uhrzeit"];
				$d_schrift = $row["text_schrift"];
				$d_memo = $row["text_memo"]; 
				
				show_home_termin($d_id, $d_uhr, $d_schrift);
				
			}
		home_footer_termin();
	}
	
}

function sel_month($year) {
include '../config.php';

$array_monat = "Januar;Februar;Marz;April;Mai;Juni;Juli;August;September;Oktober;November;Dezember";
$array_monat = explode(";", $array_monat);
$month = 1;

	for($index = 0; $index < 12; $index++) {
	
		if ( strlen($month) == 2 ) { 
				$monthnumber = $month;
		} else { 
			$monthnumber = '0'.$month;
		}
		
		$monatname = $array_monat[$index];
		$alike = $year.'-'.$monthnumber.'%';

		$sel = "SELECT * FROM tbl_termin
				where ereignisdatum LIKE '$alike'
				ORDER BY ereignisdatum ASC";

		$result = $conn->query($sel);
				
		if ($result-> num_rows > 0) {
			echo '	<div class="form_header">
							<div id="f_h_label">
								Termine im '.$monatname.'  '.$year.'
								<span id="an" class="icon pointer" onclick=display_suche("'.$monatname.'")>
								<img id="icon" src="../images/pfeil.png" />
								</span>
								<span id="aus"class="icon pointer no_display" onclick=nodisplay_suche("'.$monatname.'")>
								<img id="icon" src="../images/pfeil2.png" />
								</span>
							</div>
						</div>
						<div id='.$monatname.' class="no_display">';
						
			while($row = $result->fetch_assoc()) {
				$d_id = $row["termin_id"];
				$d_datum= $row["ereignisdatum"];
				$d_uhr = $row["uhrzeit"];
				$d_schrift = $row["text_schrift"];
				$d_memo = $row["text_memo"]; 
				
				show_monthly($d_id, $d_uhr, $d_schrift,$d_datum, $monatname);
				
			}	
			
			echo '</div>
						<div class="form_footer">
						</div>';
		} 		
		
	$month++;		
	}	

}


?>