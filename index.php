<?php 
  $title = "Peters Ratings | Home";
  include("./includes/header.php");
  include("./includes/navigation.php");
?>

<?php

  $query = new Query();
  $stuff = $query->getAllPlayers();

  while($row = $stuff->fetch())
  {
  	echo $row["given_name"]." ".$row["family_name"];
  }

?>

<?php
  include("./includes/footer.php");
?>