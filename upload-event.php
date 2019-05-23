<?php
  $title = "Peterman Ratings | Upload Event";
  
  include("./includes/header.php");
  include("./includes/navigation.php");

  if(!$account->isLoggedIn())
  {
  	redirect("./index.php");
  }
?>

<article class ="event-details-border" >
  
  <form class= "event-upload-form" autocomplete="off" action=".\process-event.php" method="post">
  <h1 class="event-details-header">Event Details</h1>
 
  <div class="event-form" action="">
    <div class="event-details-row">
      <input class="event-field-input" type="text" id="event-name" name="event-name" placeholder="Name" pattern="[a-zA-Z0-9\s]{1,90}" required title="Event name must be within 1-90 characters and can contain letters and numbers"><br/><br/>
      <select class="event-type" name="country-id" id="country-id">
		  <?php
			$countries = $contentManager->getAllCountries();
			while ($country = $countries->fetch())
			{
				echo "<option value=\"".$country["country_id"]."\">".$country["name"]."</option>";
			}
		  ?>
      </select>
      
      <br/><br/>
      <!-- <input class="event-field-input" type="text" name="state-name" placeholder="State"><br/><br/> -->
      
      <select class="event-type" name="state-name" id="state-name">

      </select>
      
      <br /><br />
    </div>
  
    <div class="event-details-row">
       <select class="sport-type" name="sport-type">
         <?php
            $sports = $contentManager->getAllSports();

            while ($sport = $sports->fetch())
            {
                echo "<option value=\"".$sport["sport_id"]."\">".$sport["name"]."</option>";
            }
        ?>
       </select><br/><br/>
        
      <select class="event-type" name="event-type">
          <option value="Single">Singles</option>
          <option value="Double">Doubles</option>
      </select><br/><br/>
       
      <input class="event-field-input" name="event-date" id="event-date" placeholder="Date" required type="text"onfocus="(this.type='date')" onblur="(this.type='text')"><br/>
    </div>
  </div>
  
  <hr>
  <div class="ui-widget"> 
    <h1 class="match-details-header">Match Details</h1>
    <input class="match-field-input" id="match-field-input" type="number" id="match-number"  name="match-number"  placeholder="Add/Delete Matches" pattern="[0-9]{1,3}" title="Number must be within 1-300">
  <button class = "match-number-input" id = "match-submit"  name="match-number-submission" value="Add Matches" onclick="showUploadMatchRows(); return false;">Add Matches</button><br/>
    
    
      <table id="match-input-table"></table>
      <button class="add-button"  name="add-button" id="add-button"  onclick="addMoreRows(); return false;" > Add Match </button>
   
   </div>

      
    
  <input class= "match-submit" id="match-final-submit" type="submit"  name="event-page-submission" value="Submit"><br/>

  </form>
</article>


<?php
  include("./includes/footer.php");
?>
    
      
    
    
       
 
    
    
  
    
      
 
     
       
  
  
       
    
   
      
      
      
   
 
 
    
    
   
    
 
     
     
  
    
      
        
        
         
