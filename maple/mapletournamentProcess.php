<?php
/**
 * tournamentProcess.php
 * 
 * The purpose of this script to to run maple to calculate the updated laws for a
 * given tournamanet. In future versions the database will be updated to represent
 * the new laws as caluclated. 
 * 
 * It is worth noting that this php file will be run from the
 * command line. It will need to reside in the same folder as the input/output
 * files for maple.
 * 
 */

//requried as this script will be run from command line
define("WEB_ROOT", "../");

//work around to allow include from command line
$working_dir = getcwd();
chdir(WEB_ROOT);
require("./includes/initialize.php");
chdir($working_dir);


//Using the command line arguments rename the file so maple can open, run maple.
//uncoment when working
#rename($argv[1],'input_file');
#exec("/opt/maple2019/bin/maple ProcessTournament.mpl");

//open the processed file and get intial data.
$processedFile = fopen('output_file','r');
$tournamentID = fgets($processedFile);
$tournamentDate = fgets($processedFile);
$numMatches = fgets($processedFile);

$sportID = $contentManager->getEventSport($tournamentID);

//loop through each match, read data from file and update database
for ($i=0;$i<$numMatches;$i++)
{
	$str = fgets($processedFile);
	sscanf($str,"%s%s%f%f%s%f%f", $matchID, $winnerID, $winnerNewMean, $winnerNewSD, $loserID, $loserNewMean, $loserNewSD);
	
	//update database to reflect newly calculated changes
	$contentManager->updateAfterMatchStatisticComputed($tournamentDate, $sportID, $matchID, $winnerID, $winnerNewMean, $winnerNewSD, $loserID, $loserNewMean, $loserNewSD);
}

//tidy up and delete files no longer needed. 
fclose($processedFile);
#remove comment later
#unlink('output_file');

?>
