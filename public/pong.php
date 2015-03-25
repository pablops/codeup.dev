<? 
// include 'functions.php';
require_once '../Input.php';


	function updateCount(){
		$data = [];
		// if(empty($_GET['result']) && empty($_GET['counter'])){
		// 	$counter = 0;
		// }
		if(!Input::has('result') && !Input::has('counter')){
			$counter = 0;
		} 

		if(Input::has('result') && Input::get('result') == 'MISS'){
			$counter = 0;
		}
		// if(!empty($_GET['result']) && $_GET['result'] == 'MISS'){
		// 	$counter = 0;
			// end the game
		// } 
		elseif(Input::has('result') && Input::get('result') == 'HIT'){
			$counter = Input::get('counter');
		}

		// elseif (!empty($_GET['result']) && $_GET['result'] == 'HIT'){
		// 	$counter = $_GET['counter'];
		// }
		$data['counter'] = $counter;
		//return completed data array;
		return $data;
	}
	
	extract(updateCount());	
?>
<html>
<head>
	<title></title>
</head>
<body>
	<? var_dump($_GET); ?>
	<h1>PingPong</h1>
	<!-- H2 shows current counter value -->
	<pre> <?= $counter; ?> </pre>
	<a href="ping.php?result=HIT&counter=<?=$counter + 1; ?>">HIT</a>
	<a href="ping.php?result=MISS&counter=0">MISS</a><br/>
</body>
</html>