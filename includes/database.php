<?php

class Database
{
	public function __construct()
	{

	}

	public function connect()
	{
		$config = parse_ini_file("./configurations/config.ini");

		try
		{
			$dsn = "mysql:host=".$config["hostname"].";dbname=".$config["databaseName"].";charset=".$config["charset"];

			$connection = new PDO($dsn, $config["username"], $config["password"]);
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $connection;
		}
		catch(PDOException $exception)
		{
			echo "Database connection failed. Contact the server administrator";
		}
	}

	public function query($query, $parameters = NULL)
	{
		$statement = $this->$connection->prepare($query);
		$statement->execute($parameters);
		return $statement;
	}
}	

?>