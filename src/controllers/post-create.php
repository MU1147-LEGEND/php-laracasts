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
        // if there is no error; run the post create query.
        if (empty($errors)) {
            $query = "INSERT INTO posts (title, description, author_id) VALUES (?, ?, ?)";
            $db->query($query, [$_POST['title'], $_POST['description'], User::isLoggedIn()['id']]);
            header("Location: /");
            exit;
        }
    }

    if (isset($_POST['post-delete'])) {
        $query = "DELETE FROM posts WHERE id= ?";

        // if the user is not logged in then kill the process and redirect to home
        if (! User::isLoggedIn()['id']) {
            header("Location: /");
            exit;
        }
        // if logged in then delete the post referring with id.
        $db->query($query, [$_POST['id']]);
        header("Location: /");
        exit;
    }
}
