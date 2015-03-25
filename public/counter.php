<? 

	function updateCount(){
		$data = [];
		
		if(!isset($_GET['counter'])){
			$counter = 0;
		}
		if(!empty($_GET)) {
			if($_GET['direction'] === 'up'){
				$counter = ++$_GET['counter'];
			}elseif($_GET['direction'] === 'down'){
				$counter = --$_GET['counter'];
			}
		}

		$data['counter'] = $counter;
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
	<h1>GET Request Counter Exercise</h1>
	<!-- H2 shows current counter value -->
	<pre> <?= $counter; ?> </pre>
	<a href="?direction=up&counter=<?= $counter; ?>">UP!</a>
	<a href="?direction=down&counter=<?php echo $counter; ?>">DOWN!</a><br/>
</body>
</html>