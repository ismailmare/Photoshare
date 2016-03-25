<?php

        require_once "../setup.php";
        session_start();

        $user = $_SESSION['user'];
        $group_name = strtolower($_POST["group_name"]);
	$friend = strtolower($_POST["user_name"]);
	$notice = $_POST["notice"];

        $num = $newDB->executeStatement('SELECT group_id FROM groups WHERE group_name =\''.$group_name.'\' AND user_name =\''.$user.'\'');
	$num1 = $newDB->executeStatement('SELECT user_name FROM users WHERE user_name =\''.$friend.'\'');
	
	$group_id = $num['GROUP_ID'];



        if($num[0] && $num1[0]) {
                
		$sql = 'Insert into group_lists values (\''.$group_id.'\',\''.$friend.'\',SYSDATE,\''.$notice.'\')';
                $newDB->executeStatementAlt($sql);
                header("Location: friendsAdd.php");
		$_SESSION['added'] = 'added';
                exit();

	}
        else {

		$_SESSION['autherror'] = 'error';
                header("Location: friendsAdd.php");
                exit();

	}



?>

