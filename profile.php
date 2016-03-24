<?php

	require_once "setup.php";
  
  if(isset($_SESSION['admin'])){
    require_once "headerAdmin.php";
  }
  
  else{ 
    require_once "header.php";
  }
	
 	$num = $newDB->executeStatement('SELECT user_name,first_name,last_name,address,email,phone FROM persons WHERE user_name =\''.$username.'\'');

	$user = $num[0];
	$first = $num[1];
	$last = $num[2];
	$address = $num[3];
	$email =$num[4];
	$phone = $num[5];


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
<div class="container-fluid well span6" style="width:800px; left:5px;">
	<div class="row-fluid">
        <div class="span2" >
		    <img src="redcircle.png" class="img-circle">
        </div>

        <div class="span8">
            <h3><?php echo $user ?></h3>
            <h6>Email: <?php echo $email ?></h6>
            <h6>Name: <?php echo $first.' '.$last ?></h6>
            <h6>Address: <?php echo $address ?></h6>
	    <h6>Phone: <?php echo $phone ?></h6>
            <h6><a href="#">More... </a></h6>
        </div>

        <div class="span2">
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                    Action
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><span class="icon-wrench"></span> Modify</a></li>
                    <li><a href="#"><span class="icon-trash"></span> Delete</a></li>
                </ul>
            </div>
        </div>

</div>

</div>
</div>
</body>

</html>




