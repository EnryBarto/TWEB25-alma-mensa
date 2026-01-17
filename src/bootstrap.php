<?php
define("UPLOAD_DIR", "../public/upload/");

require_once("classes.php");
require_once("utils.php");
require_once("database.php");

session_start();

$dbh = new DatabaseHelper("localhost", "root", "", "almamensa", 3306);

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