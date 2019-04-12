<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  session_start();
  require("./classes/database.php");
  require("./classes/account.php");
  include("./includes/functions.php");

  $database = new Database();
  $account = new Account($database);
?>