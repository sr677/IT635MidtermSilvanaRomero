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
$PayrollEmpID = $argv[1];
$Gross_Amt = $argv[2];
$Taxwithholding = $argv[3];
$Benefits_Cost = $argv[4];
$Net_Pay = $argv[5];
}

echo "insert record attempt: ".PHP_EOL;
$insertString = "insert into EmployeePayroll(PayrollEmpID, Gross_Amt, Taxwithholding, Benefits_Cost, Net_Pay) values ('$PayrollEmpID', '$Gross_Amt', '$Taxwithholding', '$Benefits_Cost', '$Net_Pay');";
echo "attempting script:".PHP_EOL;
echo $insertString.PHP_EOL;
$results = $db->query($insertString);
$queryString = "select * from EmployeePayroll;";
$results = $db->query($queryString);
print_r($results);
while ($row = $results->fetch_object())
{
    print_r($row);
}
$db->close();
echo "Connection to DB successful".PHP_EOL;
?>
