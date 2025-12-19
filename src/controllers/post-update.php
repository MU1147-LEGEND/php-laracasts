<?php

$loginStatus = User::isLoggedIn();

if (! $loginStatus) {
    echo "<h3>You're not authorized to view this post.</h3>";
    exit;
}


$config = require(__DIR__ . "/../../configs/config.php");
$db = new Database($config['database']);

$postId = $_GET['id'] ?? null;

if (! $postId) {
    header("Location: /");
    exit;
}

$post = $db->query("select * from posts where id = ?", [$postId])->find();

if (! $post) {
    echo "<h3>Post not found</h3>";
    exit;
}

if ($post['author_id'] !== $_SESSION['user']['author_id']) {
    echo "<h3>You're not authorized to edit/update this post.</h3>";
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['post-update'])) {
        if (! Validator::string($_POST['title'], 1, 500)) {
            $errors['title'] = "A title is no more than 500 characters required";
        }

        if (! Validator::string($_POST['description'], 1, 1000)) {
            $errors['description'] = "A description is no more than 5000 characters required";
        }

        if (empty($errors)) {
            $query = "UPDATE posts SET title = ?, description = ? WHERE id = ?";
            $db->query($query, [$_POST['title'], $_POST['description'], $post['id']]);
            header("Location: /post?id=" . $post['id']);
            exit;
        }
    }
}

require(__DIR__ . "/../../views/edit.view.php");
