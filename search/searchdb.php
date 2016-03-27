

<?php
	require_once "../setup.php";
	
	session_start();
	$user = $_SESSION['user'];
    $fromDate = ($_POST["fromDate"]);
	$toDate = ($_POST["toDate"]);
	$keywords = ($_POST["keywords"]);

	list($fm, $fd, $fy) = explode('-', $fromDate);
	list($tm, $td, $ty) = explode('-', $toDate);
	if(checkdate($fm, $fd, $fy) && checkdate($tm, $td, $ty)){
		
  	/*
   	is valid
  	*/
}




