<!DOCTYPE html>
<?php
	include '../config.php';
	include 'function.php';
?>

<html>
<head>
	<title>Spielzeugkiste</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://fonts.googleapis.com/css?family=Dekko" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="../css/style_default.css" media="screen and (min-width:1100px)"/>
	<link rel="stylesheet" type="text/css" href="../css/style_max.css" media="screen and (max-width:1100px)"/>
	<link rel="stylesheet" type="text/css" href="../css/style_medium.css" media="screen and (max-width:900px)"/>
	<link rel="stylesheet" type="text/css" href="../css/style_min.css" media="screen and (max-width:650px) and (min-width:450px)"/>

</head>

<body>

<div id="wrapper">
<div id="content">
	<header>
		<div id="headerdiv" class="center relative ">
		<div class="inline">
			
			<picture>
				<source srcset="../images/logo.svg" type="image/svg+xml">
				<img id="logo" src="logo.png" alt="Logo" />
			</picture>
		
		</div>
		
		<h1 class="inline absolute_center">Meine Spielzeugkiste</h1>
		</div>
	</header>

	<div class="trenner clearfix "></div>
	
	<nav class="center" >
		<ul>
			<span onclick='display_toggle("home_toggle")'>
				<li class="pointer">
					Home
				</li>
			</span>
		
			<span onclick='calender()'>
				<li class="pointer ">
				Termin anlegen
				</li>
			</span>
			
			<span onclick='display_toggle("suchen_toggle")'>
				<li class="pointer">
					Termin suchen
				</li>
			</span>
		</ul>
	</nav>
	
	<div class="trenner clearfix"></div>
	
	<div id="page_content" class="center">
	
		<div id="calender_toggle" class="no_display">
			<?php include 'calender.php';?>
		</div>
	
		<div id="home_toggle">
			<?php include 'index_page.php';?>
		</div>
			
		<div id="anlegen_toggle"  class="no_display">
			<?php include 'anlegen.php'; ?>
		</div>
		
		<div id="bearbeiten_toggle"  class="no_display">
			<?php include 'bearbeiten.php'; ?>
		</div>
		
		<div id="ansehen_toggle"  class="no_display">
			<?php include 'ansehen.php'; ?>
		</div>
		
		<div id="suchen_toggle" class="no_display">
			<?php include 'suche.php'; ?>
		</div>
	
	</div>

</div>
<footer>

</footer>
</div>
<?php

	javascript();

?>
<script language="javascript" type="text/javascript" src="../js/calender.js"></script>
<script language="javascript" type="text/javascript" src="../js/js_funktionen.js"></script>


</body>
</html>