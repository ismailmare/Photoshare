<?php 
    function destroySession(){
	session_start();
        $_SESSION=array();
        if(session_id() != ""|| isset($_COOKIE[session_name()]))
            setcookie(session_name(), '', time()-2592000,'/');
          
        session_destroy();
    }
    
    function sanitizeString($var){
        global $connection;
        $var = strip_tags($var);
        $var = htmlentities($var);
        $var = stripslashes($var);
        return $connection->real_escape_string($var);
    }
?>
