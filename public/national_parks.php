<?
define("DB_HOST", "127.0.0.1");
define("DB_NAME", "parks_db");
define("DB_USER", "parks_user");
define("DB_PASS", "codeup");

require '../db_connect.php';
require '../Input.php';


if(empty($_GET['page'])){
	$_GET['page'] = 1;
} 

if($_GET['page'] > 3){
	$_GET['page'] = 1;
} elseif (($_GET['page'] < 1) || !is_numeric($_GET['page'])){
	$_GET['page'] = 1;
}

if(isset($_POST['remover'])){
	$remove_park=$dbc->prepare("DELETE FROM national_parks WHERE id = :id");
	$remove_park->bindValue(':id', $_POST['remover'], PDO::PARAM_INT);
	$remove_park->execute();
}

if(!empty($_POST) && !Input::has('remover')){
	$query = 'INSERT INTO national_parks (name, description, location, date_established, area_in_acres) 
			  VALUES (:name, :description, :location, :date_established, :area_in_acres)';
	$stmt = $dbc->prepare($query);
	try{ 
		$stmt->bindValue(':name',                Input::getString('name', 1, 29),                   PDO::PARAM_STR);
		$stmt->bindValue(':description',         Input::getString('description', 1, 399),           PDO::PARAM_STR);
		$stmt->bindValue(':location',            Input::getString('location', 1, 70),               PDO::PARAM_STR);
		$stmt->bindValue(':date_established',    $_POST['established'],                             PDO::PARAM_STR);
		$stmt->bindValue(':area_in_acres',       Input::getNumber('area', 0),                       PDO::PARAM_STR);	
		$stmt->execute();	 
	} catch (Exception $e) {
		 echo $e->getMessage();
	}
}

$offset = 4 * ($_GET['page'] - 1);

$parks = $dbc->prepare("SELECT * FROM national_parks LIMIT 4 OFFSET :offset");
 
$parks->bindValue(':offset',$offset,PDO::PARAM_INT);

$parks->execute();


?>

<html>
<head>
	<title>N/\TION/\L P/\RKS</title>
	<style>
		body {
			margin: 0 auto;
			background-color: #C0C0C0;
		}
		table {
			float: none;
			margin: 0 auto;
			background-color: white;
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
		#submit{
			background-color: #EEE;
			border-radius:0;
			border:1px solid #999;
			color:#666;
			font-family:'Lucida Grande',Tahoma,Verdana,Arial,Sans-serif;
			font-size:11px;
			font-weight:700;
			padding:2px 6px;
			height:28px
		}
		.title {
			font-weight: bold;
		}
		.deletions{
			border: none;
			color: red;
			background: white;
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
			<td class='title'>NAME</td>
			<td class='title'>LOCATION</td>
			<td class='title'>DESCRIPTION</td>
			<td class='title'>EST.</td>
			<td class='title'>AREA</td>
			<td class='title'>DELETE</td>
		</div>
	<? foreach($parks as $park){ ?>
		<tr>		 
			<td><?= $park['name']; ?></td>
			<td><?= $park['location']; ?></td>
			<td><?= $park['description']; ?></td>
			<td><?= $park['date_established']; ?></td>
			<td><?= $park['area_in_acres']; ?></td>
			<td>
				<form method='post'>
					<input type='hidden' name="remover" value="<?=$park['id']?>">
					<input type='submit' value="X" class='deletions'>
				</form>
			</td>
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
  		<input type="text" name="name" placeholder="Name" value="<?=Input::get('name')?>"><br>
  		<input type="text" name="location" placeholder="Location" value="<?=Input::get('location')?>"><br>
  		<input type="text" name="description" placeholder="Description" value="<?=Input::get('description')?>"><br>
  		<input type="text" name="established" placeholder="Established" value="<?=Input::get('established')?>"><br> 
  		<input type="text" name="area" placeholder="Area" value="<?=Input::get('area')?>"><br> 
  		<br>
  		<input type="submit" value="Submit" id="submit">
	</form>
	<h3>This page is sponsored by</h3><a href="http://www.bing.com">BING: Bing it!</a>
</body>
</html>



