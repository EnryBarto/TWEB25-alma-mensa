<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Info Mensa";
$currentPage["filename"] = "canteen_details.php";

if (isset($_GET["id"])) {
    $canteen = $dbh->getCanteenById($_GET["id"]);
} else {
    header("Location: explore.php");
    exit();
}

require '../src/template/base.php';
?>