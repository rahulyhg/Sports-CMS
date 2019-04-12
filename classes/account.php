<?php

class Account
{
	$database;

	public function __construct($database)
	{
		$this->$database = $database;
	}

	public function getAllPlayers()
	{
		$query = "SELECT * FROM player ORDER BY ASC";
		return $database->query($query, null);
	}
}

?>