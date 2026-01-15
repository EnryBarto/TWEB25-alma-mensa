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

$allCanteens = $dbh->getCanteens($orderBy);
$templateParams["all"] = $allCanteens;
$templateParams["categories"] = $dbh->getCategories();

// Creation of arrays for each category
foreach ($allCanteens as $c) {
    if (!isset($templateParams[$c->getCategory()])) {
        $templateParams[$c->getCategory()] = [];
    }
    array_push($templateParams[$c->getCategory()], $c);
}

require '../src/template/base.php';
?>