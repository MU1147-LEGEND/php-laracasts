<?php
require('./Database.php');

$config = require("./config.php");

$id = $_GET['id'];

if (!$id) {
    header("Location: /");
    die();
}

// creating new db instance
$db = new Database($config['database']);

$query = "select title from posts where id = ?";

$post = $db->query($query, [$id])->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Post</title>
</head>
<body>
    <h2>
        <?= strtoupper($post['title']) ?>
    </h2>
</body>
</html>
