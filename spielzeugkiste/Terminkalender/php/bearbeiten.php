<html>

<div id="bearbeiten_body">

<form action="index.php"method="post">
	<div class="form_header">
		<div id="label__bearbeiten">
			<?php
				if(isset ($_POST["bearbeiten"]) ) {
					$bearbeiten = sel_bearbeiten($_POST["bearbeiten"]);
						echo $bearbeiten[0];
				}
			?>
			<span class="icon pointer" onclick="b_calender()"><img src="../images/icon.png" /></span>
		</div>
		
	</div>
	
	<div class="form_body block border_r_l">
		<div class="block width100">
			
			<div class="label inline width35">
				Terminüberschrift
			</div>
			<div class="input inline width60">
				<input type="text" autocomplete="off" class="width100 pointer" name="uberschrift" value="<?php
				if(isset ($_POST["bearbeiten"]) ) {
					sel_bearbeiten($_POST["bearbeiten"]);
					echo $bearbeiten[1];
				}
			?>">
			</div>
			
			<div class="label inline width35">
				Uhrzeit
			</div>
			<div class="input inline width60">
				<select name="uhr_hour" class="inline pointer zeit">
					<?php
						if(isset ($_POST["bearbeiten"]) ) {
							bearbeiten_hour($bearbeiten[2]);
						}
					?>
				</select>
				
				<select name="uhr_min" class="inline pointer zeit">
					<?php
						if(isset ($_POST["bearbeiten"]) ) {
							bearbeiten_min($bearbeiten[2]);
						}
					?>
				</select>
				
				<select name="uhr_sek" class="inline pointer zeit">
					<?php
						if(isset ($_POST["bearbeiten"]) ) {
							bearbeiten_sek($bearbeiten[2]);
						}
					?>
				</select>
				
				(HH:MM:SS)
			</div>
			
			<div class="label inline width35">
				Memo
			</div>
			<div class="input inline width60">
				<textarea id="area" name="memo" class="pointer width100">
					<?php
						if(isset ($_POST["bearbeiten"]) ) {
							echo $bearbeiten[3];
						}
					?>
				</textarea>
			</div>
			
			<div class="width100">
				<input type="hidden" id="datum_bearbeiten" name="datum" value="<?php
				if(isset ($_POST["bearbeiten"]) ) {
					echo $bearbeiten[0];
				}
			?>">
			</div>
			
			
		</div>
	</div>
	
	<div class="form_footer">
		<div class="width50 center">
			<button class="form_button width45 center" type="reset">Zurücksetzen</button>
			<button class="form_button width45 center" type="submit" name="update" value="<?php
				if(isset ($_POST["bearbeiten"]) ) {
					sel_bearbeiten($_POST["bearbeiten"]);
					echo $bearbeiten[4];
				}
			?>">Speichern</button>
		</div>
	</div>

</form>	


</div>

</html>