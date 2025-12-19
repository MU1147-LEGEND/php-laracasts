<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Single Post</title>
</head>

<body>
    <div class="wrapper">
        <p style="display: flex; align-items:center; justify-content:space-between;">
            <a href="/">⬅️ Go back</a>

            <?php if ($post['author_id'] === $_SESSION['user']['author_id']): ?>
                <a href="/edit?id=<?= $post['id'] ?>">Edit</a>
            <?php endif ?>
        </p>
        <h2 style="text-align:center;">
            <?= strtoupper(htmlspecialchars($post['title'])) ?>
        </h2>
        <p>
            <?= htmlspecialchars($post['description']) ?>

            <span style="font-weight: bold; padding-top:50px;display:block;">
                <a href="mailto:<?= $author['email'] ?>">
                    <?= "Posted by " . $author['name'] ?>
                </a>
            </span>
        </p>
    </div>

    <script>
        // click the go back button if esc key is pressed
        document.addEventListener('keyup', function(event) {
            if (event.key === "Escape") {
                window.location.href = "/";
            }
        });
    </script>
</body>

</html>