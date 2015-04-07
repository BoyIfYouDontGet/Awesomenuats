<?php

	require_once(__DIR__ . "/database.php");
	session_start();
	session_regenerate_id(true);
	$path     = "/BLOG/";
//refracted the variable from database.php to this config.php. I refractured this code because it make it easier for us to maintain our website
// variables
	$host     = "localhost";
	$username = "root";
	$password = "root";
	$database = "blog_db";
/// this variable contains all the functions (open connection close connection etc. )
//this if statement checks if a session has started. if it has started, then a new database object will not start.
	if (!isset($_SESSION["connection"])) {
    	$connection = new Database($host, $username, $password, $database);
    //created session
    	$_SESSION["connection"] = $connection;
	}
?>