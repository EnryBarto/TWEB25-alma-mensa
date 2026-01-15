<?php
    require_once '../src/bootstrap.php';
    header("Content-Type: text/html; charset=UTF-8");
    if (isset($_GET['id'])) {
        $c = $dbh->getCanteenById($_GET['id']);
        if ($c) {
            include('../src/template/card.php');
        }
    }
?>