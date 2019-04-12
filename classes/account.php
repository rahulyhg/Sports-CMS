<?php

class Account
{
	private $database;

	public function __construct($database)
	{
		$this->database = $database;
	}

	public function register()
	{

	}

	public function getAllPlayers()
	{
		$query = "SELECT * FROM player";
		$statement = $this->database->query($query, null);

		return $statement;
	}
}

?>