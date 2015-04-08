<?
define("DB_HOST", "127.0.0.1");
define("DB_NAME", "parks_db");
define("DB_USER", "parks_user");
define("DB_PASS", "codeup");

require '../db_connect.php';

if(empty($_GET['counter'])){
	$counter = 0;
} else {
	$counter = $_GET['counter'];
}



// 
if(empty($counter)){
	$counter = 0;
    $parks = $dbc->query("SELECT * FROM national_parks LIMIT 4 OFFSET 0")->fetchAll(PDO::FETCH_ASSOC);
   }
   else{
    $parks = $dbc->query("SELECT * FROM national_parks LIMIT 4 OFFSET $counter")->fetchAll(PDO::FETCH_ASSOC);
   }

// $parks = $dbc;
?>

<html>
<head>
	<title>Naty Parqz</title>
	<style>
		body {
			margin: 0 auto;
			background-color: yellow;
		}
		td {
			padding-right: 3px;
			padding-left: 3px;
			border: solid .9px;
			text-align: center;
		}
		table {
			margin-left: 190px;
		}
		h1 {
			text-align: center;
			color: red;
		}
		.buttons {
			text-align: center;
		}
	</style>
</head>
<body>	
<!-- 	<? var_dump($_GET); ?> -->
	<h1>National Parks</h1>
	<table>
			<td>NAME</td>
			<td>LOCATION</td>
			<td>EST.</td>
			<td>AREA</td>
	<? foreach($parks as $park){ ?>
		<tr>		 
			<td><?= $park['name']; ?></td>
			<td><?= $park['location']; ?></td>
			<td><?= $park['date_established']; ?></td>
			<td><?= $park['area_in_acres']; ?></td>
		</tr>
	<? } ?> 
	</table>
	<pre>Page Views: <?= $counter; ?> </pre>
	
	<div class='buttons'>
		<? if($counter > 3){ ?>
			<a href="national_parks.php?q=pre&counter=<?= $counter + - 4 ?>;" id='left'>PREVIOUS</a>
		<? } ?>
		<? if($counter < 8){ ?>
			<a href="national_parks.php?q=nxt&counter=<?= $counter + 4 ?>;" id='right'>NeXT</a>
		<? } ?>
	</div>
	<div class='buttons'>
		<a href="national_parks.php?q=nxt&counter=<?=0?>;" id='one'>1</a>
		<a href="national_parks.php?q=nxt&counter=<?=4?>;" id='two'>2</a>
		<a href="national_parks.php?q=nxt&counter=<?=8?>;" id='three'>3</a>
	</div>
	<h3>This page is sponsored by</h3><a href="http://www.bing.com">BING</a>
	<h3>Bing: Bing it!</h3>
</body>
</html>



