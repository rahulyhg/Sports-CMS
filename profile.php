<?php
  $title = "Peters Ratings | Profile";
  
  include("./includes/header.php");
  include("./includes/navigation.php");
?>

<div class="player-profile-border">

  <div class="player-image-border">
    <img id="player-image" alt="player">
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

    <table class="player-history-table" border="0">
      <tr id="odd-row">
        <th></th>
        <th>Winner</th>
        <th>Loser</th>
        <th>Previous Rating</th>
        <th>Point Change</th>
        <th>New Rating</th>
      </tr>
      <tr id="even-row">
        <td><img alt=player></td>
        <td>John Doe</td>
        <td>Joe Kelaz</td>
        <td>1043</td>
        <td>+3</td>
        <td>1046</td>
      </tr>
      <tr id="odd-row">
        <td><img alt=player></td>
        <td>Jack Che</td>
        <td>John Doe</td>
        <td>1046</td>
        <td>-10</td>
        <td>1036</td>
      </tr>
      <tr id="even-row">
        <td><img alt=player></td>
        <td>John Doe</td>
        <td>Harry Kelaz</td>
        <td>1036</td>
        <td>+5</td>
        <td>1041</td>
      </tr>
    </table>

    <div id="player-history-view-more">
      <span>View More</span>
      <a href="#"><img alt="arrow_icon"></a>
    </div>

  </div>

</div>

<?php
  include("./includes/footer.php");
?>

