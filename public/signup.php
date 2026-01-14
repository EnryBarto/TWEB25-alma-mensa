<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Registrati";
$currentPage["filename"] = "signup.php";

if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm-password"])) {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];

    if ($password === $confirmPassword) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $success = $dbh->createUser($name, $surname, $email, $hashedPassword);
        if ($success) {
            header("Location: login.php");
            exit();
        } else {
            $msg["erroreemail"] = "L'email è già in uso. Riprova con un'altra email.";
        }
    } else {
        $msg["errorpassword"] = "Le password non corrispondono. Riprova.";
    }
}

require '../src/template/base.php';
?>