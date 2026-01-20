<?php
require_once '../src/bootstrap.php';

if (getUserLevel() != UserLevel::Customer) {
    header("Location: index.php");
    exit();
}

$currentPage["title"] = "Recensioni personali";
$currentPage["filename"] = "personal_reviews.php";
$templateParams["redirect"] = "personal_reviews.php?";
$templateParams["reviews"] = $dbh->getUserReviews($user->getEmail());

$templateParams["canteens"] = array();

foreach ($templateParams["reviews"] as $r) {
    $id = $r->getCanteenId();
    if (!isset($templateParams["canteens"]["$id"])) {
        $templateParams["canteens"]["$id"] = $dbh->getCanteenById($id);
    }
}

require '../src/template/base.php';
?>