<?php 

function pageController(){ 
	$data = [];
	$data['list'] = array('pizza', 'sports', 'books', 'el internet', 'beer');
	return $data;
}

extract (pageController());

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
		li {
			text-align: left;
			color:gray;
			background-color:blue;
			text-align: center;
			font-size: 65px;
		}
		body{
			background-color: navy;
			font-family: Georgia;
		}
	</style>
 	<title>Favorite Things</title>
 </head>
 <body>
 	<h1>my favorite things</h1>
	<? foreach($list as $item): ?>
 	<ol>
 		<li><?= $item; ?></li>
 	</ol>
	<? endforeach; ?>
 </body>
 </html>