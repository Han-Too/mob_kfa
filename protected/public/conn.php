<?php 
if(!isset($db)){
	$host			= '127.0.0.1';
	$dbUsername		= 'czkfa_user';
	$dbPassword		= 'Pass#123!!!';
	$dbName			= 'mob_cashlez';

	$db = new mysqli($host, $dbUsername, $dbPassword, $dbName);

	if($db->connect_errno){
		var_dump($db->connect_error);
		var_dump($db);
		die("We're Sorry. We are under Maintenance within 3 hours. Thank You");
	
		exit();

	}

}

?>