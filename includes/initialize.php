<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    use PHPMailer\PHPMailer\PHPMailer;

    include("./includes/functions.php");
    require("./classes/PHPMailer/Exception.php");
    require("./classes/PHPMailer/PHPMailer.php");
    require("./classes/database.php");
    require("./classes/account.php");
    require("./classes/content-manager.php");
    require("./classes/maple-file-manager.php");

    $database = new Database();
    $account = new Account($database);
    $contentManager = new ContentManager($database);
?>
