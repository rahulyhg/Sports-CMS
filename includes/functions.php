<?php

class Query extends Database
{
	/* Account Queries */

	public function createAccount()
	{

	}


	public function deleteAccount()
	{

	}


	public function lockAccount()
	{

	}


	/* Player Queries */

	public function createPlayer()
	{

	}


	/* Search Queries */

	//Test query, will use prepared statements once other pages become available to edit.
	public function getAllPlayers()
	{
		$query = $this->connect()->query("SELECT * FROM player ORDER BY given_name ASC");

		return $query;
	}

}

?>