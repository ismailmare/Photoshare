<?php
	require_once "include/db.php";
	require_once "include/config.php";
	
	$newDB = new DB("hdc","hughboy69"); 
    $newDB->connect();
    //$newDB->executeStatement("INSERT into users values('ish','bish',NULL)");
?>
#Here we set up the database with tables
#Load into browser first thing
