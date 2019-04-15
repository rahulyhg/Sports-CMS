<div class="register-modal-background">
  <div class="register-modal-content">

  	<div class="register-modal-header">
  	  <div class="register-modal-exit-button" onclick="hideRegisterModal()">+</div>
  	</div>

  	<div class="register-modal-fields">
  	  <h2>Create Account</h2>
  	  <hr/>
  	  <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <input type="text" name="given-name" pattern="[a-zA-Z\s]{1,45}" required title="Given name must be within 1-45 characters">
  		<input type="text" name="family-name" pattern="[a-zA-Z\s]{1,45}" required title="Family name must be within 1-45 characters">
  		<input type="email" name="email">
  		<input type="password" name="password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{6,255}" required title="Password must be at least 6 characters, and contain a capital letter and a number">
  		<input type="password" name="confirm-password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{6,255}" required title="Password must be at least 6 characters, and contain a capital letter and a number">
  		<button type="submit" name="create-account" onclick="">Create Account</button>
      </form>
  	</div>

  </div>
</div>

