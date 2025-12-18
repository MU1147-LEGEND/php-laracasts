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
        $errors['user_exist'] = "The email already registered, please log in.";

    } else {
        $name = explode("@", $email)[0];
        $query = "INSERT INTO authors(name, email, pass) VALUES(?, ?, ?)";

        $db->query($query, [$name, $email, password_hash($pass, PASSWORD_DEFAULT)]);

        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email,
        ];

        header("Location: /");
        exit;
    }
}
