<?php

	require_once "../setup.php";
	require_once "../homepage.php";
	
	session_start();
	
	$user = $_SESSION['user'];
	
	$image = $newDB->executeStatementAlt('SELECT thumbnail, photo_id FROM images WHERE owner_name =\''.$user.'\'');
	
	
	echo "<table border='1'>\n";
	foreach ($image as $col) {
    		echo "<tr>\n";
   	 	foreach ($col as $item) {
        		echo "    <td>".($item !== null ? htmlentities($item, ENT_QUOTES) : "")."</td>\n";
    		}
    		echo "</tr>\n";
	}
	echo "</table>\n";

?>
<!DOCTYPE html>
<html>




</html>

