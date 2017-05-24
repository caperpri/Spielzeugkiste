<html>
<div id="anlegen_body">

<form action="index.php"method="post">
	<div class="form_header">
		<div id="label_anlegen">
		
		<span class="icon pointer" onclick="calender()"><img src="../images/icon.png" /></span>
		</div>
	</div>
	
	<div class="form_body block border_r_l">
		<div class="block width100">
			
			<div class="label inline width35">
				Terminüberschrift
			</div>
			<div class="input inline width60">
				<input type="text" autocomplete="off" class="width100 pointer" name="uberschrift" value="">
			</div>
			
			<div class="label inline width35">
				Uhrzeit
			</div>
			<div class="input inline width60">
				<select name="uhr_hour" class="inline pointer zeit">
					<?php
						hour();
					?>
				</select>
				
				<select name="uhr_min" class="inline pointer zeit">
					<?php
						minutes();
					?>
				</select>
				
				<select name="uhr_sek" class="inline pointer zeit">
					<?php
						sekunden();
					?>
				</select>
				
				(HH:MM:SS)
			</div>
			
			<div class="label inline width35">
				Memo
			</div>
			<div class="input inline width60">
				<textarea id="area" name="memo" class="pointer width100">

				</textarea>
			</div>
			
			<div class="width100">
				<input type="hidden" id="datum_anlegen" name="datum" value="">
			</div>
			
			
		</div>
	</div>
	
	<div class="form_footer">
		<div class="width50 center">
			<button class="form_button width45 center pointer" onclick="calender()">Zurücksetzen</button>
			<button class="form_button width45 center pointer" type="submit" name="anlegen">Anlegen</button>
		</div>
	</div>

</form>	

</div>


</html>