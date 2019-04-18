<?php 
    $title = "Peters Ratings | Account";

    include("./includes/header.php");
    include("./includes/navigation.php");

    if(!$account->isLoggedIn())
    {
    	redirect("index.php");
    }
?>

<article>
  
<!-- CODE HERE -->

</article>

<?php
    include("./includes/registerModal.php");
    include("./includes/footer.php");
?>