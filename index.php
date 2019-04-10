<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<body>

<?php

include_once './includes/database.php';
include_once './includes/functions.php';


$object = new Query();
$output = $object->getAllPlayers();

while($row = $output->fetch())
{
	echo $row["player_id"]. "    ".$row["given_name"];
}

?>


</body>
</html>
