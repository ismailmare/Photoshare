<?php

/*
This file will query the database
The result returned to the user will depended on the boxes checked in admin.php

It will then display the results to the user using in a table using html.

collaboration: code based off kyle james ross


*/
	echo '<body background="../include/images/bgimage.jpg" />';
	session_start();
	require_once "../setup.php";
	require_once "../homepage.php"; 	
	if(isset($_POST['user']) or isset($_POST['subject']) or isset($_POST['searchby1']) or isset($_POST['searchby2']) or isset($_POST['searchby3'])){
		
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


		if(isset($_POST['searchby1']) == 'Weekly'){
				
				$sql .= ' to_char(i.timing,\'IW\'),';
				$sql1 .= ' to_char(i.timing,\'IW\'),';	
		
		}

		if(isset($_POST['searchby2'])=='Monthly'){
				
				$sql .= ' to_char(i.timing,\'MON\'),';
				$sql1 .= ' to_char(i.timing,\'MON\'),';
		}


		if(isset($_POST['searchby3']) == 'Yearly'){
				$sql .= ' EXTRACT(YEAR from i.timing),';
				$sql1 .= ' EXTRACT(YEAR from i.timing),';
				
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
	     $sql ='SELECT COUNT(i.photo_id) FROM images i';
      
             $rows = $newDB->executeStatementAlt($sql);

              echo '<div class="container-fluid well span6" style="width:1000px; left:5px;">';
                echo "<table border='5'; style='width:100%'>\n";
                echo '<h1>Data Analysis</h1>';
                foreach($rows as $col){
			echo "IMAGES";
                        echo "<tr>\n";
                        foreach($col as $items){
                                echo "<td>There Are ".$items." Images</td>\n";
                        }
                        echo "</tr>\n";

                }
                echo "</table>\n";

	}








?>
