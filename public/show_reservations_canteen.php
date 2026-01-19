<?php
require_once '../src/bootstrap.php';

if (!isUserLoggedIn() && getUserLevel() !== UserLevel::CanteenAdmin) {
    header("Location: login.php");
    exit();
}

$currentPage["title"] = "Visualizza Prenotazioni";
$currentPage["filename"] = "show_reservations_canteen.php";
$templateParams["canteen"] = $user;
$templateParams["reservations"] = $dbh->getReservationsByCanteenId($user->getId());


require '../src/template/base.php';
?>