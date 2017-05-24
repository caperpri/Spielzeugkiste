<?php

$DBHost 	= "localhost";	
$DBUser 	= "root";	
$DBPass 	=  "";			
$DBName 	= "sp_termin_datenbank";


$conn = mysqli_connect($DBHost, $DBUser , $DBPass, $DBName);
$conn->set_charset("utf8");

?>