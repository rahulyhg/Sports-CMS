<?php
  $title = "Peters Ratings | Profile";
  require("./includes/initialize.php");
  
  include("./includes/header.php");
  include("./includes/navigation.php");
?>

<div class="player-profile-border">

  <div class="player-image-border">
    <img id="player-image" alt="Player">
  </div>

  <div class="player-details-border">

    <h1 class="player-name">John Doe</h1>

    <ul class="player-bio">
      <li><span>Gender</span></li>
      <li><span>Age</span></li>
      <li><span>Region</span></li>
      <li><span>Club</span></li>
    </ul>

    <table class="player-rating-table" border="0">
    <tr>
      <th><h3>Player Rating</h3></th>
    </tr>
    <tr>
      <td class="rating-value">
        <span id="mean">1043</span>
        <span id="sd">±48</span>
      </td>
    </tr>
  </table>

  </div>

  

  <div class="player-history-border">

    <b>Player History</b>

    <table class="player-history-table" cellspacing="1" cellpadding="3" border="0">
      <tr>
        <th></th>
        <th>Winner</th>
        <th>Loser</th>
        <th>Result</th>
        <th>Point Change</th>
        <th>New Rating</th>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>

  </div>

</div>

<?php
  include("./includes/footer.php");
?>

