<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Manage Menus";
$currentPage["filename"] = "manage_menus.php";

// Check if user is logged in and is a canteen account.
if (isUserLoggedIn() && getUserLevel() == UserLevel::CanteenAdmin) {
    $canteen = $dbh->getCanteenByEmail($_SESSION["email"]);
    if ($canteen !== null) {
        $templateParams["menus"] = $dbh->getMenusByCanteenId($canteen->getId());
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