<?php

	require_once "../setup.php";
	require_once "../homepage.php";
	
	session_start();
	
	$user = $_SESSION['user'];
	
	$image = 'SELECT thumbnail FROM images WHERE owner_name = :Owner_name';

$sql = 'SELECT thumbnail FROM images WHERE owner_name =\''.$user.'\'';
        $row = $newDB->executeStatementAlt($sql);

/*

	foreach ($row as $col) {
                        echo "<tr>\n";
                        foreach ($col as $item) {
                                echo "    <td>".($item !== null ? htmlentities($item, ENT_QUOTES) : "")."</td>\n";
                        }
                        echo "</tr>\n";
                }
                echo "</table>\n";
*/
		
	$conn = $newDB->getConnection();
	$stmt = oci_parse ($conn, $image);
	oci_bind_by_name($stmt, ':Owner_name', $user);
	oci_execute($stmt);
/*	while (($arr = oci_fetch_row($stmt)) != false) {;
	if(!$arr){
	    echo "No Pictures to Display";
	}else{
	
		$pic = $arr['0']->load();
		
		echo '<img src="Data:image/jpeg;base64,'.base64_encode($pic).'" alt="Cover">';
	}
	}
	oci_close($conn);
*/?>


<!DOCTYPE html>
<html>



<head>
  <title>Photoshare-Groups</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>




<body>


<br><br>
<div class="container-fluid well span6" style="width:1500px; left:5px;">
        <div class="row-fluid">
        <div class="span2" >
                    <img src="" class="img-circle">
        </div>

        <div class="span8" style background="grey">
            <h2>Groups You Own</h3>
            <br></br>

            <h4 style="text-align:left;float:left;">Group Name</h4> 
            <h4 style="text-align:right;float:right right:30px;">Group Id</h4> 


            <h6>
            <?php
                echo "<table border='5'; style='width:100%'>\n";
                        
			echo "<tr>\n";
			$counter = 0;
                        while (($arr = oci_fetch_row($stmt)) != false) {;

		                $pic = $arr['0']->load();

                		echo '<td><img src="Data:image/jpeg;base64,'.base64_encode($pic).'" alt="Cover">';
			

				$counter = $counter+1;
				if ($counter==6){
					$counter = 0;
					echo "</tr>\n";
                
				}

			}
        
        		oci_close($conn);


                        echo "</tr>\n";
                
                echo "</table>\n";

            ?>
            </h6>
        </div>

        <div class="span2">
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                    Action
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="groupAdd.php"><span class="icon-wrench"></span> Create a New Group</a></li>
                    <li><a href="friendsAdd.php"><span class="icon-trash"></span> Add Friends to a Group</a></li>
 </ul>
            </div>
        </div>

</div>

</div>
</div>


</body>
</html>
                                                                                             94,1          Bot

