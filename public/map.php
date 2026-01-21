<?php
require_once '../src/bootstrap.php';

$currentPage["title"] = "Mappa";
$currentPage["filename"] = "map.php";
$currentPage["scriptfile"] = "map.js";
$currentPage["cssfile"] = "map.css";
$currentPage["externalcssfile"] = "https://unpkg.com/leaflet@1.9.4/dist/leaflet.css";
$currentPage["externalscriptfile"] = "https://unpkg.com/leaflet@1.9.4/dist/leaflet.js";
$templateParams["h1"] = "Esplora la mappa";
$templateParams["subtitle"] = "Trova la mensa nelle tue vicinanze";

$templateParams["categories"] = array_column($dbh->getCategories(), "nome");

require '../src/template/base.php';
?>