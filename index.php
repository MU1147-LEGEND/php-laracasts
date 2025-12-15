<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
</head>

<body>
    <h1>My Posts</h1>
    <?php
    $posts = require("./fetch_posts.php");
    foreach ($posts as $post) {
        echo "<a href=/post.php?id=". $post['id'] .">" . $post['title'] . "</a> <br/>";
    }
    ?>

    <h2>Add Post to Database</h2>

    <form action="db_action.php">

        <label for="name">Title:</label>
        <input type="text" id="name">
    </form>
</body>

</html>