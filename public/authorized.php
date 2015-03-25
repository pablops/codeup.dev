<?php  
require_once '../Auth.php';
session_start();
var_dump(session_id());
//$username = $_SESSION['LOGGED_IN_USER'];

if(!Auth::check()) {  
	header('Location: login.php');
} else {
	// echo $username;
}

?>


<html>
<head>
	<title></title>
</head>
<body>
	<a href="logout.php">LOGZOUT</a>

</body>
</html>