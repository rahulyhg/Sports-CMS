<?php

class ContentManager
{
	private $database;

	public function __construct($database)
	{
		$this->database = $database;
	}


	public function getAllPlayers()
	{
		$query = "SELECT * FROM player";
		$result = $this->database->query($query, null);

		return $result;
	}
	

	public function getSpecificPlayerInformation($player_id)
	{
		$query = "SELECT player.given_name, player.family_name, player.gender, player.date_of_birth, country.name as country_name, state.name as state_name FROM((player INNER JOIN country ON player.country_id = country.country_id) INNER JOIN state ON player.state_id = state.state_id) WHERE player_id = ?;";
		$result = $this->database->query($query, [$player_id])->fetch();

		return $result;
	}


	public function getPlayerClub($player_id)
	{
		$query = "select club.name FROM club INNER JOIN membership on membership.club_id = club.club_id WHERE player_id = ? ";
		$result = $this->database->query($query, [$player_id])->fetch();

		return $result;
	}

	public function getPlayerRating($playerId, $sportID)
	{
		$query = "SELECT * FROM `rating` WHERE `player_id`= ? AND `sport_id`= ?";
		$result = $this->database->query($query, [$playerId, $sportID])->fetch();
		
		return $result;
	}

	public function getAllCountries()
	{
		$query = "SELECT * FROM country";
		$result = $this->database->query($query, null);
		
		return $result;
	}
	

	public function getStatesByCountry($countryID)
	{
		$query = "SELECT state_id, name FROM state WHERE country_id = ?";
		$result = $this->database->query($query, [$countryID]);
		
		return $result;
		
	}


	public function getAllSports()
	{
		$query = "SELECT * FROM sport";
		$result = $this->database->query($query, null);
		
		return $result;
	}

	public function createEvent($name, $countryID, $stateID, $sportType, $eventType, $date)
	{
		$formatedDate = date_format(date_create($date), 'Y-m-d');
		
		$query = "INSERT INTO event (name, type, country_id, state_id, sport_id, start_date) VALUES (?, ?, ?, ?, ?, ?)";

		$result = $this->database->query($query, [$name, $eventType, $countryID, $stateID, $sportType, $formatedDate]);

		$idQuery = $this->database->query("SELECT LAST_INSERT_ID()", null);
		$id = $idQuery->fetchColumn();

		return $id;
	}
	
	public function newGame($winnerID, $winnerMean, $winnerSD, $loserID, $loserMean, $loserSD, $eventID)
	{
		//create game
		$query = "INSERT INTO `game` (`game_id`, `mean_before_winning`, `mean_after_winning`, `standard_deviation_before_winning`, `standard_deviation_after_winning`, `mean_before_losing`, `mean_after_losing`, `standard_deviation_before_losing`, `standard_deviation_after_losing`, `event_id`) VALUES (NULL, ?, NULL, ?, NULL, ?, NULL, ?, NULL, ?)";
		
		$result = $this->database->query($query,[$winnerMean,$winnerSD,$loserMean,$loserSD,$eventID]);
		
				
		//get game id
		$idQuery = $this->database->query("SELECT LAST_INSERT_ID()", null);
		$gameID = $idQuery->fetchColumn();
		
		//create game result for both winner and loser
		$query = "INSERT INTO `game_result` (`game_result_id`, `won`, `player_id`, `game_id`) VALUES (NULL, ?, ?, ?)";
		$result = $this->database->query($query,['Y', $winnerID, $gameID]);
		$result = $this->database->query($query,['N', $loserID, $gameID]);
		
		return $gameID;

	}
	
	public function getPlayerCurrentStats($playerID)
	{
		$query = 	"SELECT player.last_played, rating.mean, rating.standard_deviation 
					FROM player, rating
					WHERE 
						rating.player_id = ?
						AND
						rating.player_id = player.player_id";
		$result = $this->database->query($query,[$playerID])->fetch();
		
		return $result;
	}
	

