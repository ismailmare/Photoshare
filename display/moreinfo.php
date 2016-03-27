<?php

        require_once "../setup.php";
        require_once "../homepage.php";

        session_start();


        $user = $_SESSION['user'];
	$photo_id = $POST['photo_id'];
        $photo = 'SELECT photo FROM images WHERE photo_id = \''.$photo_id.'\'';
	$permitted = 'SELECT permitted FROM images WHERE photo_id = \''.$photo_id.'\'';
	$subject = 'SELECT subject FROM images WHERE photo_id = \''.$photo_id.'\'';
	$place = 'SELECT place FROM images WHERE photo_id = \''.$photo_id.'\'';
	$when= 'SELECT when FROM images WHERE photo_id = \''.$photo_id.'\'';
	$description = 'SELECT description FROM images WHERE photo_id = \''.$photo_id.'\'';
	

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
        $stmt1 = oci_parse ($conn, $image);
        $stmt1 = oci_parse ($conn, $image);
	$stmt1 = oci_parse ($conn, $photo_id);
	$stmt2 = oci_parse ($conn, $photo);
	$stmt3 = oci_parse ($conn, $permitted);
	$stmt4 = oci_parse ($conn, $subject);
	$stmt5 = oci_parse ($conn, $place);
	$stmt6 = oci_parse ($conn, $when);
	$stmt7 = oci_parse ($conn, $description);
	oci_execute($stmt1);
        oci_execute($stmt2);
	oci_execute($stmt3);
	oci_execute($stmt4);
	oci_execute($stmt5);
	oci_execute($stmt6);
	oci_execute($stmt7);

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
<div class="container-fluid well span6" style="width:1500px; left:5px;">
        <div class="row-fluid">
        <div class="span2" >
                    <img src="" class="img-circle">
                     </div>


        <div class="span8" style background="grey">
            <?php echo'<h2>\''.$photo_id.'\'</h3>'
            <br></br>


            <h4 style="text-align:left;float:left;"></h4> 
             


            <form class="" action="../upload/updateImage.php" method="post">
            <?php
			echo'<center>'
                        while (($arr = oci_fetch_row($stmt1)) != false) {;
                                $arr1 = oci_fetch_row($stmt2);
                                $pic = $arr['0']->load();
                                echo '<td><img src="Data:image/jpeg;base64,'.base64_encode($pic).'" class="img-rounded" "alt="Cover"> height="100" width="100">';
                                echo '<br></br>';
                                echo '<input type="checkbox" name="check_list1[]" value="'.$arr1['0'].'">';


                                $counter = $counter+1;
                                if ($counter==6){
                                        $counter = 0;
                                        echo "</tr>\n";

                                }

                        }


                        echo "</tr>\n";


                echo "</table>\n";



           ?>   
	   <button class="btn btn-lg btn-primary" type="submit"
                  name="uservalidate">Update</button>
</form>




</div>

</div>

</body>
</html>

