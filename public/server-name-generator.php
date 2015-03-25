<?php 


function pageController(){ 
	$adjectives = ['delightful', 'demanding', 'dense', 'bad', 'detailed',
	'fast', 'dependable', 'tall', 'dependent', 'mad', 'envious'];
	$nouns = ['soup', 'apple', 'cereal', 'styrofoam cup', 'water', 'milk', 'letter',
	'boat', 'hat', 'duck', 'sofa'];
	$randAdj = mt_rand(0, (sizeof($adjectives) - 1));
	$randNoun = mt_rand(0, (sizeof($nouns) - 1));
	$data = [];
	$data['randomAdjective'] = $adjectives[array_rand($adjectives)];
	$data['randomNoun'] = $nouns[array_rand($nouns)];

	return $data;
}

extract(pageController());

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<style>
		h1 {
			color: white;
			width: 1000px;
			padding: 33px;
			background-color: green;
			text-align: center;
			font-size: 130px;
		}
		h2 {	
			margin-left: 290px;
			width: 400px;
			float: center;
			color:white;
			padding: 15px;
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
 	<h2><?= $randomAdjective ?> <?= $randomNoun ?> </h2>
 </body>
 </html>
