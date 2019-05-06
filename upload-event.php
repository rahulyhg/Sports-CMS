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
  
  <h1 class="event-details-header">Event Details</h1>
  
  <form class="event-form" action="">
    <div class="event-details-row">
      <input class="event-field-input" type="text" name="event-name"placeholder="Name"><br/><br/>
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
         <option value="badminton">Badminton</option> 
         <option value="table-tennis">Table-Tennis</option>
         <option value="squash">Squash</option>
       </select><br/><br/>
        
      <select class="event-type" name="event-type">
          <option value="single">Singles</option>
          <option value="double">Doubles</option>
      </select><br/><br/>
       
      <input class="event-field-input" name="event-date" id="event-date" placeholder="Date"type="text"onfocus="(this.type='date')" onblur="(this.type='text')"><br/>
    </div>
  </form>
  
  <hr>
    <h1 class="match-details-header">Match Details</h1>
    <input class="match-field-input" id="match-field-input" type="number" id="match-number"  name="match-number"  placeholder="Add/Delete Matches" min="1" >
    <input class = "match-number-input"id = "match-submit" type="submit" name="match-number-submission" value="Add Matches" onclick="showUploadMatchRows()"><br/>
    
    <form class="match-form" id="match-form" action="" autocomplete="off">
      <table id="match-input-table"></table>
      <input class="add-button" type="submit" name="add-button" id="add-button" value="Add  Match" onclick="addMoreRows(); return false;" >
    

      <input class= "match-submit" id="match-final-submit" type="submit"  name="event-page-submission" value="Submit"><br/>
    </form>
    
</article>

<?php
  include("./includes/footer.php");
?>
    
      
    
    
       
 
    
    
  
    
      
 
     
       
  
  
       
    
   
      
      
      
   
 
 
    
    
   
    
 
     
     
  
    
      
        
        
         
