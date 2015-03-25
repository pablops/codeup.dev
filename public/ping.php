<? 
// include 'functions.php';
require_once '../input.php';


	function updateCount(){
		$data = [];

		if(!Input::has('result') && !Input::has('counter')){
			$counter = 0;
		} 

		if(Input::has('result') && Input::get('result') == 'MISS'){
			$counter = 0;
		}

		elseif(Input::has('result') && Input::get('result') == 'HIT'){
			$counter = Input::get('counter');
		}

		$data['counter'] = $counter;
		var_dump($data);
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
	<h1>PingPong!</h1>
	<!-- H2 shows current counter value -->
	<pre> <?= $counter; ?> </pre>
	<a href="pong.php?result=HIT&counter=<?= $counter + 1; ?>">HIT</a>
	<a href="pong.php?result=MISS&counter=0">MISS</a><br/>

</body>
</html>