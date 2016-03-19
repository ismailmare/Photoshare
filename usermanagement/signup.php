<?php 

    require_once "/../setup.php";
    
    session_start();

    $username = strtolower(processField($_POST["inputUser"]));
    $password = processField($_POST["inputPassword1"]);
    $firstname = strtolower(processField($_POST["inputFirstname"]));
    $lastname = strtolower(processField($_POST["inputLastname"]));
    $address = processField($_POST["inputAddress"]);
    $phone = processField($_POST["inputPhone"]);
    $email = processField($_POST["inputEmail"]);
    $password = processField($_POST["inputPassword1"]);
    
    $num = $newDB->executeStatement('Insert into users values (\''.$username.,.$password.,null)'\'');
    $num = $newDB->executeStatement('Insert into persons values(')



?>