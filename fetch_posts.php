<?php

$config = require("./configs/config.php");

// creating new db instance
$db = new Database($config['database']);

// queries
$query = "SELECT * FROM posts WHERE author_id = ?";

// fetching
$posts = $db->query($query, [Verifyuser::$currentUserId])->get();

return $posts;
