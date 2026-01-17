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