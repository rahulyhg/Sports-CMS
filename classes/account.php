<?php

class Account
{
	private $database;

	private $accountId;
	private $loggedIn = false;

	public function __construct($database)
	{
		$this->database = $database;
		
		session_start();

		if(isset($_SESSION["accountId"]))
		{
			$this->accountId = $_SESSION["accountId"];
			$this->loggedIn = true;
		}
	}


	public function register($givenName, $familyName, $organisation, $email, $password)
	{
		$filteredGivenName = trim($givenName);
		$filteredFamilyName = trim($familyName);
		$filteredClub = trim($club);
		$filteredEmail = trim($email);
		$filteredPassword = trim($password);

		$filteredGivenName = ucfirst($filteredGivenName);
		$filteredFamilyName = ucfirst($filteredFamilyName);
		$filteredOrganisation = ucwords($filteredOrganisation);
		$filteredEmail = strtolower($filteredEmail);

		$hashedPassword = password_hash($filteredPassword, PASSWORD_DEFAULT);

		$query = "INSERT INTO account (given_name, family_name, organisation, email, password) VALUES (?, ?, ?, ?, ?)";
		$result = $this->database->query($query, [$filteredGivenName, $filteredFamilyName, $filteredOrganisation, $filteredEmail, $hashedPassword]);
	}


	public function login($email, $password)
	{
		$filteredEmail = trim($email);
		$filteredPassword = trim($password);

		$filteredEmail = strtolower($filteredEmail);

		if($this->accountIsAuthenticated($filteredEmail, $filteredPassword))
		{
			$isActive = $this->getActiveState($email);
			
			if($isActive["active"] == "Y")
			{
				$query = "SELECT account_id FROM account WHERE email = ?";
				$result = $this->database->query($query, [$filteredEmail])->fetch();

				$_SESSION["accountId"] = $result["account_id"];
				$this->accountId = $result["account_id"];
				$this->loggedIn = true;

				//redirect("./profile.php"); //Account page once made
			}
			else
			{
				echo "Account is not Active.";
				//TODO
			}
		}
		else
		{
			echo "Username or Password is incorrect";
			//TODO
		}
	}


	public function logout()
	{
		unset($this->userId);
		$this->loggedIn = false;

		$_SESSION = array();
		session_destroy();
	}


	public function accountIsAuthenticated($email, $password)
	{
		$authenticated = false;

		$query = "SELECT email, password FROM account WHERE email = ? LIMIT 1";
		$result = $this->database->query($query, [$email])->fetch();

		if(password_verify($password, $result["password"]))
		{
			$authenticated = true;
		}

		return $authenticated;
	}


	public function isLoggedIn()
	{
		return $this->loggedIn;
	}


	public function getAccessLevel()
	{
		$query = "SELECT access_level FROM account WHERE account_id = ?";
		$result = $this->database->query($query, [$this->accountId])->fetch();

		return $result;
	}


	public function setAccessLevel($email, $access)
	{
			$query = "UPDATE account SET access_level = ? WHERE email = ?";
			$result = $this->database->query($query, [$access_level, $email]);	
	}


	public function getActiveState($email)
	{
		$query = "SELECT active FROM account WHERE email = ?";
		$result = $this->database->query($query, [$email])->fetch();

		return $result;
	}


	public function setActiveState($email, $state)
	{
		$query = "UPDATE account SET active = ? WHERE email = ?";
		$result = $this->database->query($query, [$state, $email]);		
	}

	public function emailExists($email)
	{
		//$filteredEmail = strtolower($email);

		$query = "SELECT email FROM account WHERE email = ?";
		$result = $this->database->query($query, [$email]);

		return ($result->rowCount() > 0);	
	}
}

?>