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

	// Get user information for entering the image into the database

	// For 
?>