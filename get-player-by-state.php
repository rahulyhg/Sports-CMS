<?php
require("./includes/initialize.php");

$result = $contentManager->getPlayersByNameAndState($_POST['name'],$_POST['state']);
$response = array();

while ($row = $result->fetch())
{
	$response[] = array("id"=>$row['player_id'],"label"=>$row['family_name'].", ".$row['given_name']);
}

echo json_encode($response);

?>
