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

if (isset($_GET["action"])) {

    if (!isset($_GET["id"])) {
        header("Location: manage_reservations.php");
        exit();
    }

    switch($_GET["action"]) {
        case "C":
            $templateParams["canteen"] = $dbh->getCanteenById($_GET["id"]);
            $currentPage["title"] = "Prenota";
            $currentPage["filename"] = "reservation.php";
            $currentPage["scriptfile"] = "reservation.js";
            $templateParams["subtitle"] = "Prenota un tavolo";
            break;

        case "U":
            $templateParams["reservation"] = $dbh->getReservationByCode($_GET["id"]);
            // Check permission
            if ($templateParams["reservation"]->getUserEmail() != $user->getEmail()) {
                header("Location: manage_reservations.php");
                exit();
            }
            $templateParams["canteen"] = $templateParams["reservation"]->getCanteen();
            $currentPage["title"] = "Modifica prenotazione";
            $currentPage["filename"] = "reservation.php";
            $currentPage["scriptfile"] = "reservation.js";
            $templateParams["subtitle"] = "Modifica la tua prenotazione";
            break;

        default:
            header("Location: explore.php");
            exit();
            break;
    }
}
else if (isset($_POST["action"])) {

    if (!isset($_POST["id"])) {
        header("Location: manage_reservations.php");
        exit();
    }

    if ($_POST["action"] != "D" && (!isset($_POST["date"]) || !isset($_POST["time"]) || !isset($_POST["guests"]))) {
        header("Location: manage_reservations.php?errorCode=-1&action=" . $_POST["action"]);
        exit();
    }

    switch($_POST["action"]) {
        case "C":
            $code = "PREN-" . $_POST["id"] . "-" . floor(microtime(true) * 1000);

            try {
                $dateTime = new DateTimeImmutable($_POST["date"] . " " . $_POST["time"]);
            } catch (Exception $e) {
                header("Location: manage_reservation.php?action=C&errorCode=-1");
                exit();
            }
            $exitCode = $dbh->insertReservation($user->getEmail(), $_POST["id"], $code, $dateTime->format("Y-m-d H:i"), $_POST["guests"]);
            break;

        case "U":
            $templateParams["reservation"] = $dbh->getReservationByCode($_POST["id"]);
            // Check permission
            if ($templateParams["reservation"]->getUserEmail() != $user->getEmail()) {
                header("Location: manage_reservations.php");
                exit();
            }
            try {
                $dateTime = new DateTimeImmutable($_POST["date"] . " " . $_POST["time"]);
            } catch (Exception $e) {
                header("Location: manage_reservation.php?action=U&errorCode=-1");
                exit();
            }
            $exitCode = $dbh->updateReservation($_POST["id"], $dateTime->format("Y-m-d H:i"), $_POST["guests"]);
            break;

        case "D":
            if ($dbh->getReservationByCode($_POST["id"])->getUserEmail() != $user->getEmail()) {
                header("Location: explore.php");
                exit();
            }
            $exitCode = $dbh->deleteReservation($_POST["id"]);
            break;

        default:
            header("Location: explore.php");
            exit();
            break;
    }

    if ($exitCode == 0) {
        header("Location: manage_reservations.php?success=1&action=".$_POST["action"]);
    } else {
        header("Location: manage_reservations.php?errorCode=$exitCode&action=".$_POST["action"]);
    }
    exit();
}
else {
    header("Location: index.php");
    exit();
}

require '../src/template/base.php';
?>