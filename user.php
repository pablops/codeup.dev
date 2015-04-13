<?php 
require 'model.php';

class User extends Model {
// contain the overridden $table property, set to users
	protected static $table = 'testing';
}

echo User::getTableName() . PHP_EOL;

?>