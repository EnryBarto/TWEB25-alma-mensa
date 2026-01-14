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
        $exitCode = $dbh->createUser($name, $surname, $email, $hashedPassword);
        switch ($exitCode) {
            case 0:
                header("Location: login.php");
                exit();
                break;

            case 1062:
                $msg["erroreemail"] = "L'email è già in uso. Riprova con un'altra email.";
                break;

            default:
                $msg["errore"] = "Errore generico - Codice " . $exitCode;
                break;
        }
    } else {
        $msg["errorpassword"] = "Le password non corrispondono. Riprova.";
    }
}

require '../src/template/base.php';
?>