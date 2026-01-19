<?php
require_once '../src/bootstrap.php';

if (!isUserLoggedIn()) {
    // User isn't logged in
    header("Location: login.php");
    exit();
}

if (isset($_GET["action"])) {

    if (!isset($_GET["id"])) {
        header("Location: explore.php");
        exit();
    }

    $currentPage["filename"] = "manage_canteen.php";
    $templateParams["action"] = $_GET["action"];
    $currentPage["scriptfile"] = "manage_canteen.js";
    if (isset($_GET["errorCode"])) $templateParams["errorCode"] = $_GET["errorCode"];

    switch($_GET["action"]) {

        case "U":
                $currentPage["title"] = "Modifica dati";
                // Check permission
                if ($user->getId() != $_GET["id"]) {
                    header("Location: explore.php");
                    exit();
                }
                $templateParams["name"] = isset($_GET["name"]) ? $_GET["name"] : $user->getName();
                $templateParams["desc"] = isset($_GET["desc"]) ? $_GET["desc"] : $user->getDescription();
                $templateParams["seats"] = isset($_GET["seats"]) ? $_GET["seats"] : $user->getMaxSeatings();
                $templateParams["avenue"] = isset($_GET["avenue"]) ? $_GET["avenue"] : $user->getAddress()->avenue;
                $templateParams["num"] = isset($_GET["num"]) ? $_GET["num"] : $user->getAddress()->num;
                $templateParams["postal_code"] = isset($_GET["postal_code"]) ? $_GET["postal_code"] : $user->getAddress()->postalCode;
                $templateParams["municipality"] = isset($_GET["municipality"]) ? $_GET["municipality"] : $user->getAddress()->municipality;
                $templateParams["lat"] = isset($_GET["lat"]) ? $_GET["lat"] : $user->getLat();
                $templateParams["lon"] = isset($_GET["lon"]) ? $_GET["lon"] : $user->getLong();
                $templateParams["telephone"] = isset($_GET["telephone"]) ? $_GET["telephone"] : $user->getTelephone();
            break;

        default:
            header("Location: explore.php");
            exit();
            break;
    }

} else if (isset($_POST["action"])) {

    if (!isset($_POST["name"]) || !isset($_POST["desc"]) || !isset($_POST["seats"]) || !isset($_POST["avenue"]) || !isset($_POST["num"]) || !isset($_POST["postal_code"]) || !isset($_POST["municipality"]) || !isset($_POST["lat"]) || !isset($_POST["lon"])) {
        $location = "Location: manage_review.php?errorCode=-1&action=" . $_POST["action"];
        if (isset($_POST["name"])) $location .= "&name=" . $_POST["name"];
        if (isset($_POST["desc"])) $location .= "&desc=" . $_POST["desc"];
        if (isset($_POST["seats"])) $location .= "&seats=" . $_POST["seats"];
        if (isset($_POST["avenue"])) $location .= "&avenue=" . $_POST["avenue"];
        if (isset($_POST["num"])) $location .= "&num=" . $_POST["num"];
        if (isset($_POST["postal_code"])) $location .= "&postal_code=" . $_POST["postal_code"];
        if (isset($_POST["municipality"])) $location .= "&municipality=" . $_POST["municipality"];
        if (isset($_POST["lat"])) $location .= "&lat=" . $_POST["lat"];
        if (isset($_POST["lon"])) $location .= "&lon=" . $_POST["lon"];
        if (isset($_POST["telephone"])) $location .= "&telephone=" . str_replace("+", "%2B", $_POST["telephone"]);
        header($location);
        exit();
    }

    switch($_POST["action"]) {

        case "U":
            if (isset($_POST["id"])) {
                // Check permission
                if ($user->getId() != $_POST["id"]) {
                    header("Location: explore.php");
                    exit();
                }
                // Check image upload
                if(isset($_FILES["image"]) && strlen($_FILES["image"]["name"])>0){
                    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["image"], str_replace(" ", "_", strtolower($user->getName())));
                    if($result == 0){
                        header("Location: manage_canteen.php?action=U&id=$_POST[id]&errorCode=$msg&name=$_POST[name]&desc=$_POST[desc]&seats=$_POST[seats]&avenue=$_POST[avenue]&num=$_POST[num]&postal_code=$_POST[postal_code]&municipality=$_POST[municipality]&lat=$_POST[lat]&lon=$_POST[lon]&telephone=".str_replace("+", "%2B", $_POST["telephone"]));
                        exit();
                    }
                    $image = $msg;
                    unlink(realpath(UPLOAD_DIR . $user->getImg()));
                } else if (isset($_POST["removeImg"]) && $_POST["removeImg"] == "true") {
                    unlink(realpath(UPLOAD_DIR . $user->getImg()));
                    $image = "";
                } else {
                    $image = $user->getImg();
                }

                $exitCode = $dbh->updateCanteen($_POST["id"], $_POST["name"], $_POST["desc"], $_POST["seats"], $_POST["avenue"], $_POST["num"], $_POST["postal_code"], $_POST["municipality"], $_POST["lat"], $_POST["lon"], $_POST["telephone"], $image);
                if ($exitCode == 0) {
                    $user = $dbh->getCanteenByEmail($user->getEmail());
                    registerLoggedUser($user);
                    header("Location: canteen_details.php?id=$_POST[id]&success=1");
                    exit();
                } else {
                    header("Location: manage_canteen.php?action=U&id=$_POST[id]&errorCode=$exitCode&name=$_POST[name]&desc=$_POST[desc]&seats=$_POST[seats]&avenue=$_POST[avenue]&num=$_POST[num]&postal_code=$_POST[postal_code]&municipality=$_POST[municipality]&lat=$_POST[lat]&lon=$_POST[lon]&telephone=".str_replace("+", "%2B", $_POST["telephone"]));
                    exit();
                }
            } else {
                header("Location: explore.php");
                exit();
            }
            break;

        default:
            header("Location: index.php");
            exit();
            break;
    }

} else {
    header("Location: index.php");
    exit();
}

$templateParams["canteen"] = $user;
$templateParams["subtitle"] = "Modifica i tuoi dati";

require '../src/template/base.php';
?>