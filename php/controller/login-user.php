<?php
 require_once(__DIR__ . "/../model/config.php");

        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
// this query selects a username and password that match the users information
        $query = $_SESSION["connection"]->query("SELECT salt, password FROM users WHERE username = '$username' ");
//this function checks to see if the login information matches the login information from our database
        if ($query->num_rows == 1) {
            $row = $query->fetch_array();
// this if statement runs the login info in the database and the 3 equals signs check to see if the login info matches
            if ($row["password"] === crypt($password, $row["salt"])) {
                $_SESSION["authenticated"] = true;
                echo "<p>Login Successful</p>";
            } else {
                echo "<p>Invalid username and password</p>";
            }
        } else {
            echo "<p>Invalid username and password</p>";
        }