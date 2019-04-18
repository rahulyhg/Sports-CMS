<div class="register-modal-background">
  <div class="register-modal-content">

  	<div class="register-modal-header">
  	  <div class="register-modal-exit-button" onclick="hideRegisterModal()">+</div>
  	</div>

  	<div class="register-modal-fields">
  	  <h2>Account Information</h2>
  	  <hr/>
      <div class="register-modal-field-wrapper">
        <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

        <div class="register-input-group-double">
          <input type="text" id="input-given-name" name="given-name" placeholder="Given Name" pattern="[a-zA-Z\s]{1,45}" required title="Given name must be within 1-45 characters">
          <input type="text" id="input-family-name" name="family-name" placeholder="Family Name" pattern="[a-zA-Z\s]{1,45}" required title="Family name must be within 1-45 characters">
        </div>

        <div class="register-input-group-double">
          <input type="text" id="input-organisation" name="organisation-name" placeholder="Organisation" pattern="[a-zA-Z\s]{1,90}" required title="Organisation name must be within 1-90 characters">
          <input type="email" id="input-email" name="email" placeholder="Email"> 
        </div>

        <div class="register-input-group-double">
          <input type="password" id="input-password" name="password" placeholder="Password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{6,255}" required title="Password must be at least 6 characters, and contain a capital letter and a number">
          <input type="password" id="input-confirm-password" name="confirm-password" placeholder="Confirm Password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{6,255}" required title="Password must be at least 6 characters, and contain a capital letter and a number">
        </div>

        <div class="confirm-terms">
          <p>By  clicking  below  and  creating  an  account,  you  agree  to  our  account</p>
          <a href="https://www.w3schools.com">Terms and Conditions</a>
        </div>

        <button type="submit" name="create-account" id="create-account-button" onclick="">Create Account</button>
      </form>
      </div>
  	</div>

  </div>
</div>

