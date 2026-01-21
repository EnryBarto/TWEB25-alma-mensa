<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Esplora";
$currentPage["filename"] = "explore.php";
$templateParams["h1"] = "Le nostre mense";
$templateParams["subtitle"] = "Trova la mensa che preferisci";

$orderBy = "media_recensioni DESC";
if (isset($_GET["sort"])) {
    $orderBy = getOrderByFromSelectValue($_GET["sort"]);
    $templateParams["orderBy"] = $_GET["sort"];
} else {
    $templateParams["orderBy"] = "rank-desc";
}

$allCanteens = $dbh->getCanteens($orderBy);
$templateParams["categories"] = array_column($dbh->getCategories(), "nome");
$templateParams["all"] = $allCanteens;

$templateParams += divideCanteensInCategories($allCanteens);

require '../src/template/base.php';
?>