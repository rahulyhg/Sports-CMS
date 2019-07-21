<?php 
    $title = "Peterman Ratings | Home";

    include("./includes/header.php");
    include("./includes/navigation.php");

    if(isset($_GET['email']) && isset($_GET['token']))
    {

    }
    else
    {
      redirect("index.php");
    }
?>

<article>

  

</article>

<?php
    include("./includes/footer.php");
?>