

<?php
	require_once "../setup.php";
	
	session_start();
	$user = $_SESSION['user'];
        $fromDate = ($_POST["fromDate"]);
	$toDate = ($_POST["toDate"]);
	$keywords = ($_POST["keywords"]);

	
	list($y, $m, $d) = explode('-', $toDate);
	list($y, $m, $d) = explode('-', $fromDate);
	if(checkdate($m, $d, $y)){
  	/*
   	is valid
  	*/
}




