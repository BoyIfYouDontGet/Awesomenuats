<?php
// requires the config file so that this file can work with the information in the config file
	require_once(__DIR__ ."/../model/config.php");
// this variable stores the email of a user to the database
	$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
// this variable stores the username of a user to the database
	$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
// this variable stores the password and encrypts it in the database
	$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

	echo $password;

// this variable creates a hash so that passwords are unique and protected
	$salt = "$5$" . "rounds=5000$" . uniqid(mt_rand(), true) . "$";
	$hashedPassword = crypt($password,$salt);
//creating a query so that i can store the encrypted passwords in the database using sessions
	$query = $_SESSION["connection"]->query("INSERT INTO users SET "
			. "email ='$email'," 
			. "username = '$username',"
			. "password = '$hashedPassword',"
			. "salt = '$salt'");
	if($query) {
		echo "Successfully created user: $username";
	}
	else {
	 echo "<p>" . $_SESSION["connection"]->error . "</p>";
}
