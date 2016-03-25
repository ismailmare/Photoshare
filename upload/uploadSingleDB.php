<?php
/*
This file does the insertion of the the image(s) uploaded by the user
into the database. It generates a unique photo ID for every image entered,
and then gets the user's name from the DB to insert it along with the other
descriptive photo information. The user can optionally enter descriptive
information for the image(s) uploaded (permitted -> default: private=2, 
subject, place, description -> default: NULL, date -> default: sysdate/current_date).
It will then create a resized smaller version of the image uploaded called a thumbnail
which will be used in the display module (SQL BLOB type). After this is all done
the photo is ready for insertion into the database.
*/
	session_start();
	require("../setup.php");

	// Generate a photo ID for the image
	$uniq_photo_id = rand();

	// Get all the current photo ID's that exist
	$photo_ids = $newDB->executeStatementAlt('SELECT DISTINCT(photo_id) FROM images');
	foreach($photo_ids as $each){
		$temp[] = $each['photo_id'];
	}
	
	// Check if the photo ID is unique
	if(!empty($temp)){
		$is_unique = false;
		while(!$is_unique){
			if(!in_array($uniq_photo_id, $temp)){
				$is_unique = true;
			}
			else{
				$uniq_photo_id = rand();	
			}
		}
	}

	// Get user information for entering the image into the database
	$username = $_SESSION['user'];

	// Get the descriptive information
	$subject = $_POST['subject'];
	$place = $_POST['place'];
	$date = $_POST['image_date'];
	$description = $_POST['description'];
	$groupID = $_POST['groupID'];
	$descriptive_info = array($subject, $place, $date, $description, $groupID);
	
	$valid_formats = array("jpg","gif");

	if(isset($_FILES['images'])){
		foreach($_FILES['images']['tmp_name'] as $key => $tmp_name){
			$file_name = $key.$_FILES['images']['name'][$key];
			$file_size = $_FILES['images']['size'][$key];
			$file_ext=strtolower(end(explode('.',$_FILES['image']['name'][$key])));
			if(in_array($file_ext, $valid_formats) == false){
				$errors[] = "Invalid Image Format";
			}

			// Get the resized thumbnail of the image
			$thumbnail_blob = makeThumb($_FILES['images']['tmp_name'][$key],$_FILES['images']['type'][$key]);

			// Insert the image into the database
			insertImage($newDB->getConnection(), $uniq_photo_id, $username, $descriptive_info, $thumbnail_blob, file_get_contents($_FILES['images']['tmp_name'][$key]));

		}
	}


	// Close this connection
	$newDB->disconnect();

	// This function inserts the image and it's descriptive information into the database
	function insertImage($conn, $photo_id, $owner_name, $descriptive_info, $thumbnail, $photo){
		$photo_blob = oci_new_descriptor($conn, OCI_D_LOB);
		$thumbnail_blob = oci_new_descriptor($conn, OCI_D_LOB);

		$subject = $descriptive_info[0];
		$place = $descriptive_info[1];
		$date_time = $descriptive_info[2];
		//$date_time = "to_date('".$descriptive_info[2]."', 'mm-dd-yyyy')";
		$description = $descriptive_info[3];
		$permitted = $descriptive_info[4];

		$sql = 'INSERT INTO images (photo_id, owner_name, permitted, subject, place,
			timing, description, thumbnail, photo) VALUES (:photoid, :ownername,
			:permitted, :subject, :place, TO_DATE(:datetime, \'MM-DD-YYYY\'), :description, empty_blob(),
			empty_blob()) returning thumbnail, photo into :thumbnail, :photo';

		$stid = oci_parse($conn, $sql);

		oci_bind_by_name($stid, ':photoid', $photo_id);
		oci_bind_by_name($stid, ':ownername', $owner_name);
		oci_bind_by_name($stid, ':permitted', $permitted);
		oci_bind_by_name($stid, ':subject', $subject);
		oci_bind_by_name($stid, ':place', $place);
		oci_bind_by_name($stid, ':datetime', $date_time);
		oci_bind_by_name($stid, ':description', $description);
		oci_bind_by_name($stid, ':thumbnail', $thumbnail_blob, -1, OCI_B_BLOB);
		oci_bind_by_name($stid, ':photo', $photo_blob, -1, OCI_B_BLOB);

		$res = oci_execute($stid, OCI_DEFAULT);

		if($thumbnail_blob->save($thumbnail) && $photo_blob->save($photo)) {
			oci_commit($conn);
		}
		else{
			oci_rollback($conn);
		}

		oci_free_statement($stid);

		$photo_blob->free();
		$thumbnail_blob->free();
	}
	
	function makeThumb($imagefile,$imageFormat){
		$image_info = getimagesize($imagefile);
		$image_width = $image_info[0];
		$image_height = $image_info[1];

		if($imageFormat == 'image/jpg' || $imageFormat == 'image/jpeg') {
			$image = imagecreatefromjpeg($imagefile);
		}

		if($imageFormat == 'image/gif') {
			$image = imagecreatefromgif($imagefile);
		}

		// Set dimensions of thumbnail image
		$thumb_width = $image_width * 0.25;
		$thumb_height = $image_height * 0.25;
		$thumb_image = imagecreatetruecolor($thumb_width, $thumb_height);

		imagecopyresampled($thumb_image, $image, 0, 0, 0, 0, $thumb_width, $thumb_height, $image_width, $image_height);

		if($imageFormat == 'image/jpg' || $imageFormat == 'image/jpeg') {
			return imagejpeg($thumb_image, 'thumbnail.jpg');
		}

		if($imageFormat == 'image/gif') {
			return imagegif($thumb_image, 'thumbnail.gif');
		}
	}
?>