<?php 


$multicity = array(
	array("City", "Country", "Continent"),
	array("City" => "Tokyo", "Country" => "Japan", "Continent" => "Asia"),
	array("City" => "Mexico City", "Country" => "Mexico", "Continent" => "North America"),
	array("City" => "New York City", "Country" => "USA", "Continent" => "North America"),
	array("City" => "Mumbai", "Country" => "India", "Continent" => "Asia"),
	array("City" => "Shanghai", "Country" => "China", "Continent" => "Asia"),
	array("City" => "Shanghai", "Country" => "China", "Continent" => "Asia"),
	array("City" => "Lagos", "Country" => "Nigeria", "Continent" => "Africa"),
	array("City" => "Buenos Aires", "Country" => "Argentina", "Continent" => "South America"),
	);

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
			<td><?= $multicity[0][0] ?></td>
			<td><?= $multicity[0][1] ?></td>
			<td><?= $multicity[0][2] ;?></td>
		</tr>
		<? for($i=1; $i < count($multicity); $i++) { ?>
		<tr>
			<td><?= $multicity[$i]['City']?></td><td><?= $multicity[$i]['Country']?><td><?= $multicity[$i]['Continent']?></td></td>
		</tr>
		<? } ?>		
	</table>
</body>
</html>