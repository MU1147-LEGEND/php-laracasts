<?php
$posts = require("./fetch_posts.php");
require './helper.php';

// dd($posts[1]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>PHP CRUD</title>
</head>

<body>
    <div class="wrapper">
        <h1>All Posts</h1>

        <?php foreach ($posts as $post): ?>
            <a href="/post.php?id=<?= $post['id'] ?>"> <?= $post['title'] ?> </a> <br />
        <?php endforeach ?>

        <h2>Add Post to Database</h2>

        <form action="db_action.php">

            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description" cols="30" rows="10" required></textarea>
            </div>

            <!-- <div>
                <label for="author_id">Author ID:</label>
                <input type="number" id="author_id" name="author_id">

                <select name="author_id" id="author_id">
                    
                </select>
            </div> -->

            <button type="submit">Add Post</button>

        </form>
    </div>
</body>

</html>