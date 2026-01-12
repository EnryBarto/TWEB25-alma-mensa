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
    <?php if (isset($currentPage["externalcssfile"])): ?>
        <link rel="stylesheet" href="<?php echo $currentPage["externalcssfile"]; ?>">
    <?php endif; ?>
    <?php if (isset($currentPage["cssfile"])) : ?>
    <link rel="stylesheet" href="assets/css/<?php echo $currentPage["cssfile"]; ?>" >
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
    <?php if (isset($currentPage["externalscriptfile"])): ?>
            <script src="<?php echo $currentPage["externalscriptfile"]; ?>"></script>
    <?php endif; ?>
    <?php if (isset($currentPage["scriptfile"])) : ?>
    <script src="assets/js/<?php echo $currentPage["scriptfile"]; ?>" ></script>
    <?php endif; ?>
</body>

</html>