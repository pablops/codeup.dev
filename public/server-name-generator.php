<?php 
$adjectives = ['delightful', 'demanding', 'dense', 'bad', 'detailed',
'fast', 'dependable', 'tall', 'dependent', 'envious'];

$nouns = ['soup', 'apple', 'cereal', 'water', 'milk', 'letter',
'boat', 'hat', 'duck', 'sofa'];

$randAdj = mt_rand(0, (sizeof($adjectives) - 1));
$randNoun = mt_rand(0, (sizeof($nouns) - 1));

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<style>
		h1 {
			color: white;
			background-color: green;
			text-align: center;
			font-size: 130px;
		}
		h2 {
			color:white;
			background-color:blue;
			text-align: center;
			font-size: 65px;
		}
		body{
			background-color: navy;
			font-family: Georgia;
		}
	</style>
 	<title>Server Name Generator</title>
 </head>
 <body>
 	<h1>SrvrNmGnrtr</h1>
 	<h2><?php echo $adjectives[$randAdj] ?> <?php echo $nouns[$randNoun] ?> </h2>
 </body>
 </html>
