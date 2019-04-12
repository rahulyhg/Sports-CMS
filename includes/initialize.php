<?php
  session_start();

  require("../classes/database.php");
  require("../classes/account.php");
  include("../includes/functions.php");

  $database = new Database();
  //$account = new Account($database);
?>