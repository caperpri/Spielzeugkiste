<?php
//Ob eine Zahl durch eine andere teilbar ist und eine natürliche Zahl wiedergibt kann man über das Modulo-Zeichen herausfinden
//Durch das Modulo wird geguckt ob ein Restbetrag nach einer Teilung entsteht und dieser wird ausgegeben.
//Beispiel: 5 % 2 = 1
//5 ist nicht glatt durch 2 teilbar, daher entsteht ein Rest von 1.
//Solange solch eine Operation eine 0 wiedergibt, geht die Rechnung in einen natürlichen Teiler auf.

for ($i= 1; $i <= 200; $i++) {
	if ($i % 2== 0 || $i % 5 == 0 || $i % 7 == 0 ) {
	
		if ($i % 2== 0) {
			echo 'zwei';
		} 
		
		if ($i % 5 == 0) {
			echo 'fünf';
		}
		
		if ($i % 7 == 0) {
			echo 'sieben';
		}
		
	} else {
		echo $i;
	}
	
	echo '<br>';
	
}


?>