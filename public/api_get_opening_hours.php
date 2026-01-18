<?php
require_once '../src/bootstrap.php';

if (!isset($_GET["id"]) || !isset($_GET["date"])) {
    header("HTTP/1.1 400 Bad Request: Missing parameters");
    exit();
}

try {
    $start = new DateTimeImmutable($_GET["date"] . " 09:00");
} catch (Exception $e) {
    header("HTTP/1.1 400 Bad Request: Date Malformed");
    exit();
}

$timetable = [];

for ($i = 0; $i < 4; $i++) {
    $timetable[] = [
        'opening' => $start->modify("+$i hour")->format('Y-m-d H:i'),
        'closing' => $start->modify("+".($i + 1)." hour")->format('Y-m-d H:i')
    ];
}

header("Content-Type: application/json");
echo json_encode($timetable);
?>