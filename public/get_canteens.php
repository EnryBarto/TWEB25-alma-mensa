<?php
    require_once '../src/bootstrap.php';
    header("Content-Type: application/json");
    $allCanteens = $dbh->getCanteens("");
    $categorizedCanteens = divideCanteensInCategories($allCanteens);
    $response = ["all" => $allCanteens] + $categorizedCanteens;
    echo json_encode($response);
?>