<?php
require_once '../src/bootstrap.php';


if (!isset($_GET["id"])) {
    header("Location: explore.php");
    exit();
}

$currentPage["title"] = "Info Mensa";
$currentPage["filename"] = "canteen_details.php";
$templateParams["canteen"] = $dbh->getCanteenById($_GET["id"]);

require '../src/template/base.php';
?>