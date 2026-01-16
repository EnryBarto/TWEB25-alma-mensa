<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Prenota";
$currentPage["filename"] = "reservation.php";
$currentPage["scriptfile"] = "reservation.js";
$templateParams["subtitle"] = "Prenota un tavolo";
$templateParams["canteen"] = $dbh->getCanteenById(1);

require '../src/template/base.php';
?>