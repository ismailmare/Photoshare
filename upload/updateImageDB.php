<?php
/* This file does the updating of the descriptive information for an image
in the database.
*/

session_start();
require("../setup.php");

// Get the descriptive information
$subject = $_POST['subject'];
$place = $_POST['place'];
$date = $_POST['image_date'];
$description = $_POST['description'];
if(strtolower($_POST['permission']) == 'public'){
	$groupID = "1";
}
else if(strtolower($_POST['permission']) == 'private'){
	$groupID = "2";
}
else{
	$groupID = $_POST['groupID'];			
}

// Update all the images selected by the user
if(isset($_POST['check_list1'])) {
		foreach($_POST['check_list1'] as $check) { 
		updateImage($newDB, $check, $subject, $place, $date, $description, $groupID);
	}
}
else{
	$_SESSION['autherror'] = 'notchecked';
	header("Location: ../display/update.php");
	exit();
}
$_SESSION['check_list1']='';
$_SESSION['success']= 'successupdate';
header("Location: ../display/display.php");
$newDB->disconnect();
exit();

// Update the database record for the image with the new descriptive information
function updateImage($db, $photo_id, $subject, $place, $date, $description, $groupID){

	$sql = 'UPDATE images SET permitted = :permitted, subject = :subject, place = :place, timing = TO_DATE(:datetime, \'MM/DD/YYYY\'), description = :description WHERE photo_id = :image_id';

	$stid = oci_parse($db->getConnection(), $sql);

	oci_bind_by_name($stid, ':permitted', $groupID);
	oci_bind_by_name($stid, ':subject', $subject);
	oci_bind_by_name($stid, ':place', $place);
	oci_bind_by_name($stid, ':datetime', $date);
	oci_bind_by_name($stid, ':description', $description);
	oci_bind_by_name($stid, ':image_id', $photo_id);

	$res = oci_execute($stid, OCI_COMMIT_ON_SUCCESS);

	//if error, retrieve the error using the oci_error() function & output an error message
	if (!$res) {
		$err = oci_error($stid);
		echo htmlentities($err['message']);
	}

	oci_free_statement($stid);

}
?>
