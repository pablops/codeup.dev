<?php 
require_once 'Log.php';

class Auth{
	
	public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

	public static function attempt($username, $password) {
        if($username == 'guest' && password_verify($password, self::$password)){
        	$_SESSION['LOGGED_IN_USER'] = $username;
        	$user = new Log();
        	$user->info("User $username logged in.");
        	// Log->info("this is a message");
        	
        } else {
        	var_dump($password);
        	$user = new Log();
        	$user->error("User $username failed to log in");
        	// Log->info("User $username failed to log in!");    	
        }
    }

    public static function check(){
   		return !empty($_SESSION['LOGGED_IN_USER']) ? true : false;
    	// boolean of whether a user is logged in or not;
    }

    public static function user(){
    	// return the username of the current logged in user
    	if(Auth::check() == 'TRUE'){
    		// return USERNAME OF USER
    	} 
    }



}


?>