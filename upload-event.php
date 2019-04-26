<?php
  $title = "Peters Ratings | Upload Event";
  
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
      <input class="event-field-input" type="text" name="event-name"placeholder="Event name"><br/><br/>
      <input class="event-field-input" type="text" name="country-name" placeholder="Country"><br/><br/>
      <input class="event-field-input" type="text" name="state-name" placeholder="State"><br/><br/>
    </div>
  
    <div class="event-details-row">
       <select class="sport-type" name="sport-type" ><option value="" selected>Select sport type</option> 
         <option value="badminton">Badminton</option>
         <option value="table-tennis">Table-Tennis</option>
          <option value="squash">Squash</option>
       </select><br/><br/>
        
      <select class="event-type" name="event-type" placeholder="Event type">
          <option value="" selected>Select event type</option>
          <option value="single">Single</option>
          <option value="double">Double</option>
      </select><br/><br/>
       
         <input class="event-field-input" name="event-date" id="event-date" placeholder="Event date"type="text"onfocus="(this.type='date')" onblur="(this.type='text')"><br/>
    </div>
  </form>
  
    <hr>
  
    <h1 class="match-details-header">Match Details</h1>
  
      <div class= "match-number">
        <input class="match-field-input" type="number" id="match-number"  name="match-number"  placeholder="Add 1 or more matches" min="1" ><br/>
      </div><br/>
  
  <form class="match-form" action="">
    <div class="match-details-row">
       <div class="match-details-column">
         <input class="match-field-input"type="text" name="winner-name" placeholder="Winner"><br/>
       </div>
      
      <div class="match-details-column">
        <input class="match-field-input"type="text" name="loser-name" placeholder="Loser"><br/>
      </div>
      
      <div class="match-details-column">
        <input class="match-field-input" type="text" name="match-date" id="match-date" placeholder="Match date"type="text" onfocus="(this.type='date')" onblur="(this.type='text')"><br/>
      </div>
    </div>
    
   <input id="submit" type="submit" name="event-page-submission" value="submit"><br/>
  </form>
</article>

<?php
  include("./includes/footer.php");
?>
    
      
    
    
       
 
    
    
  
    
      
 
     
       
  
  
       
    
   
      
      
      
   
 
 
    
    
   
    
 
     
     
  
    
      
        
        
         
