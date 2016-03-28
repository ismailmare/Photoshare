<?php

session_start();
require_once('../setup.php');

$user = $_SESSION['user'];
$start_date = $_POST['date'];
$end_date = $_POST['date2'];
$order = $_POST['searchby'];
$keywords = ($_POST['keywords']);
$keywords = str_replace(' ','|',$_POST['keywords']);
//echo $keywords;
//echo $end_date;
if((!empty($start_date) && !empty($end_date)) || !empty($keywords)){	
	
	// If the user has enter entered keywords
	$seach_cond = '';
	if(!empty($keywords)) {
		$seach_cond .= ' AND( (contains(i.subject, \''.$keywords.'\', 1) > 0) 
						 AND (contains(i.place, \''.$keywords.'\', 2) > 0)
						 AND (contains (i.description, \''.$keywords.'\', 3) > 0) )';
		/*$seach_cond .= " (i.subject LIKE '%$keywords%')";
		$seach_cond .= " OR (i.place LIKE '%$keywords%')";
		$seach_cond .= " OR (i.description LIKE '%$keywords%')";
		$seach_cond .= ' (contains('.$keywords.', i.subject) > 0)';
		$seach_cond .= ' OR (contains('.$keywords.'i.place) > 0)';
		$seach_cond .= ' OR (contains('.$keywords.'i.description) > 0)';
		$seach_cond .= ' (contains(i.subject,'.$keywords.') > 0)';
		$seach_cond .= ' OR (contains(i.place,'.$keywords.') > 0)';
		$seach_cond .= ' OR (contains(i.description,'.$keywords.') > 0)';*/
		$seach_cond .= ')';
	}
	
	// If the user has entered a date time frame
	if((!empty($end_date) && !empty($start_date))) {
		$seach_cond .= ' AND (i.timing BETWEEN TO_DATE(\''.$start_date.'\', \'YYYY-MM-DD\') AND TO_DATE(\''.$end_date.'\', \'YYYY-MM-DD\'))';
	}
	/*
	elseif((!empty($end_date) and !empty($start_date)) and empty($keywords)){
		$seach_cond .= ' AND (i.timing BETWEEN TO_DATE(\''.$start_date.'\', \'YYYY-MM-DD\') AND TO_DATE(\''.$end_date.'\', \'YYYY-MM-DD\'))';
	} */
	
	if($order == 'default' and !empty($keywords)) {
		$seach_cond .= ' ORDER BY (RANK() OVER (ORDER BY(6*(SCORE(1)+SCORE(2)) + 3*SCORE(3) + SCORE(4)))) DESC';
	}
	else if($order == 'Most-Recent') {
		$seach_cond .= ' ORDER BY i.timing DESC';
		
	}
	else {
		$seach_cond .= ' ORDER BY i.timing ASC';
	}
	
	$sql = 'SELECT i.photo_id
	FROM images i WHERE'.$seach_cond;
	
	$resultArray = $newDB->executeStatementAlt($sql);
	echo json_encode(array('status'=>true,$resultArray[0],$resultArray[1]));
}
else{
	echo json_encode(array('status'=>false,'message'=>'Please enter a search field'));
}

/*list($fm, $fd, $fy) = explode('-', $fromDate);
list($tm, $td, $ty) = explode('-', $toDate);
if(checkdate($fm, $fd, $fy) && checkdate($tm, $td, $ty)){*/
	
	/*
	is valid
	*/
 ?>

