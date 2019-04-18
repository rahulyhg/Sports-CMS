<header>    
  <nav>

    <div class="nav-menu-logo">
      <a href="./index.php">
        <img src="./resources/images/logo.png" alt="">
      </a>
    </div>

    <div class="nav-menu-links">
      <a href="./index.php">home</a>
      <a href="./ratings.php">players</a>
      <a href="./events.php">events</a>
      <a href="./clubs.php">clubs</a>
      <a href="#" class="nav-sign-in-button" onclick="toggleDropdownMenu()"> 
        <?php 
          if(!$account->isLoggedIn())
          { 
            echo "Sign In"; 
          }
          else
          { 
            echo "Account"; 
          }
        ?>
      </a>

      <?php
        if($account->isLoggedIn())
        {
          include("navMenuSignedIn.php");
        }
        else
        {
          include("navMenuSignedOut.php");
        }
      ?>

   </nav>
</header>

   
