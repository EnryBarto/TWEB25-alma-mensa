<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Manage Dishes";
$currentPage["filename"] = "manage_dishes.php";

// Check if user is logged in and is a canteen account.
if (isUserLoggedIn() && getUserLevel() == UserLevel::CanteenAdmin) {
    $canteen = $dbh->getCanteenByEmail($user->getEmail());
    if ($canteen !== null) {
        $templateParams["dishes"] = $dbh->getDishesByCanteenId($canteen->getId());
        $templateParams["canteen"] = $canteen;
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

require '../src/template/base.php';
?>