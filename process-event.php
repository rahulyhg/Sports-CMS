<?php

require("./includes/initialize.php");

//first parse the data and ensure it is formatted correctly.
	//if not formatted correctly stop and return to previous page.
	
	//yet to be implemented

	$eventName = $_POST["event-name"];
	$countryID = $_POST["country-id"];
	$stateID = $_POST["state-name"];
	$sportID = $_POST["sport-type"];
	$eventType = $_POST["event-type"];
	$eventDate = $_POST["event-date"];

	$eventID = $contentManager->createEvent($eventName, $countryID, $stateID, $sportID, $eventType, $eventDate);
	
	$mapleFileManager = new MapleFileManager($eventID, $_POST['event-date']);
	
//create new game and game_result in the database for each match
	for ($i = 0; $i < count($_POST['winner-id']); $i++)
	{
		//get players current stats. 
		$winnerStats = $contentManager->getPlayerCurrentStats($_POST['winner-id'][$i]);
		$loserStats = $contentManager->getPlayerCurrentStats($_POST['loser-id'][$i]);
		
		//create new game in db and get the id
		//$gameID = $contentManager->newGame($_POST['winner-id'][$i],$winnerStats['mean'],$winnerStats['standard_deviation'],$_POST['loser-id'][$i],$loserStats['mean'],$loserStats['standard_deviation'],$eventID);
		$gameID = "44"; //for testing only
		
		//add the game to the maple manager
		$mapleFileManager->addMatchData($_POST['winner-id'][$i],$winnerStats['mean'],$winnerStats['standard_deviation'],$winnerStats['last_played'],$_POST['loser-id'][$i],$loserStats['mean'],$loserStats['standard_deviation'],$loserStats['last_played'],$gameID);
	}
	
//finsh by writing maple data to file and adding it to the queue
$mapleFileManager->write();
$mapleFileManager->addToQueue();
	
// redirect and show user some confirmation

//still need to implement creating maple file. 

var_dump($_POST);

?>
