<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles.css">
    <title>Register</title>
</head>

<body>
    <div class="wrapper">
        <h1>Create an account</h1>
        <form method="POST" action="/register">
            <input type="email" name="email" id="email" placeholder="Email" value="<?= $_POST['email'] ?? "" ?>">
            <?php if (isset($errors['email'])): ?>
                <p style="color:red;"> <?= $errors['email'] ?> </p>
            <?php endif; ?>
            <input type="password" name="pass" id="pass" placeholder="Password" value="<?= $_POST['pass'] ?? "" ?>">
            <?php if (isset($errors['pass'])): ?>
                <p style="color:red;"> <?= $errors['pass'] ?> </p>
            <?php endif; ?>
            <button type="submit" name="register">Register</button>
            <?php if (isset($errors['user_exist'])): ?>
                <span style="color:red;"> <?= $errors['user_exist'] ?> </span>
            <?php endif; ?>

        </form>
        <span>or</span>
        <a href="/login">Log in</a>
    </div>
</body>

</html>