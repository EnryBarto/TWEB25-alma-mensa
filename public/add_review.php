<?php
require_once '../src/bootstrap.php';

if (!isUserLoggedIn()) {
    // User isn't logged in
    header("Location: login.php");
    exit();
} else if (isset($_GET["id"])) {
    // Form to create a review
    $templateParams["canteen"] = $dbh->getCanteenById($_GET["id"]);
    $currentPage["filename"] = "add_review.php";
    $currentPage["scriptfile"] = "add_review.js";
} else if (isset($_POST["canteen_id"])) {
    // The review must be inserted into the database
    if (isset($_POST["vote"]) && isset($_POST["title"]) && isset($_POST["description"])) {
        $exitCode = $dbh->insertReview($_POST["canteen_id"], $_SESSION["email"], $_POST["title"], $_POST["description"], $_POST["vote"]);
        if ($exitCode == 0) {
            header("Location: reviews.php?id=$_POST[canteen_id]");
            exit();
        } else {
            header("Location: add_review.php?id=$_POST[canteen_id]&errorCode=$exitCode&title=$_POST[title]&desc=$_POST[description]&vote=$_POST[vote]");
            exit();
        }
    }
    header("Location: add_review.php?&errorCode=-1");
} else {
    header("Location: explore.php");
    exit();
}

$currentPage["title"] = "Aggiungi Recensione";

require '../src/template/base.php';
?>