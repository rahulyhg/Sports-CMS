<?php
    require("./includes/initialize.php");

    $result = $account->emailExists($_POST["email"]);

	if($result)
	{
		echo "true";
	}

	unset($_POST["email"]);
	$account = null;
?>