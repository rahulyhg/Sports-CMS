<?php

require("./includes/initialize.php");

$playerName = $_POST["player-name"];
$clubName = $_POST["club-name"];
//$country = $_POST["country-name"];
//$state = $_POST["state-name"];
//$year = $_POST["year"];
//$month = $_POST["month"];
//$day = $_POST["day"];
//$recentMatch = $_POST["recent-match"];
//$recentCompetitor = $_POST["recent-competitor"];

if(isset($_POST["submit-search-filter"]))
{	
	$query = "SELECT CONCAT_WS(' ', player.given_name, player.family_name) AS player, club.name FROM player JOIN membership ON player.player_id = membership.player_id JOIN club ON membership.club_id = club.club_id WHERE CONCAT_WS(' ', player.given_name, player.family_name) LIKE '%$playerName%' AND club.name LIKE '%$clubName%'";
	$result = $database->query($query, [$playerName, $clubName]);

	$playerArray = array();
	$clubArray = array();

	while($row = $result->fetch(PDO::FETCH_ASSOC))
	{
		array_push($playerArray, $row["player"]);
		array_push($clubArray, $row["name"]);
	}

	$_SESSION["player-name"] = $playerArray;
	$_SESSION["club"] = $clubArray;
}

redirect("players.php");

?>