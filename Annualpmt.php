#!/usr/bin/php
<?php

$PayrollEmpID = $argv[1];

$db = new mysqli('localhost','root','it635','Payroll');
if ($db->connect_errno > 0)
{
   echo __FILE__.":".__LINE__.": failed to connect to db, re: $db->connect_error".PHP_EOL;
   exit(0);
}

echo "attempting to execute this SQL:".PHP_EOL;
$sql = "Select PayrollEmpID AS EmployeeNumber, Gross_Amt AS AnnualGrossPay, Net_Pay AS AnnualNetPay from EmployeePayroll WHERE PayrollEmpID = '$PayrollEmpID'".PHP_EOL;
$results = $db->query($sql);
while ($obj = $results->fetch_object())
{
    print_r($obj);
}
$db->close();
echo "Connection to DB successful".PHP_EOL;

?>
