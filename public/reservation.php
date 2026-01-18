<?php
require_once '../src/bootstrap.php';

switch (getUserLevel()) {
    case UserLevel::CanteenAdmin:
        header("Location: index.php");
        exit();
        break;

    case UserLevel::NotLogged:
        header("Location: login.php");
        exit();
        break;

    default:
        break;
}

if (isset($_GET["id"])) {
    $templateParams["canteen"] = $dbh->getCanteenById($_GET["id"]);
} else {
    header("Location: explore.php");
    exit();
}

$currentPage["title"] = "Prenota";
$currentPage["filename"] = "reservation.php";
$currentPage["scriptfile"] = "reservation.js";
$templateParams["subtitle"] = "Prenota un tavolo";

require '../src/template/base.php';
?>