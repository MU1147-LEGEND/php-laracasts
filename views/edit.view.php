<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Edit post</title>
</head>

<body>
    <form method="POST" action="./edit?id=<?= $post['id'] ?>">

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= $post['title'] ?>">
            <?php if (isset($errors['title'])): ?>
                <p style="color:red;"> <?= $errors['title'] ?> </p>
            <?php endif; ?>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" cols="30" rows="10"><?= $post['description'] ?></textarea>
            <?php if (isset($errors['description'])): ?>
                <p style="color:red;"> <?= $errors['description'] ?> </p>
            <?php endif; ?>
        </div>

        <button type="submit" name="post-update">Update</button>
        <a href="/post?id=<?= $post['id'] ?>" style="display: inline; background-color:tomato; color:white; border:none;padding: 12px 32px;">Cancel</a>

    </form>
</body>

</html>