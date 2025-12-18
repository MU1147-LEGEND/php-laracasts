<?php

function dd($value)
{
    echo "<pre style='font-size:26px;margin:20px 100px;'>";
    var_dump($value);
    echo "</pre>";
    die();
}
Verifyuser::initialize();

class Verifyuser
{
    public static $currentEmail;

    public static function initialize()
    {
        self::$currentEmail = $_SESSION['user']['email'] ?? false;
    }

    public static function isLoggedIn()
    {
        $config = require("./configs/config.php");
        $db = new Database($config['database']);
        $query = "SELECT id FROM authors WHERE email= ?";
        $user = $db->query($query, [self::$currentEmail])->find();
        return $user;
    }
}
