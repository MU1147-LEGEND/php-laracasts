<?php

$config = require("./configs/config.php");

// creating new db instance
$db = new Database($config['database']);

// queries
$query = "SELECT * FROM posts WHERE author_id = ?";

// fetching
$user = Verifyuser::isLoggedIn();
$posts = $user ? $db->query($query, [$user["id"]])->get() : [];

return $posts;
