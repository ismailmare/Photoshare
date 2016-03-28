<?php

require_once "../setup.php";
require_once "../homepage.php";

session_start();


if(isset($_SESSION['success']) && $_SESSION['success'] == 'successdeleted'){
  echo '<center> <div class="alert alert-success" style="width:40%; text-align: center;">
        <strong>Success!</strong> Picture(s) Deleted.
        </div></center>';

  unset($_SESSION['success']);
}


if(isset($_SESSION['success']) && $_SESSION['success'] == 'successupdate'){
  echo '<center> <div class="alert alert-success" style="width:40%; text-align: center;">
        <strong>Success!</strong> Picture(s) Updated.
        </div></center>';

  unset($_SESSION['success']);
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

<body>
  <br><br>
  <div class="container-fluid well span6" style="width:1500px; left:5px;">
  <div class="row-fluid">
    <div class="span2" >
    <img src="" class="img-circle">
    </div>

    <div class="span8" style background="grey">
      <h2>Photos</h3>
      <br></br>
      <h4 style="text-align:left;float:left;"></h4> 
      <form class="" action="update.php" method="post">
      <?php
        echo "<table border='5'; style='width:100%'>\n";      
        echo "<tr>\n";

        $counter = 0;
        while (($arr = oci_fetch_row($stmt)) != false) {
  				$photo_id = oci_fetch_row($stmt2);
          $pic = $arr['0']->load();
  				$_POST['photo_id']=$photo_id;
      		
          echo '<td><p><a href="moreinfo.php?photo_id='.$photo_id['0'].'"><img src="Data:image/jpeg;base64,'.base64_encode($pic).'" class="img-rounded" alt="Cover" height="100" width="100">';
  				echo'</a></p>';
  		    echo '<br></br>';
  				
          $counter = $counter+1;
  				if ($counter==6){
  					$counter = 0;
  					echo "</tr>\n";           
  				}
  			}
        
        echo "</tr>\n";
        echo "</table>\n";
      ?>
      </form>
    </div>

    <div class="span2">
      <div class="btn-group">
        <a class="btn dropdown-toggle btn-info" style="width:200px; height=50px" data-toggle="dropdown" href="#"> Action
        <span class="icon-cog icon-white"></span><span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="update.php"><span class="icon-wrench"></span> Update Images</a></li>
          <li><a href="delete.php"><span class="icon-trash"></span> Delete Images</a></li>
  		  </ul>
      </div>
    </div>
  </div>
  </div>
</body>
</html>
                                                                                       
