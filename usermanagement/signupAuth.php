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
    $password = ($_POST["inputPassword1"]);
   
    $num = $newDB->executeStatement('SELECT user_name FROM users WHERE user_name =\''.$username.'\'');

    if($num[0]) {
    
     $_SESSION['autherror'] = true;
     header("Location: signup.php");  
    }
    else {
        $num1 = $newDB->executeStatement1('Insert into users values (\''.$username.'\',\''.$password.'\',\'NULL)');
        $num2 = $newDB->executeStatement1('Insert into persons values(\''.$username.'\',\''.$firstname.'\',\''.$lastname.'\',\''.$address.'\',\''.$email.'\',\''.$phone.'\')');

        $_SESSION['user_name'] = $username;
        header("Location: ../header.php");
        exit;
    }
    
?>
