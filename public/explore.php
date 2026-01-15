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
$templateParams["categories"] = $dbh->getCategories();
$templateParams["all"] = $allCanteens;

$templateParams += divideCanteensInCategories($allCanteens);

require '../src/template/base.php';
?>