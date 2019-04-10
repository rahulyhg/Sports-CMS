<?php
  $path = $_SERVER['DOCUMENT_ROOT'];
  $title = "Peters Ratings | Profile";
  
  include("$path/includes/header.php");
  include("$path/includes/navigation.php");
?>

<div class="image-border">
  <img id="player-image" alt="Player">
</div>

<div class="player-details-border">Name & Region</div>
  <table class="player-ratings-border">
    <tr class="rating-header">
      <td>Single</td>
    </tr>
    <tr class="rating-value">
      <td>RATING</td>
    </tr>
  </table>
</div>

<?php
  include("$path/includes/footer.php");
?>

