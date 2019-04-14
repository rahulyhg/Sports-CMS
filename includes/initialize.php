<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include("./includes/functions.php");
    require("./classes/database.php");
    require("./classes/account.php");

    $database = new Database();
    $account = new Account($database);
?>