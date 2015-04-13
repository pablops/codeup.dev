<?php
require_once '../VisibilityAuth.php';
require_once '../Input.php';
session_start();
// var_dump(session_id());
// var_dump($_POST);

//$username = isset($_POST['username']) ? $_POST['username'] : '';
//$password = isset($_POST['password']) ? $_POST['password'] : '';

if(Input::has('username') && Input::has('password')) {
		Auth::attempt(Input::get('username'), Input::get('password'));

	if(Auth::check()) {
		header('Location: authorized.php');
	}
	 else { 
		echo "Username or Password is incorrect";
		var_dump(Input::get('password'));

	}
}
else {
	echo "Input Information\n";
} 

?>

<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>
    <form method="POST" action="login.php">
        <label>Username</label>
        <input type="text" name="username"><br>
        <br />
        <label>Password</label>
        <input type="password" name="password"><br>
        <br>
        <input type="submit" >
    </form>


</body>
</html>
