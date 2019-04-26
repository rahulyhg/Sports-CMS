<?php
/**
 * tournamentPreProcess.php
 * 
 * The purpose of this script to create the input file for maple to 
 * calculate the new laws based upon the matched played in a tournament.
 * 
 * A file is created with the filename equal to the tournament id, a
 * system call is then made to add 'tournamentProcess.php' to the `at` 
 * queue. This will then run in turn and will actually update the laws.
 * By default user www-data is on the at.deny list. This user needs to be
 * removed from /etc/at.deny
 * 
 * Current implementation is based on hard coded data, this will need to
 * be changed to be implemented upon submission of a tournament. 
 * 
 */

//directory where all the files will be placed until processed.
//this directory must also contain tournamentProcess.php
$directory = "/tournamentFiles";

//hard coded data
$tournamentID = 12345;
$tournamentDate = "22/04/2019";

//open file and write pelimary data
$outFile = fopen($directory."/".$tournamentID,'w');
fwrite($outFile,$tournamentID."\n".$tournamentDate."\n");

//write match data
//count of matches
fwrite($outFile,'12'."\n");
//this would be done with a loop through a database record
fwrite($outFile,"543 4532 66\n544 1 12\n545 12 66\n546 66 12\n547 66 77\n548 398 44\n549 77 12\n550 44 398\n551 398 66\n552 1 4532\n553 44 12\n554 398 4532\n");


//write player data
//count of players
fwrite($outFile,'8'."\n");
//this would be done with a loop through a database record
fwrite($outFile,"1 880.85435 69.13605 26/03/2019\n44 281.39668 80.31928 31/03/2019\n66 874.60561 23.30786 09/11/2018\n398 849.57867 22.88779 13/11/2018\n4532 823.70217 25.70555 16/12/2018\n12 245.1333 127.52657 21/10/2018\n43 551.69361 17.19913 20/03/2019\n77 232.70962 60.96352 23/01/2019\n");

fclose($outFile);

//Add to the queue of tournamanets to be processed
chdir($directory);

exec(
		"echo \"php " . $directory . "/tournamentProcess.php " . $tournamentID . "\"".
		" | at -q T now"
	);

?>
