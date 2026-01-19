<?php
require_once '../src/bootstrap.php';

if (!isset($_GET["date"]) || !isset($_GET["time"])) {
    header("HTTP/1.1 400 Bad Request: Missing parameters");
    exit();
}

try {
    $timeIn = (new DateTimeImmutable($_GET["date"] . " ". $_GET["time"]))->getTimestamp();
    $timeOut = (new DateTime($_GET["date"] . " ". $_GET["time"]));
    $timeOut->modify("+29 minutes");
    $timeOut = $timeOut->getTimestamp();
} catch (Exception $e) {
    header("HTTP/1.1 400 Bad Request: Date Malformed");
    exit();
}

switch ($_GET["action"]) {
    case "C":
        if (!isset($_GET["canteen"])) {
            header("HTTP/1.1 400 Bad Request: Missing parameters");
            exit();
        }
        $resStatus = $dbh->getReservationsStatusInInterval($_GET["canteen"], date("Y-m-d H:i:s", $timeIn), date("Y-m-d H:i:s", $timeOut));

        $result = $resStatus[0]["posti_disponibili"];
        break;

    case "U":
        if (!isset($_GET["code"])) {
            header("HTTP/1.1 400 Bad Request: Missing parameters");
            exit();
        }

        $oldReservation = $dbh->getReservationByCode($_GET["code"]);

        $resStatus = $dbh->getReservationsStatusInInterval($oldReservation->getCanteen()->getId(), date("Y-m-d H:i:s", $timeIn), date("Y-m-d H:i:s", $timeOut));

        $new = new DateTimeImmutable($_GET["date"] . " ". $_GET["time"]);

        // If the two reservations are for the same time, we consider only the different guests
        if ($oldReservation->getDateTime() == $new) {
            $oldNumGuests = $oldReservation->getNumPeople();
        } else {
            $oldNumGuests = 0;
        }

        $result = $oldNumGuests + $resStatus[0]["posti_disponibili"];
        break;
}

header("HTTP/1.1 200 $result");

?>