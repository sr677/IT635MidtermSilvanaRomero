#!/usr/bin/php
<?php
$db = new mysqli('localhost','root','it635','Payroll');
if ($db->connect_errno > 0)
{
   echo __FILE__.":".__LINE__.": failed to connect to db, re: $db->connect_error".PHP_EOL;
   exit(0);
}
{
echo"executing script: ".$argv[0].PHP_EOL;
$EmployeeID = $argv[1];
$Vacation_used = $argv[2];
$Sick_used = $argv[3];
$Excused_used = $argv[4];
$Total_days = $argv[5];
}

if($argv[5] <= 10){
echo "Processing days request.".PHP_EOL;
$insertString = "insert into daysused (EmployeeID, Vacation_used, Sick_used, Excused_used,Total_days) values ('$EmployeeID', '$Vacation_used', '$Sick_used', '$Excused_used','$Total_days');";
$results = $db->query($insertString);
$queryString = "select * from daysused where EmployeeID='$EmployeeID';";
$results = $db->query($queryString);
}else {
echo "Error!! You cannot take more than 10 days. We are a cheap company".PHP_EOL;
}

$db->close();
echo "Connection to DB successful".PHP_EOL;
?>
