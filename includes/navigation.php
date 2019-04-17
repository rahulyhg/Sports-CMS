<header>    
  <nav>

    <div class="nav-menu-logo">
      <a href="./index.php">
        <img src="./resources/images/logo.png" alt="">
      </a>
    </div>

    <div class="nav-menu-links">
      <a href="./index.php">home</a>
      <a href="./ratings.php">ratings</a>
      <a href="./events.php">events</a>
      <a href="./clubs.php">clubs</a>
      <a href="#" class="nav-sign-in-button" onclick="toggleDropdownMenu()">Sign In</a>

      <div class="dropdown-menu">
        <div class="dropdown-header">
          <h3>Sign in to your Account</h3>
        </div>   
        <div class="dropdown-signin-fields">
          <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <input type="email" id="signin-email" name="email" placeholder="Email" required>
            <input type="password" id="signin-password" name="password" placeholder="Password" pattern="{1,255}" required>
            <a href="#" class="forgot-password" onclick="showRegisterModal()">Forgotten Password?</a>
            <button type="submit" name="signin-account" class="signin-account-button" onclick="">Sign In</button>
          </form>
          <div class="create-account-wrapper">
            <p>Not a member yet?</p>
          <a href="#" class="create-account-modal" onclick="showRegisterModal()">Create Account</a>
          </div>
        </div>
      </div>

   </nav>
</header>

   
