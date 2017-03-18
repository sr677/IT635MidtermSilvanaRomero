<?php
class EmployeeAccess
{
private $db;
public function __construct($database)
{
	$this->db = new mysqli("localhost","root","it635",$database);
	if ($this->db->connect_errno != 0)
	{
		echo "error connecting to databse: ".$this->db->connect_error.PHP_EOL;
		exit();
	}
}
public function __destruct()
{
	if (isset($this->db))
	{
		$this->db->close();
	}

}
public function validateUser($username,$password)
{
	$un = $this->db->real_escape_string($username);
	$pw = $this->db->real_escape_string($password);
	$query = "select * from Users where username = '$un';";
	$result = $this->db->query($query);
	while ($row = $result->fetch_assoc())
	{
		if ($row["password"] == $pw)
		{
			// I have a match
			return true;
		}
	}
	return false;
}

}
?>
