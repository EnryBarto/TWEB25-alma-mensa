<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Menu";
$currentPage["filename"] = "menu.php";
$templateParams["canteen"] = $dbh->getCanteenById(1);
$templateParams["subtitle"] = "Il menu di oggi";

require '../src/template/base.php';
?>