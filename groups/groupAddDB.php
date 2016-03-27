<?php

	require_once "../setup.php";
	session_start();

	$user = $_SESSION['user'];
	$group_name = strtolower($_POST["group_name"]);
	
	
	$num = $newDB->executeStatement('SELECT group_name FROM groups WHERE group_name =\''.$group_name.'\' AND user_name =\''.$user.'\'');

	if($num[0]) {

	        $_SESSION['autherror'] = 'groupnametaken';
      	  	header("Location: groupAdd.php");
        	exit();
    	}
    	else {
		$group_id = rand();
        	$sql = 'Insert into groups values (\''.$group_id.'\',\''.$user.'\',\''.$group_name.'\',SYSDATE)';
        	$newDB->executeStatementAlt($sql);
        	header("Location: groups.php");
        	exit();
    	}

	

?>


