<?php

require("./includes/initialize.php");

	if(!$account->isLoggedIn())
	{
		redirect("./index.php");
	}
	else
	{
		$eventType = $_POST["event-type"];
		$countryID = $_POST["country-id"];
		$stateID = $_POST["state-name"];
		$sportID = $_POST["sport-type"];
		$eventDate = $_POST["event-date"];

		$playersValid = true;

		for ($i = 0; $i < count($_POST['winner-id']); $i++)
		{
			if(!$contentManager->playerExists($_POST['winner-id'][$i]) || !$contentManager->playerExists($_POST['loser-id'][$i]))
			{
				$playersValid = false;
			}
		}

		if(!$contentManager->eventDetailsValid($countryID, $stateID, $sportID, $eventType, $eventDate) && $playersValid)
		{
			redirect("./upload-event.php");
		}
		else
		{
			$eventName = trim($_POST["event-name"]);
			$eventName = preg_replace('/[^A-Za-z0-9\-]/', '', $eventName);
			$eventID = $contentManager->createEvent($eventName, $countryID, $stateID, $sportID, $eventType, $eventDate);
			
			$mapleFileManager = new MapleFileManager($eventID, $_POST['event-date']);
		
			//create new game and game_result in the database for each match
			for ($i = 0; $i < count($_POST['winner-id']); $i++)
			{
				$winnerStats = $contentManager->getPlayerCurrentStats($_POST['winner-id'][$i]);
				$loserStats = $contentManager->getPlayerCurrentStats($_POST['loser-id'][$i]);
				
				//create new game in db and get the id
				$gameID = $contentManager->newGame($_POST['winner-id'][$i],$winnerStats['mean'],$winnerStats['standard_deviation'],$_POST['loser-id'][$i],$loserStats['mean'],$loserStats['standard_deviation'],$eventID);
				
				//add the game to the maple manager
				$mapleFileManager->addMatchData($_POST['winner-id'][$i],$winnerStats['mean'],$winnerStats['standard_deviation'],$winnerStats['last_played'],$_POST['loser-id'][$i],$loserStats['mean'],$loserStats['standard_deviation'],$loserStats['last_played'],$gameID);
			}
			
			$mapleFileManager->write();
			$mapleFileManager->addToQueue();
		}
	}
		// redirect and show user some confirmation
		//this will be a redirect. The following is for testing only. 
		//[AJAX query and on result success open popup box?]
	redirect("./account.php");
		
?>


	

