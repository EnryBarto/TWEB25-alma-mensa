<?php
define("UPLOAD_DIR", "../upload/");

require_once("utils.php");
require_once("database.php");

session_start();

if (!isUserLoggedIn()) {
    $userData["level"] = UserLevel::NotLogged;
} else {
    $userData["level"] = $_SESSION["level"];
}

$dbh = new DatabaseHelper("localhost", "root", "", "almamensa", 3306);
?>