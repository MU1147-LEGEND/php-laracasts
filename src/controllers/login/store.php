<?php
$config = require(__DIR__ . "/../../../configs/config.php");
// validate the form
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $email = $_POST['email'] ?? "";
    $pass = $_POST['pass'] ?? "";

    if (! Validator::email($email)) {
        $errors['email'] = "Please provide a valid email.";
    }

    if (! Validator::string($pass, 6, 255)) {
        $errors['pass'] = "Please provide a password of 6 or grater than characters.";
    }

    if (! empty($errors)) {
        return;
    }

    $db = new Database($config['database']);

    // check if the user exist or not
    $query = "SELECT * FROM authors WHERE email = ?";
    $user = $db->query($query, [$email])->find();

    if ($user) {
        if (password_verify($pass, $user['pass'])) { // will handle with middlware later.
            $_SESSION['user'] = [
                'name' => $name,
                'email' => $email,
            ];
        }

        header("Location: /");
        exit;
    } else {
        $errors['user_not_exist'] = "The email isn't registered, please register first.";
    }
}
