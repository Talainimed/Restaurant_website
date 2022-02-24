<?php 

class Connection
{

	public function __Construct()
	{
	}

	public function connect()
	{
		$con = new PDO('mysql:host=localhost;port=3306;dbname=restaurant', 'root', '');
		return $con;
	}
}
?>