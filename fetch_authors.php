<?php
require("./Database.php");
$config = require("./config.php");

// creating new DB instance
$db = new Database($config['database']);

// queries
$query = "SELECT * FROM authors";

// fetching
$authors = $db->query($query)->get();

return $authors;