<?php
require("./src/models/Database.php");
$config = require("./configs/config.php");

// creating new DB instance
$db = new Database($config['database']);

// queries
$query = "SELECT * FROM authors";

// fetching
$authors = $db->query($query)->get();

return $authors;