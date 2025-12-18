<?php

$config = require("./configs/config.php");

// creating new db instance
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['post-create'])) {

        $errors = [];

        if (! Validator::string($_POST['title'], 1, 500)) {
            $errors['title'] = "A title is no more than 500 characters required";
        }

        if (! Validator::string($_POST['description'], 1, 1000)) {
            $errors['description'] = "A description is no more than 5000 characters required";
        }

        if (empty($errors)) {
            $query = "INSERT INTO posts (title, description, author_id) VALUES (?, ?, ?)";
            $db->query($query, [$_POST['title'], $_POST['description'], Verifyuser::isLoggedIn()['id']]);
            header("Location: /");
            exit;
        }
    }

    if (isset($_POST['post-delete'])) {
        $query = "DELETE FROM posts WHERE id= ?";
        if (! Verifyuser::isLoggedIn()['id']) {
            header("Location: /");
            exit;
        }
        $db->query($query, [$_POST['id']]);
        header("Location: /");
        exit;
    }
}
