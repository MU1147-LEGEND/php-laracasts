<?php

// if the user already logged in then redirect to home.
if ($_SESSION['user'] ?? false) { // I will replace the logic using middleware.
    header("Location: /");
    exit();
}

// else load the necessary files for login

require(__DIR__ . "/store.php");
require(__DIR__ . "/../../../views/login/create.view.php");
