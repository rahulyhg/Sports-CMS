<?php

require("./includes/initialize.php");

//first parse the data and ensure it is formatted correctly.
	//if not formatted correctly stop and return to previous page.
	
	//yet to be implemented


//create an event and plays_at entry in the database
	//currently unable to be implmeneted as club is not captured.
	
	//need to get returned from that function the new event_id
	$eventID = 123;

//create new game and game_result in the database for each match
	for ($i = 0; $i < $_POST['winner-id'].count(); $i++)
	{
		//get current stats. 
		$winnerStats = $contentManager->getPlayerCurrentStats($_POST['winner-id'][$i]);
		$loserStats = $contentManager->getPlayerCurrentStats($_POST['loser-id'][$i]);
		
		//$gameID = $contentManager->newGame($_POST['winner-id'][$i],$winnerStats['mean'],$winnerStats['standard_deviation'],$_POST['loser-id'][$i],$loserStats['mean'],$loserStats['standard_deviation'],$eventID);
		
	}
	
//show user confirmation

//still need to implement creating maple file. 

var_dump($_POST);





?>
