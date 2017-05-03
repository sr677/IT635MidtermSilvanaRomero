#!/usr/bin/php
<?php
$servername = "localhost";
$username = "root";
$password = "it635";
$dbname = "Payroll";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$hrpaidEmpId=  $argv[1];

$sql = "UPDATE hours_worked SET Total_hours= '8' WHERE Total_hours = 0 AND hrpaidEmpId= '$hrpaidEmpId'";

if ($conn->query($sql) == TRUE) 
{
    echo "Record updated successfully Affected rows: " . mysqli_affected_rows($conn);
} 
else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
