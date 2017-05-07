<?php
	try 
	{
	$mdb = new MongoDB\Driver\Manager("mongodb://it635:it635@ds127101.mlab.com:27101/payroll");

	$command = new MongoDB\Driver\Command(['ping' => 1]);
	$mdb->executeCommand ('db', $command);
	$servers = $mdb->getServers();
	print_r($servers);   
	$filter = array();
	$options = ['sort' => ['total' => 1]];
	$query = new MongoDB\Driver\Query($filter);
	$results = $mdb->executeQuery("payroll.vacation", $query);
	print_r($results->toArray());
	
}
catch(exception $e)
{
	print_r($e);
}
?>



