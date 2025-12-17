<?php
require(__DIR__ . "/../models/Validator.php");
require(__DIR__ . "/../models/Database.php");

$config = require(__DIR__ . "/../../configs/config.php");
$db = new Database($config['database']);
$post = $db->query("select * from posts where id = ?", [$_POST['id']])->find(); // need to fix this.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['post-update'])) {
        $errors = [];

        if (! Validator::string($_POST['title'], 1, 500)) {
            $errors['title'] = "A title is no more than 500 characters required";
        }

        if (! Validator::string($_POST['description'], 1, 1000)) {
            $errors['description'] = "A description is no more than 5000 characters required";
        }

        if (empty($errors)) {
            $query = "UPDATE posts SET title = ?, description = ? WHERE id = ?";
            $db->query($query, [$_POST['title'], $_POST['description'], $post['id']]);
            // header("Location: /views/post.view.php?id=" . $post['id']);
            // exit;
        }
    }
}


// update the post