<!Doctype html>
<?php
	require_once "include/db.php";
	require_once "include/config.php";
	
	$newDB = new DB($config['db']['host'],$config['db']['port'],$config['db']['SID'],"hdc","hughboy69"); 
        $newDB->connect();
        $newDB->executeStatment("INSERT into users values('ish','bish',NULL)");
?>
#Here we set up the database with tables
#Load into browser first thing
