<?
define("DB_HOST", "127.0.0.1");
define("DB_NAME", "parks_db");
define("DB_USER", "parks_user");
define("DB_PASS", "codeup");

require '../db_connect.php';

// var_dump($_POST);

if(empty($_GET['page'])){
	$_GET['page'] = 1;
} 

if($_GET['page'] > 3){
	$_GET['page'] = 1;
} elseif (($_GET['page'] < 1) || !is_numeric($_GET['page'])){
	$_GET['page'] = 1;
}

if(!empty($_POST)){
	if(empty($_POST['name'])){
		echo "********************************ENTER A VALID NAME********************************";
	} elseif(empty($_POST['description'])){
		echo "********************************ENTER A VALID DESCRIPTION********************************";
	} elseif(empty($_POST['location'])){
		echo "********************************ENTER A VALID LOCATION********************************";
	} elseif(empty($_POST['established'])){
		echo "********************************ENTER A VALID DATE********************************";
	} elseif(empty($_POST['area']) || !is_numeric($_POST['area'])){
		echo "********************************ENTER A VALID AREA********************************";
	} else{
	$query = 'INSERT INTO national_parks (name, description, location, date_established, area_in_acres) 
			  VALUES (:name, :description, :location, :date_established, :area_in_acres)';
	$stmt = $dbc->prepare($query);
	$stmt->bindValue(':name',                $_POST['name'],        PDO::PARAM_STR);
	$stmt->bindValue(':description',         $_POST['description'], PDO::PARAM_STR);
	$stmt->bindValue(':location',            $_POST['location'],    PDO::PARAM_STR);
	$stmt->bindValue(':date_established',    $_POST['established'], PDO::PARAM_STR);
	$stmt->bindValue(':area_in_acres',       $_POST['area'],        PDO::PARAM_STR);
	$stmt->execute();
	}
} 

$offset = 4 * ($_GET['page'] - 1);

$parks = $dbc->prepare("SELECT * FROM national_parks LIMIT 4 OFFSET :offset");
 
$parks->bindValue(':offset',$offset,PDO::PARAM_INT);

$parks->execute();

?>

<html>
<head>
	<title>Naty Parqz</title>
	<style>
		body {
			margin: 0 auto;
			background-color: yellow;
		}
		table {
			float: none;
			margin: 0 auto;
		}
		td {

			padding-right: 3px;
			padding-left: 3px;
			border: solid .9px;
			text-align: center;
		}
		h1 {
			text-align: center;
			color: red;
		}
		.buttons {
			text-align: center;
		}
		#titles{
			font-weight: bold;
			color: red;
			border-color: black;
			border: 0px;
		}
		a:hover {
			color: white;
		}
		#title1{
			background-color: black;
		}
		form{
			text-align: center;
		}

	</style>
</head>
<body>	
<!-- 	<? var_dump($_GET); ?> -->
	<div id='title1'>
	<h1>National Parks <img src="planetx2.gif"></h1>
	</div>
	<table>
		<div id='titles'>
			<td>NAME</td>
			<td>LOCATION</td>
			<td>DESCRIPTION</td>
			<td>EST.</td>
			<td>AREA</td>
		</div>
	<? foreach($parks as $park){ ?>
		<tr>		 
			<td><?= $park['name']; ?></td>
			<td><?= $park['location']; ?></td>
			<td><?= $park['description']; ?></td>
			<td><?= $park['date_established']; ?></td>
			<td><?= $park['area_in_acres']; ?></td>
		</tr>
	<? } ?> 
	</table>
<!-- 	<pre>Page Views: <?= $counter + 1798; ?> </pre> -->
	
	<div class='buttons'>
		<? if($_GET['page'] > 1): ?>
			<a href="national_parks.php?page=<?= $_GET['page'] - 1?>" id='left'>PREVIOUS</a>
		<? endif; ?>
		<? if($_GET['page'] < 3): ?>
			<a href="national_parks.php?page=<?= $_GET['page'] + 1?>" id='right'>NeXT</a>
		<? endif; ?>
	</div>
	<div class='buttons'>
		<a href="national_parks.php?page=<?=1?>" id='one'>1</a>
		<a href="national_parks.php?page=<?=2?>" id='two'>2</a>
		<a href="national_parks.php?page=<?=3?>" id='three'>3</a>
	</div>
		<br>
	<form action="national_parks.php" method="POST">
  		<input type="text" name="name" placeholder="Name"><br>
  		<input type="text" name="location" placeholder="Location"><br>
  		<input type="text" name="description" placeholder="Description"><br>
  		<input type="text" name="established" placeholder="Established"><br> 
  		<input type="text" name="area" placeholder="Area"><br> 
  		<br>
  		<input type="submit" value="Submit">
	</form>
	<h3>This page is sponsored by</h3><a href="http://www.bing.com">BING</a>
	<h3>Bing: Bing it!</h3>
</body>
</html>



