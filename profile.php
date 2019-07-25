<?php
  $title = "Peterman Ratings | Profile";
  
  include("./includes/header.php");
  include("./includes/navigation.php");

  //Testing purposes, this will get dynamically sent eventually.
  $_SESSION["profile-id"] = 1;

  if(isset($_SESSION["profile-id"])) //this will be $_POST later
  {
      $playerId = $_SESSION["profile-id"];
      $playerInfo = $contentManager->getSpecificPlayerInformation($playerId);
      $playerClub = $contentManager->getPlayerClub($playerId);
      $playerRating = $contentManager->getPlayerRating($playerId, 1);

      $userDob = new DateTime($playerInfo["date_of_birth"]);
      $today = new Datetime(date("Y-m-d"));
      $age = $today->diff($userDob)->y;
  }
?>

<article>

  <script type="text/javascript">
		  $(document).ready(function(){
			  enlargeImageWhenHovered();
		  });
  </script>

  <div class="favourite-icon-border">
  	<a class="favourite-icon-link" href="#">
  		<img class="favourite-icon" alt="favourite-icon" src="resources/images/favourite-icon-24.png" onclick="changeImageWhenClicked();">favourite
  	</a>
  </div>

  <div class="player-details-border">

    <h1>Player Details</h1>

    <ul class="player-bio-list">
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>First Name</b></span>
      	<span id="player-bio-row-value"> <?php echo $playerInfo["given_name"]; ?> </span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Last Name</b></span>
      	<span id="player-bio-row-value"> <?php echo $playerInfo["family_name"]; ?> </span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Gender</b></span>
      	<span id="player-bio-row-value"> <?php echo $playerInfo["gender"]; ?> </span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Age</b></span>
      	<span id="player-bio-row-value"> <?php echo $age; ?> </span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Country</b></span>
      	<span id="player-bio-row-value"> <?php echo $playerInfo["country_name"]; ?> </span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>State</b></span>
      	<span id="player-bio-row-value"> <?php echo $playerInfo["state_name"]; ?> </span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Club</b></span>
      	<span id="player-bio-row-value"> <?php echo $playerClub["name"]; ?> </span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Sport</b></span>
      	<span id="player-bio-row-value">
      		<select class="select-sport-menu">
      			<?php
            $sports = $contentManager->getAllSports();

            while ($sport = $sports->fetch())
            {
                echo "<option value=\"".$sport["sport_id"]."\">".$sport["name"]."</option>";
            }
        ?>
      		</select>
      	</span>
      </li>
    </ul>

    <div class="rating-border">
 	  <div class="mean-border">
	    <div id="side-colour-mean">&nbsp</div>	    	
		  <p id="mean-value">
		  <?php
			echo (int)$playerRating['mean'];
		  ?>
		  </p>
		  <p>Badminton Rating</p>   	
      </div>
	     
	  <div class="sd-border"> 
	    <div id="side-colour-sd">&nbsp</div>	    	
		  <p id="sd-value">
		  <?php
			echo (int)$playerRating['standard_deviation'];
		  ?>
		  
		  </p>
		  <p>Standard Deviation</p>   	
	  </div>
	</div>

  </div> 

  <div class="player-history-border">

    <h1>Player History</h1>

    <h2>Badminton</h2>

    <table class="player-history-table" border="0">
      <tr id="odd-row">
        <th>Event</th>
        <th>Initial Rating</th>
        <th>Point Change</th>
        <th>Final Rating</th>
      </tr>
      <tr id="even-row">
        <td>A League</td>
        <td>1043</td>
        <td>+3</td>
        <td>1046</td>
      </tr>
      <tr id="odd-row">
        <td>A League</td>
        <td>1046</td>
        <td>-10</td>
        <td>1036</td>
      </tr>
      <tr id="even-row">
        <td>A League</td>
        <td>1036</td>
        <td>+5</td>
        <td>1041</td>
      </tr>
    </table>

    <div id="player-history-view-more">
      <span>View More</span>
      <a href="#"><img alt="arrow-icon"></a>
    </div>

  </div>

</article>


<?php
  include("./includes/footer.php");
?>


