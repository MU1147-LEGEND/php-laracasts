<?php
session_start();

require("./utils/helper.php");
require("./src/models/Database.php");
require("./src/models/Validator.php");
require("./src/controllers/post-create.php");


$routes = require("./routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);
    require $routes['/not-found'];
    die();
}
