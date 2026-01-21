<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Home";
$currentPage["filename"] = "index.php";
$templateParams["topCanteens"] = $dbh->getCanteens("media_recensioni DESC", 3);
$templateParams["h1"] = isUserLoggedIn() ? "Benvenuto in AlmaMensa, {$user->getName()}" : "AlmaMensa";
$templateParams["subtitle"] = "Da universitari per universitari";

require '../src/template/base.php';
?>