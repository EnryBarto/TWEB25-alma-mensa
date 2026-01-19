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

// Track the menu we might be editing
$menuId = null;
$menu = null;
$selectedDishIds = [];

// Accept menu id from GET (page load) or POST (form submit)
if (isset($_GET["id"])) {
    $menuId = intval($_GET["id"]);
} elseif (isset($_POST["menu_id"])) {
    $menuId = intval($_POST["menu_id"]);
}

// If an id is present, load and authorize the menu
if ($menuId !== null) {
    $menu = $dbh->getMenuById($menuId);

    // If the menu does not exist or does not belong to the canteen, redirect to manage menus page
    if ($menu === null || $menu->getCanteenId() !== $canteen->getId()) {
        header("Location: manage_menus.php");
        exit();
    }

    // Collect selected dish ids for pre-checking
    $selectedDishIds = array_map(function($dish) {
        return $dish->getId();
    }, $menu->getDishes());
}

// Load canteen's dishes for selection
$templateParams["dishes"] = $dbh->getDishesByCanteenId($canteen->getId());
$templateParams["canteen"] = $canteen;
$templateParams["selectedDishIds"] = $selectedDishIds;
$templateParams["menu"] = $menu;

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? "";
    $selectedDishes = $_POST["dishes"] ?? [];
    $isAttivo = isset($_POST["attivoBtn"]) ? intval($_POST["attivoBtn"]) : null;

    // Convert dish IDs to integers
    $selectedDishes = array_map('intval', $selectedDishes);
    // Validate input
    if (empty($nome) || empty($selectedDishes) || $isAttivo === null) {
        $templateParams["error"] = "Inserire un nome, selezionare almeno un piatto e scegliere lo stato del menù.";
    } else if ($menuId !== null) {
        if ($isAttivo) {
            $activeMenu = $dbh->getActiveMenuByCanteenId($canteen->getId());
            if ($activeMenu !== null && $activeMenu->getId() != $menuId) {
                $activeMenuDishIds = array_map(function ($dish) {
                    return intval($dish->getId());
                }, $activeMenu->getDishes());
                $dbh->updateMenu($activeMenu->getId(), $activeMenu->getNome(), 0, $activeMenuDishIds);
            }
        }
        // Update existing menu
        $res = $dbh->updateMenu($menuId, $nome, intval($isAttivo), $selectedDishes);

        if (!$res) {
            echo "Errore durante l'aggiornamento del menù.";
            exit();
        }
        header("Location: manage_menus.php");
        exit();
    } else {
        if ($isAttivo) {
            $activeMenu = $dbh->getActiveMenuByCanteenId($canteen->getId());
            if ($activeMenu !== null && $activeMenu->getId() != $menuId) {
                $activeMenuDishIds = array_map(function ($dish) {
                    return intval($dish->getId());
                }, $activeMenu->getDishes());
                $dbh->updateMenu($activeMenu->getId(), $activeMenu->getNome(), 0, $activeMenuDishIds);
            }
        }
        // Insert new menu
        $menuId = $dbh->insertMenu($nome, $canteen->getId(), intval($isAttivo), $selectedDishes);
        if (!$menuId) {
            echo "Errore durante la creazione del menù.";
            exit();
        }
        header("Location: manage_menus.php");
        exit();
    }
}

require '../src/template/base.php';
?>