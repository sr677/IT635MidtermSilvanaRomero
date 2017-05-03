#!/usr/bin/php
<?php
$db = new mysqli('localhost','root','it635','Payroll');
if ($db->connect_errno > 0)
{
   echo __FILE__.":".__LINE__.": failed to connect to db, re: $db->connect_error".PHP_EOL;
   exit(0);
}
echo "Enter username\r\n";
$Username =trim(fgets(STDIN));
echo "Enter password\r\n";
$password =trim(fgets(STDIN));
$hashpassword= hash('sha256', $password);
echo "\r\n";
echo "Checking credentials for: $Username".PHP_EOL;
$insertString = "SELECT * FROM Users WHERE Username='$Username' AND password='$hashpassword';";
$results = $db->query($insertString);
echo "\n";

if($hashpassword== "d6ae27b8754d7f24712aca0e0f8c0c61ec3fd905fb3382c9d5ecf3e1ab67658b"){
	echo "Authentication Successful!\r\n";
	echo "Welcome to The Chicago Police Payroll Database\r\n";

} else {
	echo "Authentication Failed. Access denied!! BOOOO!!\r\n";
}
$db->close();
?>
