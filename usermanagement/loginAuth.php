<?php 

    require_once "../setup.php";
     
    session_start();
    $username = strtolower($_POST["inputUser"]);
    $password = ($_POST["inputPassword"]);
    $num = $newDB->executeStatement('SELECT user_name FROM users WHERE user_name =\''.$username.'\' AND password =\''.$password.'\'');
    
    if($num[0]) {
	$_SESSION['user_name'] = $username;
        header("Location: ../header.php");
        exit;
	}
    else {
        $_SESSION['autherror'] = true;
        header("Location: login.php");
	}
?>

