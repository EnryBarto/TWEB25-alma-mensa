<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Login";
$currentPage["filename"] = "login.php";

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $loginData = $dbh->checkLogin($email, $password);
    if (count($loginData) > 0 && password_verify($password, $loginData[0]['password'])) {
        $user;
        if ($loginData[0]['cliente']) {
            $user = $dbh->getCustomerByEmail($email);
        } else {
            $user = $dbh->getCanteenByEmail($email);
        }
        registerLoggedUser($user);
        header("Location: index.php");
        exit();
    } else {
        $msg["error"] = "Email o password errati. Riprova.";
    }
}

require '../src/template/base.php';
?>