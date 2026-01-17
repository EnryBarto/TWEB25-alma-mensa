<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Create Dish";
$currentPage["filename"] = "create_dish.php";

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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? "";
    $descrizione = $_POST["descrizione"] ?? "";
    $prezzo = $_POST["prezzo"] ?? 0;

    // Insert dish into database
    $dishId = $dbh->insertDish($nome, $descrizione, $prezzo, $canteen->getId());

    if ($dishId) {
        header("Location: manage_dishes.php");
        exit();
    }
}

require '../src/template/base.php';
?>