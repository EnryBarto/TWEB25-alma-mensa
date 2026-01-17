<?php
define("UPLOAD_DIR", "../public/upload/");

require_once("classes.php");
require_once("utils.php");
require_once("database.php");

session_start();

if (isUserLoggedIn()) {
   $user = $_SESSION["user"];
}

$dbh = new DatabaseHelper("localhost", "root", "", "almamensa", 3306);
?>