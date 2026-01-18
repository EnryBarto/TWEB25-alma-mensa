<?php
require_once '../src/bootstrap.php';

if (!isUserLoggedIn() && getUserLevel() !== UserLevel::CanteenAdmin) {
    header("Location: login.php");
    exit();
}

$currentPage["title"] = "Gestione Orari";
$currentPage["filename"] = "manage_timetable.php";
$templateParams["canteen"] = $user;
$templateParams["subtitle"] = "Modifica gli orari di apertura della tua mensa";

require '../src/template/base.php';
?>