<?php
require_once '../src/bootstrap.php';

if (isUserLoggedIn() && getUserLevel() == UserLevel::Customer)
{
    $currentPage["title"] = "Gestisci Prenotazioni";
    $currentPage["filename"] = "manage_reservations.php";
    $currentPage["cssfile"] = "manage_reservations.css";
    $currentPage["scriptfile"] = "manage_reservations.js";
    $currentPage["externalscriptfile"] = "https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js";

    $templateParams["reservations"] = $dbh->getReservationsByCustomerEmail($user->getEmail());
} else {
    header("Location: index.php");
    exit();
}

require '../src/template/base.php';
?>