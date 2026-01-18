<?php
define("UPLOAD_DIR", "../public/upload/");

session_start();

require_once("database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "almamensa", 3306);

require_once("classes.php");
require_once("utils.php");



if (isUserLoggedIn()) {
   switch (getUserLevel()) {
      case UserLevel::Customer:
         $user = $dbh->getCustomerByEmail($_SESSION["user"]->getEmail());
         break;

      case UserLevel::CanteenAdmin:
         $user = $dbh->getCanteenByEmail($_SESSION["user"]->getEmail());
         break;
   }

   registerLoggedUser($user);
}

?>