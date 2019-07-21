<?php
  include("./includes/register-modal.php");
  include("./includes/forgot-password-modal.php")
?>

<footer>
  <div class="footer-container">

    <div class="footer-top-content">
     <div class="footer-logo">
        <a href="./index.php">
          <img src="./resources/images/logo.png" alt="">
        </a>
      </div>
      <div class="footer-information">
        <h2 class="footer-heading">Information</h2>
        <a href="./about-us.php">About Us</a>
        <a href="./privacy-policy.php">Privacy Policy</a>
        <a href="./terms-and-conditions.php">Terms & Conditions</a>
      </div>
    <!--  <p>|</p> -->
      <div class="footer-social-media">
        <h2 class="footer-heading">Follow Us</h2>
        <a href="www.facebook.com">Facebook</a>
        <a href="www.twitter.com">Twitter</a>
        <a href="www.instagram.com">Instagram</a>
      </div>
    </div>

    <div class="footer-bottom-content">
      <hr/>
      <small>&copy; <?php echo date('Y'); ?> Name. All Rights Reserved.</small>
    </div>

  </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="./javascript/jquery-ui.min.js"></script>
<script src="./javascript/scripts.js"></script>

</body>
</html>

