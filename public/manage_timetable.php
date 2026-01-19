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

if (isset($_POST["action"])) {
    $day = $_POST["dayOfWeek"];
    $openTime = date("H:i", strtotime($_POST["timeOpen"]));
    $closeTime = date("H:i", strtotime($_POST["timeClose"]));
    switch ($_POST["action"]) {
        case "c":
            if ($closeTime <= $openTime) {
                header("Location: manage_timetable.php?hour_error_creation=1");
                exit();
            }
            $exitCode = $dbh->createOpeningHour($user->getId(), $day, $openTime, $closeTime);
            if ($exitCode > 0) {
                header("Location: manage_timetable.php?generic_error=$exitCode&from=c");
                exit();
            }
            $msg = "Orario aggiunto con successo!";
            break;
        case "u":
            $oldOpenTime = date("H:i", strtotime($_POST["oldTimeOpen"]));
            if ($closeTime <= $openTime) {
                header("Location: manage_timetable.php?hour_error_update=1&oldTimeOpen=$oldOpenTime&dayOfWeek=$day");
                exit();
            }
            $exitCode = $dbh->updateOpeningHour($user->getId(), $day, $oldOpenTime, $openTime, $closeTime);
            if ($exitCode > 0) {
                header("Location: manage_timetable.php?generic_error=$exitCode&from=u");
                exit();
            }
            $msg = "Modifiche salvate con successo!";
            break;
        case "d":
            $oldOpenTime = date("H:i", strtotime($_POST["oldTimeOpen"]));
            $exitCode = $dbh->deleteOpeningHour($user->getId(), $day, $oldOpenTime);
            if ($exitCode > 0) {
                header("Location: manage_timetable.php?generic_error=$exitCode&from=d");
                exit();
            }
            $msg = "Orario eliminato con successo!";
            break;
    }
    header("Location: manage_timetable.php?success=1&msg=$msg");
    exit();
}

require '../src/template/base.php';
?>