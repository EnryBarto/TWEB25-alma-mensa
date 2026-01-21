<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Gestione Menù";
$currentPage["filename"] = "manage_menus.php";
$templateParams["h1"] = "Tutti i Menù";
$templateParams["subtitle"] = "Gestisci i menù della tua mensa";

// Check if user is logged in and is a canteen account.
if (isUserLoggedIn() && getUserLevel() == UserLevel::CanteenAdmin) {
    $canteen = $dbh->getCanteenByEmail($user->getEmail());
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

// Handle menu deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_menu_id'])) {
    $menuId = intval($_POST['delete_menu_id']);
    // Verify that the menu belongs to this canteen
    $menu = $dbh->getMenuById($menuId);
    if ($menu !== null && $menu->getCanteenId() == $canteen->getId()) {
        if ($dbh->deleteMenu($menuId)) {
            header("Location: manage_menus.php");
            exit();
        } else {
            $templateParams["error"] = "Errore durante l'eliminazione del menù.";
        }
    }
}

require '../src/template/base.php';
?>