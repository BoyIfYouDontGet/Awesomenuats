<?php
// this goes and finds a file once
	require_once(__DIR__ . "/../model/config.php");

// checks if their is a connection error



	$query = $_SESSION["connection"]->query("CREATE TABLE posts (" 
		. "id int(11) NOT NULL AUTO_INCREMENT," 
		. "title varchar(255) NOT NULL," 
		. "post text NOT NULL," 
		. "DateTime datetime NOT NULL," 
		. "PRIMARY KEY (id) )");
// created a query and a table
//checks to see if the table exists in our database
	if ($query) {
    	echo "<p>Successfully created table: posts</p> ";
	} 
	else {
    	echo "<p>" . $_SESSION["connection"]->error . "</p>";
	}
// added paragraph tags
//creating new query using a session. Creating a table for the users
	$query = $_SESSION["connection"]->query("CREATE TABLE users(" 
		. "id int(11) NOT NULL AUTO_INCREMENT," 
		. "username varchar(30) NOT NULL," 
		. "email varchar(50) NOT NULL," 
		. "password char(128) NOT NULL," 
		. "salt char(128)NOT NULL," 
		. "PRIMARY KEY (id) )");
// im going to check if this table works by runnig an if else statement
	if ($query) {
    	echo "<p>Successfully created table:users</p>";
	} 
	else {
    	echo "<p>" . $_SESSION["connection"]->error . "</p>";
	}
?>