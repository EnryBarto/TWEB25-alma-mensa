<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Create Dish";
$currentPage["filename"] = "create_dish.php";

// Check if user is logged in and is a canteen account.
if (!isUserLoggedIn() || getUserLevel() != UserLevel::CanteenAdmin) {
    header("Location: index.php");
    exit();
}

$canteen = $dbh->getCanteenByEmail($_SESSION["email"]);
if ($canteen === null) {
    header("Location: index.php");
    exit();
}

// Used to see if we need to edit the dish
$dishId = null;
$dish = null;

// Accept dish id from GET (page load) or POST (form submit)
if (isset($_GET["id"])) {
    $dishId = intval($_GET["id"]);
} elseif (isset($_POST["dish_id"])) {
    $dishId = intval($_POST["dish_id"]);
}

// If an id is present, load and authorize the dish
if ($dishId !== null) {
    $dish = $dbh->getDishById($dishId);

    // If the dish does not exist or does not belong to the canteen, redirect to manage dishes page
    if ($dish === null || $dish->getCanteenId() !== $canteen->getId()) {
        header("Location: manage_dishes.php");
        exit();
    }
}

// Handle form submission with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? "";
    $descrizione = $_POST["descrizione"] ?? "";
    $prezzo = $_POST["prezzo"] ?? 0;

    if ($dishId !== null) {
        // Update existing dish
        $res = $dbh->updateDish($dishId, $nome, $descrizione, $prezzo);

        if (!$res) {
            echo "Errore durante l'aggiornamento del piatto.";
            exit();
        }
    } else {
        // Insert new dish
        $res = $dbh->insertDish($nome, $descrizione, $prezzo, $canteen->getId());
        if (!$res) {
            echo "Errore durante la creazione del piatto.";
            exit();
        }
    }
    header("Location: manage_dishes.php");
    exit();
}

require '../src/template/base.php';
?>