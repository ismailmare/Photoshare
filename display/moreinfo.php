<?php
/*
In this file we give more information about a file the user has clicked on in display.php

The file name is set through $_GET from display.php
We then display more information about the photo


*/



require_once "../setup.php";
require_once "../homepage.php";

session_start();
$conn = $newDB->getConnection();


$user = $_SESSION['user'];
$photo_id = $_GET['photo_id'];
$photo = 'SELECT photo FROM images WHERE photo_id = '.$photo_id.'';
$permitted = 'SELECT permitted FROM images WHERE photo_id = '.$photo_id.'';
$subject = 'SELECT subject FROM images WHERE photo_id = '.$photo_id.'';
$place = 'SELECT place FROM images WHERE photo_id = '.$photo_id.'';
$when= 'SELECT timing FROM images WHERE photo_id = '.$photo_id.'';
$description = 'SELECT description FROM images WHERE photo_id = '.$photo_id.'';

// Check if the user has viewed the photo before
$image_viewed = 'SELECT * FROM image_views WHERE user_name = \''.$user.'\' and image_id = \''.$photo_id.'\'';
$res = $newDB->executeStatement($image_viewed);
if(empty($res)){
  // Insert a view for this user with this photo
  $image_view = 'INSERT INTO image_views (image_id, user_name) VALUES (:photo_id, :user_name)';
  $stid = oci_parse($conn, $image_view);
  oci_bind_by_name($stid, ':photo_id', $photo_id);
  oci_bind_by_name($stid, ':user_name', $user);

  $res = oci_execute($stid, OCI_DEFAULT);
  oci_commit($conn);
}
	
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
?>

<!DOCTYPE html>
<html>
<head>
  <title>Photoshare Photos-MoreInfo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body background = "../include/images/bgimage.jpg">
<br><br>
  <div class="container-fluid well span6" style="width:100%; left:5px;">
    <div class="row-fluid">

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
          echo '<td><img src="Data:image/jpeg;base64,'.base64_encode($pic).'" class="img-rounded" "alt="Cover">';
          echo '<br></br>';
				echo "<table border='5'; style='width:100%'>\n";
				echo "<tr>\n";
  				if($arr2['0']=='1'){
  					echo '<h2>PERMITTED: Public<h2>';
  				}
  				else{
  					echo '<h2>PERMITTED: Private<h2>';
  				}

  				echo '<h2>SUBJECT:      '.$arr3['0'].'<h2>';
  				echo '<h2>PLACE:      '.$arr4['0'].'<h2>';
  				echo '<h2>WHEN:      '.$arr5['0'].'<h2>';
  				echo '<h2>DESCRIPTION:      '.$arr6['0'].'<h2>';                      	
  				echo "</table>\n";
			}
	
  			echo'<center>';
        ?>
      </div>
    </div>
  </div>
</body>
</html>

