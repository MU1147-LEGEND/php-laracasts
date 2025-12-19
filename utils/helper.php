<?php

function dd($value)
{
    echo "<pre style='font-size:26px;margin:20px 100px;'>";
    var_dump($value);
    echo "</pre>";
    die();
}
User::initialize();

class User
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

    public static function logout()
    {
        // log out the user
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
