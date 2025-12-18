<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles.css">
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <h1>Login</h1>
        <form method="POST" action="/login">

            <input type="email" name="email" id="email" placeholder="Email" value="<?= $_POST['email'] ?? "" ?>">
            <?php if (isset($errors['email'])): ?>
                <p style="color:red;"> <?= $errors['email'] ?> </p>
            <?php endif; ?>
            <input type="password" name="pass" id="pass" placeholder="Password" value="<?= $_POST['pass'] ?? "" ?>">
            <?php if (isset($errors['pass'])): ?>
                <p style="color:red;"> <?= $errors['pass'] ?> </p>
            <?php endif; ?>
            <button type="submit" name="login">Login</button>

            <br>
            <span>or</span>
        </form>
        <button style="display: block; margin:10px 0;">
            <a class="a-reset" href="/register">Register</a>
        </button>
    </div>
</body>

</html>