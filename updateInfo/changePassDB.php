<?php
    require_once "../setup.php";

    session_start();
    $username = $_SESSION['user'];
    $pass1 = ($_POST["inputPass1"]);
    $pass2 = ($_POST["inputPass2"]);
    if($pass1 != $pass2){
    	$_SESSION['autherror'] = 'passwordNotMatch';
    	header("Location: changePass.php");
    	exit();
    }else{
    $sql1 = 'UPDATE users SET PASSWORD = \''.$pass2.'\' WHERE USER_NAME=\''.$username.'\'';

    if ($_SESSION['admin']=$username){
	$sql2 = 'UPDATE admin SET PASSWORD = \''.$pass2.'\' WHERE USER_NAME=\''.$username.'\'';
	$newDB->executeStatement($sql2);
    } 

    $newDB->executeStatement($sql1);    
    $_SESSION['success'] = 'passchanged';	
    header("Location: ../profile.php");
    }

?>
