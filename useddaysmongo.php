<?php
	try 
	{
	$mdb = new MongoDB\Driver\Manager("mongodb://it635:it635@ds127101.mlab.com:27101/payroll");

	$command = new MongoDB\Driver\Command(['ping' => 1]);
	$mdb->executeCommand ('db', $command);
	$servers = $mdb->getServers();   
	$filter = array();
	$options = ['sort' => ['total' => -1]];
	$query = new MongoDB\Driver\Query($filter, $options);
	$results = $mdb->executeQuery("payroll.vacation", $query);

foreach ($results as $doc) {
	$employeeid = $doc->employeeid;
	$vacation_used = $doc->vacation_used;
	$sick_used = $doc->sick_used;
	$excused_used = $doc->excused_used;
	$total = $doc->total;	
	
echo "EmployeeID:".$employeeid.","."Vacation days used:".$vacation_used.","."Sick days used".$sick_used.","."Excused days used".$excused_used.","."Total days used:".$total;

echo"\r\n";
echo "\r\n";
	}
}
catch(exception $e)
{
print_r($e);
}
?>
