<?php
require('./Database.php');

$config = require("./config.php");

// $id = $_GET['id'];

// creating new db instance
$db = new Database($config['database']);

// queries
$query = "SELECT * FROM posts";

// fetching
$posts = $db->query($query)->fetchAll();

return $posts;
