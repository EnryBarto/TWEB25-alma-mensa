<?php
require_once '../src/bootstrap.php';

logoutUser();
header("Location: index.php");

exit();
?>