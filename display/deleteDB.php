<?php


	require_once "../setup.php";




	if(!empty($_POST['check_list'])) {
    		foreach($_POST['check_list'] as $check) {
            		echo $check; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
		    
			$sql = 'DELETE FROM images WHERE photo_id=\''.$check.'\''
			$newDB->executeStatement($sql);
		}
	}
	else{
		$_SESSION['autherror'] = 'notchecked';
		header("Location: delete.php");
	}

	$_SESSION['success']= 'success';
	header("Location: display.php");









?>
