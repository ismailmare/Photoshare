<?php

session_start();
require_once('../setup.php');

$user = $_SESSION['user'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$order = $_POST['searchby'];
$keywords = $_POST['keywords'];
$keywords = str_replace(' ','&',$_POST['keywords']);
if((!empty($start_date) && !empty($end_date)) || !empty($keywords)){
	// If the user has enter entered keywords
	$search_cond = '';
	if(!empty($keywords)) {
		$search_cond .= '( contains(i.subject, \''.$keywords.'\', 1) > 0
						 OR contains(i.place, \''.$keywords.'\', 2) > 0
						 OR contains (i.description, \''.$keywords.'\', 3) > 0 )';
	}
	
	// If the user has entered a date time frame
	if((!empty($end_date) && !empty($start_date))) {
		if(!empty($keywords))
			$search_cond .= ' AND';
		$search_cond .= '(i.timing BETWEEN TO_DATE(\''.$start_date.'\', \'MM/DD/YYYY\') AND TO_DATE(\''.$end_date.'\', \'MM/DD/YYYY\'))';
	}

	// Conditions to check if the user has permission to view the image
	// Checks following conditions:
	// - if image is image is public, then user can view it
	// - if the image is private and the user is the owner, then the user can view it
	// - if the the user is part of a group with group_id == i.permitted, then the user can view it
	$search_cond .= 'AND ( (i.permitted = 1) 
					OR (i.permitted = 2 AND i.owner_name = \''.$user.'\')
					OR (i.permitted <> 1 AND i.permitted <> 2 AND i.permitted IN 
					(SELECT group_id FROM group_lists WHERE friend_id = \''.$user.'\')) )';
	
	// if the user has not specified an ordering to the search (DESC for highest rank first)
	if($order == 'default' and !empty($keywords)) {
		$search_cond .= ' ORDER BY (RANK() OVER (ORDER BY(6*SCORE(1)) + 3*SCORE(2) + SCORE(3))) DESC';
	}

	// most recent images first
	else if($order == 'most_recent') {
		$search_cond .= ' ORDER BY i.timing DESC';
		
	}

	// oldest images first
	else {
		$search_cond .= ' ORDER BY i.timing ASC';
	}

	$sql = 'SELECT i.photo_id
			FROM images i 
			WHERE '.$search_cond;

}

else{
	if($order == 'topfive'){
	$sql = 'SELECT image_id
			FROM (SELECT image_id, COUNT(*) AS views 
  				  FROM image_views
  				  GROUP BY image_id
                  ORDER BY views DESC)
			WHERE ROWNUM <= 5 AND image_id in (SELECT i.photo_id
												FROM images i
												WHERE ((i.permitted = 1)
													  OR (i.permitted = 2 AND i.owner_name = \''.$user.'\')
													  OR (i.permitted <> 1 AND i.permitted <> 2 AND i.permitted
													  IN (SELECT group_id FROM group_lists WHERE friend_id = \''.$user.'\')) ))';
	}
}


// Put the photo_ids into a one-dimensional array to be sent
// to the search result page
$resultArray = $newDB->executeStatementAlt($sql);
$photo_id_array = array();
foreach($resultArray as $key => $value){
	array_push($photo_id_array, $value[0]);
}

// If empty return to search page with warning of no results
if(!empty($photo_id_array)){
	$_SESSION['search_result'] = $photo_id_array;
	header("Location: searchResult.php");
}
// Otherwise, go to search result page with images
else{
	$_SESSION['search_result'] = "empty"; 
	header("Location: search.php");
}
?>