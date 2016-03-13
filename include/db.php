<?php
/**
    * Defines functionality for dealing with database.
    * The DB class will act as an object that can be instantiated
    * and provides all the methods necessary for interacting with the
    * the oracle database (connect, update, insert, delete, etc.)
    *
    * @data March 13, 2016
    *
    */
    
class DB{
    private $username;
    private $password;
    private $db_conn_string; // the database connection string "host:port/sid"
    private $conn; // the connection the oracle database
    
    function __construct($host, $port, $sid, $user, $pass){
        $username = $user;
        $password = $pass;
        $db_conn_string = sprintf("%s:%d/%d",$host,$port,$sid);
    }
    
    public function connect(){
        $conn = oci_connect($username, $password, $db_conn_string);
        if(!$conn){
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
    }
    
    public function disconnect(){
        oci_close($conn);
    }
    
    // For now just executes generic statement, but might add more functions for specific
    // statement (i.e, insert, update, delete)
    public function executeStatment($sql_statement){
        //Prepare sql using conn and returns the statement identifier
	    $stid = oci_parse($conn, $sql_statement);
	    //Execute a statement returned from oci_parse()
	    $res=oci_execute($stid);
        
        //if error, retrieve the error using the oci_error() function & output an error message
	    if (!$res) {
            $err = oci_error($stid); 
            echo htmlentities($err['message']);
	    }
	    else{
            echo 'Row inserted';
	    }
	    
	    // Free all resources associated with the oracle statement/cursor
	    oci_free_statement($stid);
    }
};
?>