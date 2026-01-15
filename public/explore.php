<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Esplora";
$currentPage["filename"] = "explore.php";

$templateParams["mense"] = $dbh->getCanteens();

require '../src/template/base.php';
?>