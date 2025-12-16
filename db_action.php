<?php
require('./Database.php');
$config = require("./config.php");

// creating new db instance
$db = new Database($config['database']);

$query = "INSERT INTO posts (title, description, author_id) VALUES (?, ?, ?)";
$title = $_GET['title'];
echo $title;