	public function getPlayersByNameAndState($nameFilter, $stateID)
	{
		$unfiltered = preg_replace("/[^a-zA-Z0-9\s]/", "", $nameFilter);
		$nameString = explode(" ", $unfiltered);

		if(count($nameString) == 2)
		{
			$query = "SELECT `player_id`, `given_name`, `family_name` FROM player WHERE (state_id = '" . $stateID . "') AND (given_name LIKE '%" . $nameString[0] . "%' OR
				family_name LIKE '%" . $nameString[1] . "%')";
		}
		else if(count($nameString) == 1)
		{
			$query = "SELECT `player_id`, `given_name`, `family_name` FROM player WHERE (state_id = '" . $stateID . "') AND (given_name LIKE '%" . $nameFilter . "%' OR
				family_name LIKE '%" . $nameFilter . "%')";
		}
		else
		{
			//No error handling atm
		}

		$result = $this->database->query($query, null); 

		return $result;
	}
	

	public function getEventSport($eventID)
	{
		$query = "SELECT sport_id FROM event WHERE event_id = ?";
		$result = $this->database->query($query,[$eventID])->fetch();
		
		return $result["sport_id"];
	}


	public function playerExists($playerID)
	{
		$query = "SELECT player_id FROM player WHERE player_id = ?";
		$result = $this->database->query($query, [$playerID]);

		return ($result->rowCount() > 0);
	}


	public function countryExists($countryID)
	{
		$query = "SELECT country_id FROM country WHERE country_id = ?";
		$result = $this->database->query($query, [$countryID]);

		return ($result->rowCount() > 0);
	}


	public function stateExists($stateID)
	{
		$query = "SELECT state_id FROM state WHERE state_id = ?";
		$result = $this->database->query($query, [$stateID]);

		return ($result->rowCount() > 0);
	}


	public function sportExists($sportID)
	{
		$query = "SELECT sport_id FROM sport WHERE sport_id = ?";
		$result = $this->database->query($query, [$sportID]);

		return ($result->rowCount() > 0);
	}


	public function eventTypeIsValid($eventType)
	{	
		$isValid = false;

		if(strcmp($eventType, 'Single') == 0 || strcmp($eventType, 'Double') == 0)
		{
			$isValid = true;
		}

		return $isValid;
	}


	public function eventDateIsValid($eventDate)
	{
		if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}\z/', $eventDate))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	public function eventDetailsValid($countryID, $stateID, $sportID, $eventType, $eventDate)
	{
		$isValid = true;

		if(!$this->countryExists($countryID) || !$this->stateExists($stateID) || !$this->sportExists($sportID) || !$this->eventTypeIsValid($eventType) || !$this->eventDateIsValid($eventDate))
		{
			$isValid = false;
		}

		return $isValid;
	}
	
	/**
	 * After running maple script this function updates the ratings for 
	 * winners and losers of each match in a tournament.
	 * 
	 */
	public function updateAfterMatchStatisticComputed($tournamentDate, $sportID, $matchID, $winnerID, $winnerNewMean, $winnerNewSD, $loserID, $loserNewMean, $loserNewSD)
	{
		//update entry in game
		$query = "UPDATE game
					SET 
						game.mean_after_winning = ?,
						game.standard_deviation_after_winning = ?,
						game.mean_after_losing = ?,
						game.standard_deviation_after_losing = ?
					WHERE 
						game.game_id = ?;";
		
		$result = $this->database->query($query,[$winnerNewMean,$winnerNewSD, $loserNewMean, $loserNewSD, $matchID]);
		
		//update players ratings.
		
		$query = "UPDATE player, rating
					SET
						player.last_played = STR_TO_DATE(?,'%d/%m/%Y'),
						rating.mean = ?,
						rating.standard_deviation = ?,
						rating.last_calculated = NOW()
					WHERE
						player.player_id = ? AND
						player.player_id = rating.player_id AND
						rating.sport_id = ?;";

		$result = $this->database->query($query,[$tournamentDate,$winnerNewMean,$winnerNewSD,$winnerID,$sportID]);
		
		$result = $this->database->query($query,[$tournamentDate,$loserNewMean,$loserNewSD,$loserID,$sportID]);
	}
	
	/**
	 * Retrieves cookie that stores bookmarked players, retrieves their details from the database
	 * and returns an array of players.
	 */
	public function getBookmarkedPlayers()
	{
		$cookie_name = "bookmarked_players";
		$bookmarked = json_decode($_COOKIE[$cookie_name]);
		$bookmarkedPlayers = [];
		
		foreach ($bookmarked as $b)
		{
			array_push($bookmarkedPlayers, $this->getSpecificPlayerInformation($b));
		}
		
		return $bookmarkedPlayers;
	}
}
	
?>
