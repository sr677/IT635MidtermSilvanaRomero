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
$Employee_Name = $argv[2];
$Dept_Code = $argv[3];
$Position_Code = $argv[4];
$Payment_Code = $argv[5];
}

echo "insert record attempt: ".PHP_EOL;
$insertString = "insert into Employees(EmployeeID, Employee_Name, Dept_Code, Position_Code, Payment_Code) values ('$EmployeeID', '$Employee_Name', '$Dept_Code', '$Position_Code', '$Payment_Code');";
echo "attempting script:".PHP_EOL;
echo $insertString.PHP_EOL;
$results = $db->query($insertString);
$queryString = "select * from Employees;";
$results = $db->query($queryString);
print_r($results);
while ($row = $results->fetch_object())
{
    print_r($row);
}
$db->close();
echo "Connection to DB successful".PHP_EOL;
?>
