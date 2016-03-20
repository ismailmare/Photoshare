<?php
	$path='~imare';
	require_once "include/db.php";
	require_once "include/config.php";
	
	$newDB = new DB("hdc","hughboy69"); 
    $newDB->connect();
    //$newDB->executeStatement("INSERT into users values('ish','bish',NULL)");
?>
