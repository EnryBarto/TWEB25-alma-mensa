<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Gestione Piatti";
$currentPage["filename"] = "manage_dishes.php";
$templateParams["h1"] = "Tutti i Piatti";
$templateParams["subtitle"] = "Gestisci i piatti della tua mensa";

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

// Handle dish deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_dish_id'])) {
    $dishId = intval($_POST['delete_dish_id']);
    // Verify that the dish belongs to this canteen
    $dish = $dbh->getDishById($dishId);
    if ($dish !== null && $dish->getCanteenId() == $canteen->getId()) {
        if ($dbh->deleteDish($dishId)) {
            header("Location: manage_dishes.php");
            exit();
        } else {
            $templateParams["error"] = "Errore durante l'eliminazione del piatto.";
        }
    }
}

require '../src/template/base.php';
?>