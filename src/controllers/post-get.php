<?php

$loginStatus = User::isLoggedIn();

if(! $loginStatus){
    echo "<h3>You're not authorized to view this post.</h3>";
    exit;
}

$config = require(__DIR__ . "/../../configs/config.php");

$id = $_GET['id'];

// if user tried to browse wrong post then redirect to home.
if (!$id) {
    header("Location: /");
    die();
}

// creating new db instance
$db = new Database($config['database']);

// queries
$postQuery = "SELECT * FROM posts WHERE id = ?";
$authorQuery = "SELECT * FROM authors WHERE id = ?";

// fetching
$post = $db->query($postQuery, [$id])->find();

if (! $post) {
    echo "<h3>Not found</h3>";
    exit;
}

$author = $db->query($authorQuery, [$post['author_id']])->find();

require(__DIR__ . "/../../views/post.view.php");

?>