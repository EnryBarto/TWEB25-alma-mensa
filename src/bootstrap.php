<?php
session_start();
define("UPLOAD_DIR", "../upload/");

require_once("utils.php");
require_once("database.php");

if (!isUserLoggedIn()) {
    $userData["level"] = UserLevel::NotLogged;
}

$dbh = new DatabaseHelper("localhost", "root", "", "almamensa", 3306);
?>