<?php
require_once '../src/bootstrap.php';

if (!isUserLoggedIn()) {
    header("Location: index.php");
    exit();
}

$currentPage["title"] = "Modifica password";
$currentPage["filename"] = "change_password.php";
$templateParams["h1"] = "Modifica Password";
$templateParams["subtitle"] = "Cambia la password del tuo profilo";

if (isset($_POST["oldPsw"]) && isset($_POST["psw"]) && isset($_POST["confirmPsw"])) {
    $oldPsw = $_POST["oldPsw"];
    $loginData = $dbh->checkLogin($user->getEmail(), $oldPsw);
    if (count($loginData) > 0 && password_verify($oldPsw, $loginData[0]['password'])) {
        if ($_POST["psw"] == $_POST["confirmPsw"]) {
            $psw = password_hash($_POST["psw"], PASSWORD_BCRYPT);
            $exitCode = $dbh->updateUserPassword($user->getEmail(), $psw);
            if ($exitCode === 0) {
                $templateParams["success_modify"] = true;
            } else {
                $msg["errore"] = "Errore generico - Codice $exitCode";
            }
        } else {
            $msg["error_mismatch_psw"] = "Le nuove password non corrispondono. Riprova.";
        }

    } else {
        $msg["error_old_psw"] = "La password attuale non è corretta. Riprova.";
    }
}

require '../src/template/base.php';
?>