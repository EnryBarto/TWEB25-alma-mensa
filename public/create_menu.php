<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Create Menu";
$currentPage["filename"] = "create_menu.php";

// Check if user is logged in and is a canteen account.
if (!isUserLoggedIn() || getUserLevel() != UserLevel::CanteenAdmin) {
    header("Location: index.php");
    exit();
}

$canteen = $dbh->getCanteenByEmail($user->getEmail());
if ($canteen === null) {
    header("Location: index.php");
    exit();
}

// Load canteen's dishes
$templateParams["dishes"] = $dbh->getDishesByCanteenId($canteen->getId());
$templateParams["canteen"] = $canteen;

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? "";
    $selectedDishes = $_POST["dishes"] ?? [];

    // Convert dish IDs to integers
    $selectedDishes = array_map('intval', $selectedDishes);

    // Insert menu into database
    $menuId = $dbh->insertMenu($nome, $canteen->getId(), 1, $selectedDishes);

    if ($menuId) {
        header("Location: manage_menus.php");
        exit();
    }
}

require '../src/template/base.php';
?>