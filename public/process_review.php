<?php
require_once '../src/bootstrap.php';

switch (getUserLevel()) {
    case UserLevel::CanteenAdmin:
        header("Location: index.php");
        exit();
        break;

    case UserLevel::NotLogged:
        header("Location: login.php");
        exit();
        break;
}

if (isset($_GET["action"])) {

    if (!isset($_GET["id"])) {
        header("Location: explore.php");
        exit();
    }

    $currentPage["filename"] = "process_review.php";
    $currentPage["scriptfile"] = "process_review.js";
    $templateParams["action"] = $_GET["action"];
    if (isset($_GET["errorCode"])) $templateParams["errorCode"] = $_GET["errorCode"];

    switch($_GET["action"]) {
        case "C":
                // Form to create a review
                $currentPage["title"] = "Aggiungi recensione";
                $templateParams["canteen"] = $dbh->getCanteenById($_GET["id"]);
                $templateParams["reviewTitle"] = isset($_GET["title"]) ? $_GET["title"] : "";
                $templateParams["reviewDescription"] = isset($_GET["desc"]) ? $_GET["desc"] : "";
                $templateParams["reviewVote"] = isset($_GET["vote"]) ? $_GET["vote"] : "";
            break;

        case "U":
                $currentPage["title"] = "Modifica recensione";
                // Form to edit a review
                $review = $dbh->getCanteenReviewById($_GET["id"]);
                if ($review == null || $review->getAuthorEmail() != $user->getEmail()) {
                    header("Location: explore.php");
                    exit();
                }
                $templateParams["canteen"] = $dbh->getCanteenById($review->getCanteenId());
                $templateParams["reviewTitle"] = isset($_GET["title"]) ? $_GET["title"] : $review->getTitle();
                $templateParams["reviewDescription"] = isset($_GET["desc"]) ? $_GET["desc"] :  $review->getDescription();
                $templateParams["reviewVote"] = isset($_GET["vote"]) ? $_GET["vote"] :  $review->getValue();
                $templateParams["reviewId"] = $review->getId();
            break;

        default:
            header("Location: explore.php");
            exit();
            break;
    }

} else if (isset($_POST["action"])) {

    if ($_POST["action"] != "D" && (!isset($_POST["vote"]) || !isset($_POST["title"]) || !isset($_POST["description"]))) {
        $location = "Location: process_review.php?errorCode=-1&action=" . $_POST["action"];
        if (isset($_POST["vote"])) $location .= "&vote=" . $_POST["vote"];
        if (isset($_POST["title"])) $location .= "&title=" . $_POST["title"];
        if (isset($_POST["description"])) $location .= "&description=" . $_POST["description"];
        header($location);
        exit();
    }

    switch($_POST["action"]) {
        case "C":
            if (isset($_POST["canteen_id"])) {
                // The review must be inserted into the database
                $exitCode = $dbh->insertReview($_POST["canteen_id"], $user->getEmail(), $_POST["title"], $_POST["description"], $_POST["vote"]);
                if ($exitCode == 0) {
                    header("Location: reviews.php?id=$_POST[canteen_id]");
                    exit();
                } else {
                    header("Location: process_review.php?action=C&id=$_POST[canteen_id]&errorCode=$exitCode&title=$_POST[title]&desc=$_POST[description]&vote=$_POST[vote]");
                    exit();
                }
            } else {
                header("Location: explore.php");
                exit();
            }
            break;

        case "U":
            if (isset($_POST["review_id"])) {
                // Check permission
                $review = $dbh->getCanteenReviewById($_POST["review_id"]);
                if ($review->getAuthorEmail() != $user->getEmail()) {
                    header("Location: explore.php");
                    exit();
                }
                // The review must be updated
                $exitCode = $dbh->updateReview($_POST["review_id"], $_POST["title"], $_POST["description"], $_POST["vote"]);
                if ($exitCode == 0) {
                    header("Location: reviews.php?id=$_POST[canteen_id]");
                    exit();
                } else {
                    header("Location: process_review.php?action=U&id=$_POST[review_id]&errorCode=$exitCode&title=$_POST[title]&desc=$_POST[description]&vote=$_POST[vote]");
                    exit();
                }
            } else {
                header("Location: explore.php");
                exit();
            }
            break;

        case "D":
            if (isset($_POST["review_id"])) {
                // Check permission
                $review = $dbh->getCanteenReviewById($_POST["review_id"]);
                if ($review->getAuthorEmail() != $user->getEmail()) {
                    header("Location: explore.php");
                    exit();
                }
                // The review must be updated
                $dbh->deleteReview($_POST["review_id"]);
                header("Location: reviews.php?id=".$review->getCanteenId());
                exit();
            } else {
                header("Location: explore.php");
                exit();
            }
            break;
    }

} else {
    header("Location: index.php");
    exit();
}

require '../src/template/base.php';
?>