<?php
  $title = "Peterman Ratings | Profile";
  
  include("./includes/header.php");
  include("./includes/navigation.php");
?>

<article>

  <div class="search-box">
    <div class="search-field">
      <input type="txt" class="search-input" placeholder="Search for Players">
      <button class="search-button" onclick="" type="button">Search</button>
    </div>
  </div>

  <div class="player-details-border">

    <h1>Player Details</h1>

    <ul class="player-bio-list">
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>First Name</b></span>
      	<span id="player-bio-row-value">Jessica</span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Last Name</b></span>
      	<span id="player-bio-row-value">Simpson</span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Gender</b></span>
      	<span id="player-bio-row-value">F</span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Age</b></span>
      	<span id="player-bio-row-value">38</span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Country</b></span>
      	<span id="player-bio-row-value">US</span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>State</b></span>
      	<span id="player-bio-row-value">Texas</span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Clubs</b></span>
      	<span id="player-bio-row-value">A-Team</span>
      </li>
      <li id="player-bio-row">
      	<span id="player-bio-row-heading"><b>Sport</b></span>
      	<span id="player-bio-row-value">
      		<select class="select-sport-menu">
      			<option id="select-sport-option">Badminton</option>
      			<option>Squash</option>
      			<option>Tennis</option>
      		</select>
      	</span>
      </li>
    </ul>

    <div class="rating-border">
 	  <div class="mean-border">
	    <div id="side-colour-mean">&nbsp</div>	    	
		  <p id="mean-value">2267</p>
		  <p>Tennis Rating</p>   	
      </div>
	     
	  <div class="sd-border"> 
	    <div id="side-colour-sd">&nbsp</div>	    	
		  <p id="sd-value">75</p>
		  <p>Accuracy</p>   	
	  </div>
	</div>

  </div> 

  <div class="player-history-border">

    <h1>Player History</h1>

    <h2>Tennis</h2>

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
      <a href="#"><img alt="arrow_icon"></a>
    </div>

  </div>

</article>


<?php
  include("./includes/footer.php");
?>

