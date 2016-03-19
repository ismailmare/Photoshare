<?php 

    require_once "/../setup.php";
	
	$newDB = new DB("hdc","hughboy69"); 
    $newDB->connect();
    
    session_start();
    $username = strtolower(processField($_POST["inputUser"]));
    $password = processField($_POST["inputPassword1"]);
    $num = $newDB->executeStatement('SELECT user_name FROM users WHERE user_name =\''.$username.'\' AND u.password =\''.$password.'\'');
    
    if($num[0]) {
		$_SESSION['user_name'] = $username;
        header("Location: /../home.php");
        exit;
	}
	else {
		echo json_encode(array('status'=>false,'message'=>'Invalid username/password please re-enter and try again'));
        header("Location: /../index.php");
        exit;
		
	}
?>