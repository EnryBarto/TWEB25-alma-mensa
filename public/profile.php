<?php
require_once '../src/bootstrap.php';

if (!isUserLoggedIn()) {
    header("Location: index.php");
    exit();
}

$currentPage["title"] = "Profilo";
$currentPage["filename"] = "profile.php";

switch (getUserLevel()) {
    case UserLevel::Customer:
        $templateParams["reservations"] = $dbh->getReservationsByCustomerEmail($user->getEmail());
        break;
    case UserLevel::CanteenAdmin:
        header("Location: canteen_details.php?id={$user->getId()}");
        exit();
        break;
}

require '../src/template/base.php';
?>