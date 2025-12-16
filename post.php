<?php
require('./Database.php');

$config = require("./config.php");

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
$post = $db->query($postQuery, [$id])->fetch();
$author = $db->query($authorQuery, [$post['author_id']])->fetch();


// echo "<pre>";
// var_dump($author);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Single Post</title>
</head>

<body>
    <div class="wrapper">
        <p>
            <a href="/" style="padding: 5px;margin:5px;">⬅️Go back</a>
        </p>
        <h2 style="text-align:center;">
            <?= strtoupper($post['title']) ?>
        </h2>
        <p>
            <?= $post['description'] ?>

            <span style="font-weight: bold; padding-top:50px;display:block;">
                <a href="mailto:<?= $author['email'] ?>">
                    <?= "Posted by " . $author['name'] ?>
                </a>
            </span>
        </p>
    </div>
</body>

</html>