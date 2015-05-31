<?php
    $input  = $_POST['value'];
    $count  = 0;
    $l = strlen($input);
    if(!is_numeric($input) || !isset($input)){
    	echo "please enter a valid number";
    } else{
    	// echo $l;
    	for($i=0; $i<$l; $i++){
    		$count = $count + $input[$i];
    	}
    echo $count;
    }
?>
<form method="post" action="">
<br>
<input type="text" name="value">
<input type="submit">
</form>