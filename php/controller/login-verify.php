<?php
     require_once(__DIR__ . "/../model/config.php");

//this functiion checks to see if the session has started and the the user has logged in
//if the session is not true then they are not logged in
        function authenticateUser() {
            if (!isset($_SESSION["authenticated"])) {
                return false;
            } else {
                if ($_SESSION["authenticated"] != true) {
                    return false;
                } else {
                    return true;
                }
            }
        }