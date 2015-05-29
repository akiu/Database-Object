<?php


class Database {

public $host;
public $db;
public $username;
public $password;
public $conn;


public function __construct($host, $db, $username, $password)
{


	$this->host = $host;
	$this->db = $db;
	$this->username = $username;
	$this->password = $password;

	try
	{


		$this->conn = new PDO("mysql:host={$host}; dbname={$db}", $this->username, $this->password);

	}

		catch(PDOException $exception)
	{

			echo "Gagal terkoneksi" . $exception->getMessage();
	}

}

public function findOne($tableName, $key, $value)
{

	$query = "SELECT * FROM {$tableName} WHERE {$key} = {$value}";

	$stmt = $this->conn->query($query);

	$row = $stmt->fetchObject();

	return $row;



}

public function showAll($tableName, $field = array())
{

	$query = "SELECT * FROM {$tableName}";

	foreach ($this->conn->query($query) as $m)



			{

				for ($i = 0; $i < count($field); ++$i) {


					echo $m[$field[$i]] . "<br />";
				}


			}

}

/*try
	{


		$conn = new PDO("mysql:host={$host}; dbname={$bd}", $username, $password);

	}

catch(PDOException $exception)
{

	echo "Gagal terkoneksi" . $exception->getMessage();
} */
}

$database = new Database("localhost", "mydata", "akiu", "akiu");

$database->showAll("orang", $field = array("nama", "pekerjaan"));


?>