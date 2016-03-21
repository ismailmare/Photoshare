<?php 
    require_once "../setup.php";

    session_start();
    $username = strtolower(($_POST["inputUser"]));
    $password = ($_POST["inputPassword1"]);
    $firstname = strtolower($_POST["inputFirstname"]);
    $lastname = strtolower($_POST["inputLastname"]);
    $address = ($_POST["inputAddress"]);
    $phone = ($_POST["inputPhone"]);
    $email = ($_POST["inputEmail"]);
    $passwordCon = ($_POST["inputPassword2"]);
   
    if($password != $passwordCon){
	$_SESSION['autherror'] = 'passwordNotMatch';
	header("Location: signup.php");
	exit;
    }

    $num = $newDB->executeStatement('SELECT user_name FROM users WHERE user_name =\''.$username.'\'');
    
    if($num[0]) {
    
     	$_SESSION['autherror'] = 'usernameTaken';
     	header("Location: signup.php");
     	exit(); 
    }
    else {
	$sql = 'Insert into users values (\''.$username.'\',\''.$password.'\', NULL)';
        $sql1 = 'Insert into persons values(\''.$username.'\',\''.$firstname.'\',\''.$lastname.'\',\''.$address.'\',\''.$email.'\',\''.$phone.'\')';
	$newDB->executeStatement($sql);
	$newDB->executeStatement($sql1);
        $_SESSION['user_name'] = $username;
        header("Location: ../profile.php");
        exit();
    }
    
?>
