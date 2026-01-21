<?php
require_once '../src/bootstrap.php';

if (!isUserLoggedIn() && getUserLevel() !== UserLevel::CanteenAdmin) {
    header("Location: login.php");
    exit();
}

$currentPage["title"] = "Visualizza Prenotazioni";
$currentPage["filename"] = "show_reservations_canteen.php";
$templateParams["h1"] = "Visualizza Prenotazioni";
$templateParams["subtitle"] = "Visualizza tutte le prenotazioni";
$templateParams["canteen"] = $user;
$templateParams["activeReservations"] = array_filter($dbh->getReservationsByCanteenId($user->getId()),
     function($reservation) {
        return $reservation->isActive();
    });
$templateParams["otherReservations"] = array_filter($dbh->getReservationsByCanteenId($user->getId(), "data_ora DESC"),
 function ($reservation) {
        return !$reservation->isActive();
    });


require '../src/template/base.php';
?>