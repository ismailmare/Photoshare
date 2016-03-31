<?php
require_once "../setup.php";

session_start();
$username = $_SESSION['user'];
$firstname = strtolower($_POST["inputFirstname"]);
$lastname = strtolower($_POST["inputLastname"]);
$address = ($_POST["inputAddress"]);
$phone = ($_POST["inputPhone"]);
$email = ($_POST["inputEmail"]);
    
	$sql1 = 'UPDATE persons SET first_name = \''.$firstname.'\', last_name = \''.$lastname.'\', address = \''.$address.'\', phone = \''.$phone.'\', email= \''.$email.'\' WHERE user_name = \''.$username.'\'';
   
    //$stid = oci_parse($newDB->getConnection(), $sql1);
 
    //oci_bind_by_name($stid, ':firstname', $firstname);
    //oci_bind_by_name($stid, ':lastname', $lastname);
    //oci_bind_by_name($stid, ':address', $address);
    //oci_bind_by_name($stid, ':phone', $phone);
    //oci_bind_by_name($stid, ':email', $email);
    //oci_bind_by_name($stid, ':Username', $username);

    $newDB->executeStatement($sql1);
    //$res = oci_execute($stid, OCI_COMMIT_ON_SUCCESS); 
    
    //oci_free_statement($stid);	
    header("Location: ../profile.php");
    $_SESSION['success']='updated';
    exit();


?>
