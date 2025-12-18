<?php
$posts = require("./fetch_posts.php");
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
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2>Welcome to PHP CRUD Application</h2>
            <div>
                <?php if ($_SESSION['user'] ?? false): ?>
                    <span>Hello, <?= htmlspecialchars($_SESSION['user']['name']) ?></span> <a>Log Out</a>
                <?php else: ?>
                    <a href="/register"><button>Register</button></a>
                <?php endif; ?>
            </div>
        </div>

        <?php
        $loggedIn = Verifyuser::isLoggedIn();
        $user = $loggedIn ? $loggedIn['id'] : null;
        if (!$user) {
            echo "<h2>Please login</h2>";
            exit();
        }
        ?>

        <h1>My Posts</h1>

        <?php foreach ($posts as $post): ?>
            <a href="/post?id=<?= $post['id'] ?>">
                <span style="display: flex; align-items:center; justify-content:space-between;">
                    <?= htmlspecialchars($post['title']) ?>
                    <form class="form-reset" method="POST" title="This will delete the post - no confirmation">
                        <input type="hidden" name="id" value="<?= $post['id'] ?>">
                        <button style="background-color: tomato ;" type="submit" name="post-delete">Delete</button>
                    </form>
                </span> </a>
            <br />
        <?php endforeach ?>

        <h2>Add Post to Database</h2>

        <form method="POST">

            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?= $_POST['title'] ?? "" ?>">
                <?php if (isset($errors['title'])): ?>
                    <p style="color:red;"> <?= $errors['title'] ?> </p>
                <?php endif; ?>
            </div>

            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description" cols="30" rows="10"><?= $_POST['description'] ?? "" ?></textarea>
                <?php if (isset($errors['description'])): ?>
                    <p style="color:red;"> <?= $errors['description'] ?> </p>
                <?php endif; ?>
            </div>

            <button type="submit" name="post-create">Add Post</button>

        </form>
    </div>
</body>

</html>