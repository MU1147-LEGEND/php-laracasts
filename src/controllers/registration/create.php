<?php

// if the use already logged in then redirect
if($_SESSION['user'] ?? false){ // I will replace the logic using middleware.
    header("Location: /");
    exit();
}

// else load the necessary files for registration
require(__DIR__ . "/store.php");
require(__DIR__ . "/../../../views/registration/create.view.php");