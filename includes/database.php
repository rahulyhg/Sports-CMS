<?php

class Database
{
	public function connect()
	{
		$config = parse_ini_file("$path/configurations/config.ini");

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
}	

?>