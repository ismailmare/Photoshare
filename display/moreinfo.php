<?php

        require_once "../setup.php";
        require_once "../homepage.php";

        session_start();


        $user = $_SESSION['user'];
	$photo_id = $_GET['photo_id'];
        $photo = 'SELECT photo FROM images WHERE photo_id = '.$photo_id.'';
	$permitted = 'SELECT permitted FROM images WHERE photo_id = '.$photo_id.'';
	$subject = 'SELECT subject FROM images WHERE photo_id = '.$photo_id.'';
	$place = 'SELECT place FROM images WHERE photo_id = '.$photo_id.'';
	$when= 'SELECT timing FROM images WHERE photo_id = '.$photo_id.'';
	$description = 'SELECT description FROM images WHERE photo_id = '.$photo_id.'';
	
	
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
	$stmt1 = oci_parse ($conn, $photo);
	$stmt2 = oci_parse ($conn, $permitted);
	$stmt3 = oci_parse ($conn, $subject);
	$stmt4 = oci_parse ($conn, $place);
	$stmt5 = oci_parse ($conn, $when);
	$stmt6 = oci_parse ($conn, $description);
	oci_execute($stmt1);
        oci_execute($stmt2);
	oci_execute($stmt3);
	oci_execute($stmt4);
	oci_execute($stmt5);
	oci_execute($stmt6);

/*      while (($arr = oci_fetch_row($stmt)) != false) {;
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
  <title>Photoshare-Photos-MoreInfo</title>
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>





<body>



<br><br>
<div class="container-fluid well span6" style="width:1000px; left:5px;">
        <div class="row-fluid">
        <div class="span2" >
                    <img src="" class="img-circle">
                     </div>


        <div class="span8" style background="grey">
            <?php echo'<h2>Photo ID: '.$photo_id.'</h3>';?>
            <br></br>


            <h4 style="text-align:left;float:left;"></h4>
             


            <?php
			echo'<center>';
                        while (($arr1 = oci_fetch_row($stmt1)) != false) {
                                $arr2 = oci_fetch_row($stmt2);
				$arr3 = oci_fetch_row($stmt3);
				$arr4 = oci_fetch_row($stmt4);
				$arr5 = oci_fetch_row($stmt5);
				$arr6 = oci_fetch_row($stmt6);


                                $pic = $arr1['0']->load();
                                echo '<td><img src="Data:image/jpeg;base64,'.base64_encode($pic).'" class="img-rounded" "alt="Cover" height="300" width="300">';
                                echo '<br></br>';
				if($arr2['0']=='1'){

					echo '<h4>Permitted: Public<h4>';
				}
				else{
					echo '<h4>Permitted: Private<h4>';
				}
				echo '<h4>Subject:      '.$arr3['0'].'<h4>';
				echo '<h4>Place:      '.$arr4['0'].'<h4>';
				echo '<h4>When:      '.$arr5['0'].'<h4>';
				echo '<h4>Description:      '.$arr6['0'].'<h4>';
                        
				
			}

			echo'<center>';




           ?>   




</div>

</div>

</body>
</html>

