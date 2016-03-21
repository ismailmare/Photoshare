<?php

	require_once "../heading.php";
	require_once "../setup.php";
	$groupNames = $newDB->executeStatement('SELECT group_name FROM groups WHERE user_name =\''.$username.'\'');
	
	$length = count($groupNames);
	for(i=0;i<$length;i++){
	
		echo '<div class="container">
                <div style="float:center;">
                        <div class="alert alert-info" style="width:40%; text-align:center; z-index:-1;position:absolute;">
                                <strong>User: </strong>'.$groupNames[i].' 
                </div>
                </div>
                </div>';


	}

?>
<!DOCTYPE html>
<html>




</html>
