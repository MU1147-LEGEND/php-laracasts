<?php

if ($_SESSION['user'] ?? false) { // I will replace the logic using middleware.
    header("Location: /");
    exit();
}

require(__DIR__ . "/store.php");
require(__DIR__ . "/../../../views/login/create.view.php");
