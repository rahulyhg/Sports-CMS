<?php 
    $title = "Peters Ratings | Home";

    include("./includes/header.php");
    include("./includes/navigation.php");
?>

<?php


  /*  TEST QUERY (Get Access Level - Working)
      $stuff = $account->getAccessLevel();
      echo $stuff["access_level"];
  */

  /* TEST QUERY (Register - Working) 
      $result = $account->register("yusuf@gmail.com", "Password2", "Yusuf", "Uzun", 1);
  */

  /* TEST QUERY (Login - Working) 
      $account->login("grantaupson@gmail.com", "Password2");

      if($account->isLoggedIn())
      {
        echo "Logged In";
      }
  */
      //$account->logout();
?>

<article>
  
</article>

<?php
    include("./includes/registerModal.php");
    include("./includes/footer.php");
?>