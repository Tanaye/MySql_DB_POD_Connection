<?php
require_once("config/config.php");

class Database{
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PWD;
	private $dbname = DB_NAME;

	private $connection;
	private $error;
	private $stmt;
	private $dbconnected = false;

	function __construct()
	{
		//Set PDO Connection
		$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;

		$options = array(
							PDO::ATTR_PERSISTENT => true,
							PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
						);
		try
		{
			$this->connection = new PDO($dsn, $this->user, $this->pass, $options);
			$this->dbconnected = true;
		}
		catch(PDOException $e)
		{
			$this->error = "Connection failed: " . $e->getMessage().PHP_EOL;
			$this->dbconnected = false;
		}
	}

	function __destruct()
	{
		
		//Close the Connection......
		$this->connection = null;
	}

	function getError()
	{
		return $this->error;
	}

	function isConnected()
	{
		return $this->dbconnected;
	}

	//Prepare Statement with Query

	function query($query)
	{
		$this->stmt = $this->connection->prepare($query);
	}

	//Execute the Prepare Statement

	function execute()
	{
		return $this->stmt->execute();
	}

	//Get result set as Array of Objects

	function resultSet()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	//Get Record Row Count

	function rowCount()
	{
		return $this->stmt->rowCount();
	}

	//Get Single Record as Object

	function single()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

	function bind($param, $value, $type = null)
	{

		if(is_null($type)){

			 switch(true){
			 	case is_int($value):
			 		$type = PDO::PARAM_INT;
			 		break;
			 	case is_bool($value):
			 		$type = PDO::PARAM_BOOL;
			 		break;
			 	case is_null($value):
			 		$type = PDO::PARAM_NULL;
			 		break;
			 	default:
			 		$type = PDO::PARAM_STR;
			 }

		}

		$this->stmt->bindValue($param, $value, $type);
	}


}