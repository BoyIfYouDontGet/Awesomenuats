<?php
  // this file will log out oa user
        require_once(__DIR__ . "/../model/config.php");

        unset($_SESSION["authenticated"]);
//destroys a session if the user is logging out
        session_destroy();
        header("Location: " . $path . "index.php");
        