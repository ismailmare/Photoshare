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
    //oci_bind_by_name($stid, ':firstname', $firstname);
    //oci_bind_by_name($stid, ':lastname', $lastname);
    //oci_bind_by_name($stid, ':address', $address);
    //oci_bind_by_name($stid, ':phone', $phone);
    //oci_bind_by_name($stid, ':email', $email);
    //oci_bind_by_name($stid, ':Username', $username);

//    $sql = oci_parse($newDB->getConnection(), $sql1);
//    oci_execute($sql,OCI_COMMIT_ON_SUCCESS);
//    oci_free_statement($sql); 

    $newDB->executeStatement($sql1);    
    //oci_free_statement($stid);
    $_SESSION['success'] = 'passchanged';	
    header("Location: ../profile.php");
    }

?>
