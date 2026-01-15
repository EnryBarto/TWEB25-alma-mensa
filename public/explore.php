<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Esplora";
$currentPage["filename"] = "explore.php";


$orderBy = "media_voti DESC";
if (isset($_POST["sort"])) {
    $orderBy = getOrderByFromSelectValue($_POST["sort"]);
    $templateParams["orderBy"] = $_POST["sort"];
} else {
    $templateParams["orderBy"] = "rank-desc";
}

$templateParams["mense"] = $dbh->getCanteens($orderBy);

require '../src/template/base.php';
?>