<?php
require_once '../src/bootstrap.php';

if (!isUserLoggedIn() || getUserLevel() != UserLevel::Customer)
{
    header("Location: index.php");
    exit();
}

$currentPage["title"] = "Modifica profilo";
$currentPage["filename"] = "mod_customer_data.php";

if (isset($_POST["name"]) && isset($_POST["surname"]))
{
    $name = $_POST["name"];
    $surname = $_POST["surname"];

    $exitCode = $dbh->updateCustomerData($user->getEmail(), $name, $surname);
    if ($exitCode === 0) {
        $user = $dbh->getCustomerByEmail($user->getEmail());
        registerLoggedUser($user);
        $templateParams["success_modify"] = true;
    } else {
        $templateParams["errore"] = "Errore generico - Codice $exitCode";
    }
}

require '../src/template/base.php';
?>