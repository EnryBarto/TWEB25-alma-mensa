<?php
require_once '../src/bootstrap.php';

if (!isUserLoggedIn())
{
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
        $templateParams["canteen"] = $dbh->getCanteenByEmail($user->getEmail());
        break;
}

if (isset($_GET['action']) && $_GET['action'] === 'D'
    && isset($_GET['email']) && $_GET['email'] === $user->getEmail()
    && getUserLevel() === UserLevel::Customer) {
    $exitCode = $dbh->deleteCustomerByEmail($user->getEmail());
    if ($exitCode === 0) {
        logoutUser();
        header("Location: index.php");
        exit();
    } else {
        $templateParams["delete_error"] = "Si è verificato un errore durante l'eliminazione del profilo. Codice: $exitCode";
    }
}

require '../src/template/base.php';
?>