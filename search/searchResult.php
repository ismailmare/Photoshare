<?php
session_start();
$search_result = $_SESSION['search_result'];

require_once "../setup.php";
require_once "../homepage.php";
?>
<!DOCTYPE html>
<html>

<head>
  <title>Photoshare - Search</title>
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
      <form class="" action="update.php" method="post">
      <?php
        session_start();
        echo "<table border='5'; style='width:100%'>\n";
        echo "<tr>\n";

        $counter = 0;
	foreach( $_SESSION['search_result'] as $image_id){
		
		$sql = 'SELECT photo FROM images WHERE photo_id = :ID';
		$conn = $newDB->getConnection();
		$stmt = oci_parse ($conn, $sql);
		oci_bind_by_name($stmt, ':ID', $image_id);
		oci_execute($stmt);
	
        	while (($arr = oci_fetch_row($stmt)) != false) {
                    
          		$pic = $arr['0']->load();
                        $_POST['photo_id']=$image_id;

          		echo '<td><p><a href="moreinfo.php?photo_id='.$image_id.'"><img src="Data:image/jpeg;base64,'.base64_encode($pic).'" class="img-rounded" alt="Cover" height="100" width="100">';
                                echo'</a></p>';
                    	echo '<br></br>';

          		$counter = $counter+1;
                        if ($counter==6){
                        	$counter = 0;
                                echo "</tr>\n";
                        }
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
</div>

</body>
</html>