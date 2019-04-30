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
}

?>