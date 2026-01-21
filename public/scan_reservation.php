<?php
require_once '../src/bootstrap.php';

if (!isUserLoggedIn() && getUserLevel() !== UserLevel::CanteenAdmin) {
    header("Location: index.php");
    exit();
}

$currentPage["title"] = "Rileva presenza";
$currentPage["filename"] = "scan_reservation.php";
$currentPage["scriptfile"] = "scan_reservation.js";
$templateParams["h1"] = "Rileva presenza";
$templateParams["subtitle"] = "Convalida le prenotazioni";

require '../src/template/base.php';
?>