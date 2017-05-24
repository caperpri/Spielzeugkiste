<html>
	<div id="suchleiste">
		
			<form action="index.php" method="post">
		
				<div id="jahr" class="inline width30 marginl1">
					<select name="Jahr"  class="inline pointer width100">
						<?php    
							$date = date('Y-m-d');
							$year = explode("-",$date);
							$year =$year[0];
							$yearint = (int)$year;
							$en = $yearint+4;
				
							for ($i = $yearint; $i<=$en; $i++) {
					
							echo '<option value="'.$i.'">'.$i.'</option>';
				
							}
						?>
					</select>	
				</div>
		
				
				<button class="suchbutton pointer inline marginl1 " type="submit" name="suchen">Suchen</button>
		
			</form>
		
		</div>
		
		<div id="auswertung" class="width100 center">
			
			<?php
				if (isset($_POST["suchen"]) ) {
				
					$year= $_POST["Jahr"];
					
					sel_month($year);
					
				}
			?>
			
		</div>
		
		

</html>