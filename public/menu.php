<?php
require_once '../src/bootstrap.php';

if (isset($_GET["id"])) {
    $templateParams["canteen"] = $dbh->getCanteenById(intval($_GET["id"]));
    $templateParams["menu"] = $dbh->getActiveMenuByCanteenId(intval($_GET["id"]));
} else {
    header("Location: explore.php");
    exit();
}

$currentPage["title"] = "Menu";
$currentPage["filename"] = "menu.php";
if ($templateParams["menu"] !== null && count($templateParams["menu"]->getDishes()) > 0) {
    $templateParams["subtitle"] = $templateParams["menu"]->getNome();
} else {
    $templateParams["subtitle"] = "";
}

require '../src/template/base.php';
?>