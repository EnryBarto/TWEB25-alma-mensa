<?php
require_once '../src/bootstrap.php';


if (!isset($_GET["id"])) {
    header("Location: explore.php");
    exit();
}

$currentPage["title"] = "Info Mensa";
$currentPage["filename"] = "canteen_details.php";
$templateParams["canteen"] = $dbh->getCanteenById($_GET["id"]);
$templateParams["timetable"] = $dbh->getCanteenTimetable($_GET["id"]);

$dayMapper = [
    'mon' => 'Lunedì',
    'tue' => 'Martedì',
    'wed' => 'Mercoledì',
    'thu' => 'Giovedì',
    'fri' => 'Venerdì',
    'sat' => 'Sabato',
    'sun' => 'Domenica',
];

for ($i = 0; $i < count($templateParams["timetable"]); $i++) {
    $templateParams["timetable"][$i]["giorno"] = $dayMapper[$templateParams["timetable"][$i]["giorno"]];
    $templateParams["timetable"][$i]["ora_apertura"] = (new DateTimeImmutable($templateParams["timetable"][$i]["ora_apertura"]))->format('H:i');
    $templateParams["timetable"][$i]["ora_chiusura"] = (new DateTimeImmutable($templateParams["timetable"][$i]["ora_chiusura"]))->format('H:i');
}

require '../src/template/base.php';
?>