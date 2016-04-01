<?php
/*
this file allows users to delete images. All the users images are displayed, and a little checkbox is 
printed. All the images the user checks off will be removed from the database.

Calls deleteDB.php




*/
// Accessing the database to determine the photos the user owns and can delete. 

require_once "../setup.php";
require_once "../homepage.php";

session_start();


if(isset($_SESSION['autherror']) && $_SESSION['autherror'] == 'notchecked'){
  echo '<center> <div class="alert alert-warning" style="width:40%; text-align: center;">
        <strong>Warning!</strong> No Photos Checked.
        </div></center>';

  $_SESSION['autherror']='';
}

$user = $_SESSION['user'];

$image = 'SELECT thumbnail FROM images WHERE owner_name = :Owner_name';

$sql = 'SELECT photo_id FROM images WHERE owner_name = :Owner_name';

$conn = $newDB->getConnection();
$stmt = oci_parse ($conn, $image);
oci_bind_by_name($stmt, ':Owner_name', $user);
oci_execute($stmt);

$stmt2 = oci_parse ($conn, $sql);
oci_bind_by_name($stmt2, ':Owner_name', $user);
oci_execute($stmt2);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Photoshare-Photos</title>
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
  <div class="container-fluid well span6" style="width:1500px; left:5px;">
    <div class="row-fluid">
      <div class="span8" style background="grey">
        <h2>Photos</h3>
        <br></br>
        <h4 style="text-align:left;float:left;"></h4> 
        <form class="" action="deleteDB.php" method="post">
          <?php
          echo "<table border='5'; style='width:100%'>\n";
          echo "<tr>\n";
          
          $counter = 0;
          while (($arr = oci_fetch_row($stmt)) != false) {
            $arr1 = oci_fetch_row($stmt2);
            $pic = $arr['0']->load();

            echo '<td><img src="Data:image/jpeg;base64,'.base64_encode($pic).'" class="img-rounded" "alt="Cover" height="100" width="100">';
            echo '<br></br>';
            echo '<input type="checkbox" name="check_list[]" value="'.$arr1['0'].'">';

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
          name="uservalidate">Delete</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

