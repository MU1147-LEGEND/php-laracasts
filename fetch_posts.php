<?php
require('./Database.php');

$config = require("./config.php");

// $id = $_GET['id'];

// creating new db instance
$db = new Database($config['database']);

$query = "select * from posts";

$posts = $db->query($query)->fetchAll();


return $posts;
