<?php

function dd($value)
{
    echo "<pre style='font-size:26px;margin:20px 100px;'>";
    var_dump($value);
    echo "</pre>";
    die();
}

class Verifyuser
{

    public static $currentUserId = 5;

    public static function isLoggedIn()
    {
        $config = require("./configs/config.php");
        $db = new Database($config['database']);
        $query = "SELECT id FROM authors WHERE id= ?";
        $user = $db->query($query, [self::$currentUserId])->find();
        return $user;
    }
}
