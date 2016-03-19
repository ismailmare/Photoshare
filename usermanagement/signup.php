<?php 
    $sql = 'INSERT INTO Students VALUES(\''.$ccid.'\', \''.$name.'\')'; //Prepare sql using conn and returns the statement identifier $stid = oci_parse($conn, $sql );
//Execute a statement returned from oci_parse() $res=oci_execute($stid);
//if error, retrieve the error using the oci_error() function & output an error
    // if (!$res) {
    //     $err = oci_error($stid);
    //     echo htmlentities($err['message']);
    // } else 
    //     { echo ‘Row inserted‘; 
    // } } 
        
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
    
    $num = $newDB->executeStatement('Insert into users values (\''.$username.'\',\''.$password.'\',\'NULL)');
    $num = $newDB->executeStatement('Insert into persons values(\''.$username.'\',\''.$firstname.'\',\''.$lastname.'\',\''.$address.'\',\''.$email.'\',\''.$phone.'\')');
    
    $_SESSION['user_name'] = $username;
    header("Location: /../home.php");
    exit;
	

?>