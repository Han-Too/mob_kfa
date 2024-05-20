<?php 
if(!isset($db)){
	$host			= 'localhost';
	$dbUsername		= 'czkfa_user';
	$dbPassword		= 'Pass#123!!!';
	$dbName			= 'mob_cashlez';

	$db = new mysqli($host, $dbUsername, $dbPassword, $dbName);

	if($db->connect_errno){

		die("We're Sorry. We are under Maintenance within 3 hours. Thank You");

		exit();

	}

}

?>