<?php
require("./Database.php");
require("./helper.php");
$config = require("./config.php");


// creating new db instance
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $errors = [];

    if (strlen($_POST['title']) === 0) {
        $errors['title'] = "A title is required";
    }

    if (strlen($_POST['title']) > 500) {
        $errors['title'] = "Title can't be more than 500 characters";
    }

    if (strlen($_POST['description']) === 0) {
        $errors['description'] = "A description is required";
    }

    if (strlen($_POST['description']) > 5000) {
        $errors['description'] = "Description can't be more than 5,000 characters";
    }

    if (empty($errors)) {
        $query = "INSERT INTO posts (title, description, author_id) VALUES (?, ?, ?)";
        $db->query($query, [$_POST['title'], $_POST['description'], 1]);
        header("Location: index.php");
        exit;
    } 
}
