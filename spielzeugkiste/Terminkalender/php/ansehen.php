<html>

<div id="anlegen_body">
	<?php 
		
		if(isset ($_POST["anlegen"]) ) {
			$eintrag = anlegen($date_erstellung, $datum, $schrift, $uhr, $memo);
			if ($eintrag[0] == "override") {
				echo '<h2>Diesen Termin gibt es bereits.</h2>';
			} else 
			if ($eintrag[0] == "success") {
				$id = check_anlegen($date_erstellung, $datum, $schrift, $uhr, $memo);
				echo '<h2>Der Termin wurde erfolgreich angelegt.</h2>';
			} else {
				echo '<h2>Der Termin konnte nicht angelegt werden.</h2>';
			}
		}
		
		if (isset ($_POST["override_termin"]) ) {
			$override = override($_POST["override_termin"]);
			if($override[0] == "success") {
				$id = check_anlegen($override[1], $override[2], $override[3], $override[4], $override[5]);
				echo '<h2>Der Termin wurde erfolgreich angelegt.</h2>';
			}
		
		}
			
		if(isset ($_POST["update"]) ) {
			$update_true = check_bearbeitung($date_bearbeitung, $datum, $schrift, $uhr, $memo);;
			if($update_true == TRUE) {
				$update_confirmed = sel_ansehen($_POST["update"]);
				echo '<h2>Die Bearbeitung wurde erfolgreich gespeichert.</h2>';
			 }
		}
		
		if(isset ($_POST["loeschen"]) ) {
			$id = $_POST["loeschen"];
			$loeschen = select_l($id);
				echo '<h2>Wollen Sie den Termin wirklich löschen?</h2>';
		}
		
		if(isset ($_POST["un_loeschen"]) ) {
			$delete = delete($_POST["un_loeschen"]);
			if ($delete == TRUE) {
				echo '<h2>Der Eintrag wurde erfolgreich gelöscht.</h2>';
			}
		}
	?>
	<div class="form_header">
		<div id="label_anlegen">
		<?php 
			if (isset ($_POST["ansehen"]) ) {
						$ansehen = sel_ansehen($_POST["ansehen"]);
						echo $ansehen[0];
			}
			if (isset ($_POST["override_termin"]) ) {
				echo $override[1];
			}
			if(isset ($_POST["anlegen"]) ) {
				echo $datum;
			}
			if(isset ($_POST["update"]) ) {
				echo $update_confirmed[0];
			}
			if(isset ($_POST["loeschen"]) ) {
				echo $loeschen[0];
			}
			if(isset ($_POST["un_loeschen"]) ) {
				echo 'GELÖSCHT';
			}
		?>
		</div>
	</div>
	
	<div class="form_body block border_r_l">
		<div class="block width100">
			
			<div class="label inline width35">
				Terminüberschrift
			</div>
			<div class="input inline width60">
				<?php 
					if (isset ($_POST["ansehen"]) ) {
						echo $ansehen[1];
					}
					if (isset ($_POST["override_termin"]) ) {
						echo $override[2];
					}

					if(isset ($_POST["anlegen"]) ) {
						echo $schrift;
					}
					if(isset ($_POST["update"]) ) {
						echo $update_confirmed[1];
					}
					
					if(isset ($_POST["loeschen"]) ) {
						echo $loeschen[1];
					}
					
					if(isset ($_POST["un_loeschen"]) ) {
						echo "GELÖSCHT";
					}
				?>
			</div>
			
			<div class="label inline width35">
				Uhrzeit
			</div>
			<div class="input inline width60">
				<?php 
					if (isset ($_POST["ansehen"]) ) {
						sel_ansehen($_POST["ansehen"]);
						echo $ansehen[2];
					}
					
					if (isset ($_POST["override_termin"]) ) {
						echo $override[3];
					}
					
					if(isset ($_POST["anlegen"]) ) {
						echo $uhr;
					}
					
					if(isset ($_POST["update"]) ) {
						echo $update_confirmed[2];
					}
					
					if(isset ($_POST["loeschen"]) ) {
						echo $loeschen[2];
					}
			
					if(isset ($_POST["un_loeschen"]) ) {
						echo 'GELÖSCHT';
					}
				?>
			</div>
			
			<div class="label inline width35">
				Memo
			</div>
			<div class="input inline width60">
				<?php 
					if (isset ($_POST["ansehen"]) ) {
						sel_ansehen($_POST["ansehen"]);
						echo $ansehen[3];
					}
					
					if (isset ($_POST["override_termin"]) ) {
						echo $override[4];
					}
					
					if(isset ($_POST["anlegen"]) ) {
						echo $memo;
					}
					
					if(isset ($_POST["update"]) ) {
						echo $update_confirmed[3];
					}
					
					if(isset ($_POST["loeschen"]) ) {
						echo $loeschen[3];
					}
					
					if(isset ($_POST["un_loeschen"]) ) {
						echo 'GELÖSCHT';
					}
				?>
			</div>
			
					
		</div>
	</div>
	
	<div class="form_footer">
		<div class="width50 center">
	<?php
		if (isset ($_POST["ansehen"]) ) {
			ansehen_footer($_POST["ansehen"]);
		}
		
		if (isset ($_POST["anlegen"])) {
			if ($eintrag[0] == "override") {
				footer_override($eintrag);
			} else 
			if ($eintrag[0] == "success") {
				ansehen_footer($id);
			} 			
		}
		if (isset ($_POST["override_termin"]) ) {
			if ($override[0] == "success") {
				ansehen_footer($id);
			} 			
		}
		
		if (isset ($_POST["update"]) ){
			ansehen_footer($_POST["update"]);
		}
		
		if (isset ($_POST["loeschen"]) ) {
			loeschen_footer($id);
		}
	?>
		</div>
	</div>

</div>


</html>