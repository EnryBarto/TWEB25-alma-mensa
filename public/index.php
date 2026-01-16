<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Home";
$currentPage["filename"] = "index.php";
$templateParams["topCanteens"] = $dbh->getCanteens("media_recensioni DESC", 3);

require '../src/template/base.php';
?>