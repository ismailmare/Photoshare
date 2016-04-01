<?php
/**
    * Defines functionality for dealing with database.
    * The DB class will act as an object that can be instantiated
    * and provides all the methods necessary for interacting with the
    * the oracle database (connect, update, insert, delete, etc.)
    *
    * @date March 13, 2016
    *
    */
    
class DB{
    private $username;
    private $password;
    private $db_conn_string; // the database connection string "host:port/sid"
    private $conn; // the connection the oracle database
    
    function __construct($user, $pass){
        $this->username = $user;
        $this->password = $pass;
        $this->db_conn_string = "gwynne.cs.ualberta.ca:1521/CRS";
    }
    
    public function connect(){
        $this->conn = oci_new_connect($this->username, $this->password, $this->db_conn_string);        
        if(!$this->conn){
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
    }
    
    public function getConnection(){
        return $this->conn;
    }

    public function disconnect(){
        oci_close($this->conn);
    }
    
    // For now just executes generic statement, but might add more functions for specific
    // statement (i.e, insert, update, delete)
    public function executeStatement($sql_statement){

        //Prepare sql using conn and returns the statement identifier
	    $stid = oci_parse($this->conn, $sql_statement);

	    //Execute a statement returned from oci_parse()
	    $res = oci_execute($stid, OCI_COMMIT_ON_SUCCESS);
        
        //if error, retrieve the error using the oci_error() function & output an error message
	    if (!$res) {
            $err = oci_error($stid); 
            echo htmlentities($err['message']);
	    }
	    else {

            // Fetch the results
            $data = oci_fetch_array($stid, OCI_BOTH);

            // Free all resources associated with the oracle statement/cursor 
            oci_free_statement($stid);
            return $data;
        }
    }
	
    
    public function executeStatementAlt($sql_statement){
	
	    //Prepare sql using conn and returns the statement identifier
        $stid = oci_parse($this->conn, $sql_statement);

        //Execute a statement returned from oci_parse()
        $res = oci_execute($stid);

        //if error, retrieve the error using the oci_error() function & output an error message
        if (!$res) {
            $err = oci_error($stid);
            echo htmlentities($err['message']);
        }
        else {

            // Fetch ALL results
            $data = oci_fetch_all($stid, $res, null, null,  OCI_FETCHSTATEMENT_BY_ROW + OCI_NUM);

            // Free all resources associated with the oracle statement/cursor        
            oci_free_statement($stid);

            return $res;
        }
	}
    
};
?>
