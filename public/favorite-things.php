<?php 
$favethings = ['pizza', 'sports', 'books', 'el internet', 'beer'];

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
 	<title>Favorite Things</title>
 </head>
 <body>
 	<h1>my favorite things</h1>
 	<?php foreach($favethings as $thing){ ?>
 	<ul>
 		<li><?php echo $thing ?></li>
 	</ul>
 	<?php } ?>
 </body>
 </html>