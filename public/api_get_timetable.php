<?php
require_once '../src/bootstrap.php';

if (!isset($_GET["id"]) || !isset($_GET["date"])) {
    header("HTTP/1.1 400 Bad Request: Missing parameters");
    exit();
}

try {
    $date = new DateTimeImmutable($_GET["date"]);
} catch (Exception $e) {
    header("HTTP/1.1 400 Bad Request: Date Malformed");
    exit();
}

$query = $dbh->getCanteenTimetable($_GET["id"], strtolower(substr($date->format('l'), 0, 3)));
$timetable = [];

foreach ($query as $t) {
    array_push($timetable, [
        'opening' => (new DateTimeImmutable($_GET["date"] . " " . $t->getOpenTime()))->format('Y-m-d H:i'),
        'closing' => (new DateTimeImmutable($_GET["date"] . " " . $t->getCloseTime()))->format('Y-m-d H:i')
    ]);
}

header("Content-Type: application/json");
echo json_encode($timetable);
?>