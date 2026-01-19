<?php

function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
}

function getUserLevel(){
    if(isset($_SESSION["user"])){
        return $_SESSION["user"]->getLevel();
    }
    return UserLevel::NotLogged;
}

function isUserLoggedIn(){
    return isset($_SESSION["user"]);
}

function registerLoggedUser($user){
    $_SESSION["user"] = $user;
}

function uploadImage($path, $image, $name){
    //$imageName = basename($image["name"]);
    $imageName = basename($name) . "." . pathinfo($image["name"],PATHINFO_EXTENSION);
    $fullPath = $path.$imageName;

    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($name), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}

function logoutUser(){
    session_unset();
    session_destroy();
}

function divideCanteensInCategories($canteens){
    $ret = [];
    foreach ($canteens as $c) {
        if (!isset($ret[$c->getCategory()])) {
            $ret[$c->getCategory()] = [];
        }
        array_push($ret[$c->getCategory()], $c);
    }
    return $ret;
}

function getOrderByFromSelectValue($sortValue) {
    switch ($sortValue) {
        case "rank-asc":
            return "media_recensioni ASC";
        case "rank-desc":
            return "media_recensioni DESC";
        case "alphabetical-asc":
            return "nome ASC";
        case "alphabetical-desc":
            return "nome DESC";
        case "num-rew-asc":
            return "num_recensioni ASC";
        case "num-rew-desc":
            return "num_recensioni DESC";
        default:
            return "media_recensioni DESC";
    }
}

function printStars($value) {
    for ($i = 1; $i <= $value; $i++) {
        echo "<span class=\"bi bi-star-fill\"></span>\n";
    }
    $decimals = $value - floor($value);
    if ($decimals >= 0.5) {
        echo "<span class=\"bi bi-star-half\"></span>\n";
        $i++;
    }
    for ( ; $i <= 5; $i++) {
        echo "<span class=\"bi bi-star\"></span>\n";
    }
}

function isValidReservationForInsertion($dateTime, $canteenId, $numGuests, $dbh) {
    $timeIn = (new DateTimeImmutable($dateTime))->getTimestamp();
    $timeOut = (new DateTime($dateTime));
    $timeOut->modify("+30 minutes");
    $timeOut = $timeOut->getTimestamp();
    $resStatus = $dbh->getReservationsStatusInInterval($canteenId, date("Y-m-d H:i:s", $timeIn), date("Y-m-d H:i:s", $timeOut));

    return $numGuests <= ($resStatus[0]["posti_disponibili"]);
}

function isValidReservationForUpdate($oldReservation, $newDateTime, $newNumGuests, $dbh) {
    $timeIn = (new DateTimeImmutable($newDateTime))->getTimestamp();
    $timeOut = (new DateTime($newDateTime));
    $timeOut->modify("+30 minutes");
    $timeOut = $timeOut->getTimestamp();
    $resStatus = $dbh->getReservationsStatusInInterval($oldReservation->getCanteen()->getId(), date("Y-m-d H:i:s", $timeIn), date("Y-m-d H:i:s", $timeOut));

    $new = new DateTimeImmutable($newDateTime);

    // If the two reservations are for the same time, we consider only the different guests
    if ($oldReservation->getDateTime() == $new) {
        $oldNumGuests = $oldReservation->getNumPeople();
    } else {
        $oldNumGuests = 0;
    }

    return $newNumGuests - $oldNumGuests <= ($resStatus[0]["posti_disponibili"]);
}

?>