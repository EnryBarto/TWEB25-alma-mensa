<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Gestisci Prenotazioni";
$currentPage["filename"] = "manage_reservations.php";
$currentPage["cssfile"] = "manage_reservations.css";
$currentPage["scriptfile"] = "manage_reservations.js";
$currentPage["externalscriptfile"] = "https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js";

require '../src/template/base.php';
?>