<?php 


$multicity = array(
	$label = array("City", "Country", "Continent"),
	$a     = array("City" => "Tokyo", "Country" => "Japan", "Continent" => "Asia"),
	$b     = array("City" => "Mexico City", "Country" => "Mexico", "Continent" => "North America"),
	$c     = array("City" => "New York City", "Country" => "USA", "Continent" => "North America"),
	$d     = array("City" => "Mumbai", "Country" => "India", "Continent" => "Asia")

	);


// print_r ($multicity);

// Tokyo, Japan, Asia; Mexico City, Mexico, North America; 
// New York City, USA, North America; 
// Mumbai, India, Asia; Seoul, Korea, Asia; 
// Shanghai, China, Asia; Lagos, Nigeria, Africa; Buenos Aires, Argentina, South America; Cairo, Egypt, Africa; London, UK, Europe.


?>

<html>
<head>
<style type="text/css">
	td, th {width: 8em; border: 1px solid black; padding-left: 4px;}
	th {text-align:center;}
	table {border-collapse: collapse; border: 1px solid black;}
</style>
	<title>CITY ARRAYS</title>
</head>
<body>
	<table>
		<tr>
			<td><?= $label[0] ?></td>
			<td><?= $label[1] ?></td>
			<td><?= $label[2] ;?></td>
		</tr>
		<? for($i=1; $i < count($multicity); $i++) { ?>
		<tr>
			<td><?= $multicity[$i]['City']?></td><td><?= $multicity[$i]['Country']?><td><?= $multicity[$i]['Continent']?></td></td>
		</tr>
		<? } ?>		
	</table>
</body>
</html>