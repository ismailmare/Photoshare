<?php
	session_start();
	require_once "../setup.php";
	require_once "../homepage.php"; 	
	if(isset($_POST['user']) or isset($_POST['subject']) or isset($_POST['period'])){
		
		$sql = "SELECT ";
		$sql1 = " GROUP BY ";
		

		if(isset($_POST['user'])){	
			$sql .= "i.owner_name, ";
			$sql1.= "i.owner_name, ";

		}

		
		if(isset($_POST['subject'])){

			$sql.="i.subject, ";
			$sql1.="i.subject,";

                }


		if(isset($_POST['searchby'])){

			if(isset($_POST['searchby']) == 'Weekly'){

				$sql .= ' to_char(i.timing,\'IW\'),';
				$sql1 .= ' to_char(i.timing,\'IW\'),';	
		
			}

			if(isset($_POST['searchby'])=='Monthly'){

				$sql .= ' to_char(i.timing,\'MON\'),';
				$sql1 .= ' to_char(i.timing,\'MON\'),';
			}


			if(isset($_POST['searchby']) == 'Yearly'){
				$sql .= ' EXTRACT(YEAR from i.timing),';
				$sql1 .= ' EXTRACT(YEAR from i.timing),';
			}	
                
                		
                }
                $sql1 = rtrim($sql1," ,");
		$exe .= $sql.' COUNT(i.photo_id)'; 
		$exe .= " FROM images i";
		$exe .= $sql1;
		$rows = $newDB->executeStatementAlt($exe);

	        echo '<div class="container-fluid well span6" style="width:1000px; left:5px;">';
		echo "<table border='5'; style='width:100%'>\n"; 	
		echo '<h1>Data Analysis</h1>';
		foreach($rows as $col){
			echo "<tr>\n";
			foreach($col as $items){
				echo "<td>".$items."</td>\n";		
			}
			echo "</tr>\n";
	
		}
		echo "</table>\n";

	}


	else{
		$_SESSION['autherror']='notchecked';
		header('Location: admin.php');
		exit();
	}








?>
