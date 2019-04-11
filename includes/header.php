<?php 
  session_start();
  include("./includes/database.php");
  include("./includes/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="A website devoted to rating players and teams in sports">
  <meta name="keywords" content="Sport, Rating, Match, Player, Team">
  <meta name="author" content="Grant Upson, Yusuf Uzun, James Watkins, Mingxin Wen, Marcus Grantham, Harry Singh, Adib Ornob"> 

  <link rel="stylesheet" href="./resources/css/styles.css">
  <link rel="icon" href="./resources/images/favicon.ico">

  <title> <?php echo $title; ?> </title>

</head>

<body>
