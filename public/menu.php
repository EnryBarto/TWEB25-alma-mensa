<?php
require_once '../src/bootstrap.php';

if (isset($_GET["id"])) {
    $templateParams["canteen"] = $dbh->getCanteenById(intval($_GET["id"]));
    $templateParams["menus"] = $dbh->getMenusByCanteenId(intval($_GET["id"]));
} else {
    header("Location: explore.php");
    exit();
}

$currentPage["title"] = "Menu";
$currentPage["filename"] = "menu.php";
$templateParams["subtitle"] = "Il menu di oggi";


require '../src/template/base.php';
?>