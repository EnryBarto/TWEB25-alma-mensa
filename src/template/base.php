<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $currentPage["title"]; ?></title>
    <!-- Bootstrap CSS -->
    <link href="assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- Map CSS -->
    <?php if (isset($currentPage["filename"]) && $currentPage["filename"] == "map.php") : ?>
        <link rel="stylesheet" href="assets/css/map.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
    <?php endif; ?>
</head>

<body>
    <?php require("navbar.php"); ?>
    <main class="container-fluid">
    <?php
    if(isset($currentPage["filename"])){
        require($currentPage["filename"]);
    }
    ?>
    </main>
    <footer class="container-fluid mt-2">
        <p>FOOTER: TODO</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <?php if (isset($currentPage["filename"]) && $currentPage["filename"] == "map.php") : ?>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <?php endif; ?>
    <?php if (isset($currentPage["scriptfile"])) : ?>
    <script src="assets/js/<?php echo $currentPage["scriptfile"]; ?>" ></script>
    <?php endif; ?>
</body>

</html>