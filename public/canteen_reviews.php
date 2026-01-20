<?php
require_once '../src/bootstrap.php';

if (isset($_GET["id"])) {
    $templateParams["canteen"] = $dbh->getCanteenById($_GET["id"]);
    $templateParams["reviews"] = $dbh->getCanteenReviews($_GET["id"]);
    $templateParams["subtitle"] = "Recensioni";
} else {
    header("Location: explore.php");
    exit();
}

$currentPage["title"] = "Recensioni";
$currentPage["filename"] = "canteen_reviews.php";
$templateParams["redirect"] = "canteen_reviews.php?id=" . $_GET["id"];

require '../src/template/base.php';
?>