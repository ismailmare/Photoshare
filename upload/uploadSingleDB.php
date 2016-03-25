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
	require("../setup.php");

	// Generate a photo ID for the image
	$photo_id_rand = rand(); // NEED TO CHECK IF UNIQUE

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

			$blobdata = file_get_contents($_FILES['images']['tmp_name'][$key])

		}
	}


	function insertImage($photo_id, $owner_name, $descriptive_info, $thumbnail, $photo){
		$photo_blob = oci_new_descriptor($)
	}
	
?>