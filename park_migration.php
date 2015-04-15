<?
define("DB_HOST", "127.0.0.1");
define("DB_NAME", "parks_db");
define("DB_USER", "parks_user");
define("DB_PASS", "codeup");

require 'db_connect.php';

$query = 'DROP TABLE IF EXISTS national_parks;

	CREATE TABLE national_parks (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(200) NOT NULL,
    location VARCHAR(100) NOT NULL,
    date_established DATE,
    area_in_acres DOUBLE, 
    PRIMARY KEY (id)
)';

$dbc->exec($query);
?>