<?php 
require_once "../setup.php";
 
session_start();
$username = strtolower($_POST["inputUser"]);
$password = ($_POST["inputPassword"]);
$num = $newDB->executeStatement('SELECT user_name FROM users WHERE user_name =\''.$username.'\' AND password =\''.$password.'\'');
$admin=$newDB->executeStatement('SELECT user_name FROM admin WHERE user_name =\''.$username.'\' AND password =\''.$password.'\'');

if($admin[0]){
    $_SESSION['admin'] = $username;
}

if($num[0]) {
    $_SESSION['user'] = $username;
    echo $_SESSION['user'];
    header("Location: ../profile.php");
    exit;
}
else {
    $_SESSION['autherror'] = true;
    header("Location: login.php");
    exit;
}
?>