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
   
    $newDB->executeStatement($sql1);	
    header("Location: ../profile.php");
    $_SESSION['success']='updated';
    exit();


?>
