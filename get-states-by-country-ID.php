<?php
    require("./includes/initialize.php");
	
	$result = $contentManager->getStatesByCountry($_POST["countryID"]);
	
	echo json_encode($result->fetchAll());
?>
