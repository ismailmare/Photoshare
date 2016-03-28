

<?php

	session_start();
	require_once('../setup.php');

	$user = $_SESSION['user'];
    $s_date = $_POST['date'];
	$f_date = $_POST['date2'];
	$order = $_POST['searchby'];
	$keywords = ($_POST['keywords']);
	$keywords = str_replace(' ','|',$_POST['keywords']);
	echo $keywords;
	echo $f_date;
	if((!empty($s_date) and !empty($f_date)) or !empty($keywords)){
		
		
		
		$conditions = '';
		
		if(!empty($keywords)) {
			$conditions .= ' (';
			$conditions .= " (i.subject LIKE '%$keywords%')";
			$conditions .= " OR (i.place LIKE '%$keywords%')";
			$conditions .= " OR (i.description LIKE '%$keywords%')";
			/*$conditions .= ' (contains('.$keywords.', i.subject) > 0)';
			$conditions .= ' OR (contains('.$keywords.'i.place) > 0)';
			$conditions .= ' OR (contains('.$keywords.'i.description) > 0)';
			/*$conditions .= ' (contains(i.subject,'.$keywords.') > 0)';
			$conditions .= ' OR (contains(i.place,'.$keywords.') > 0)';
			$conditions .= ' OR (contains(i.description,'.$keywords.') > 0)';*/
			$conditions .= ')';
		}
		
		if((!empty($f_date) and !empty($s_date)) and !empty($keywords)) {
			$conditions .= ' AND (i.timing BETWEEN TO_DATE(\''.$s_date.'\', \'YYYY-MM-DD\') AND TO_DATE(\''.$f_date.'\', \'YYYY-MM-DD\'))';
		}
		elseif((!empty($f_date) and !empty($s_date)) and empty($keywords)){
			$conditions .= ' (i.timing BETWEEN TO_DATE(\''.$s_date.'\', \'YYYY-MM-DD\') AND TO_DATE(\''.$f_date.'\', \'YYYY-MM-DD\'))';
		}
		
		if($order == 'default' and !empty($keywords)) {
			$conditions .= ' ORDER BY (RANK() OVER (ORDER BY(6*(SCORE(1)+SCORE(2)) + 3*SCORE(3) + SCORE(4)))) DESC';
		}
		else if($order == 'Most-Recent') {
			$conditions .= ' ORDER BY i.timing DESC';
			
		}
		else {
			$conditions .= ' ORDER BY i.timing ASC';
		}
		
		$sql = 'SELECT i.photo_id
		FROM images i WHERE'.$conditions;
		
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





