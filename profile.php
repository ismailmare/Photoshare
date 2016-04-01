<?php
	session_start();
	require_once "setup.php";
  
  if(isset($_SESSION['admin'])){
    require_once "headerAdmin.php";
  }
  
  else{ 
    require_once "header.php";
  }

	if(isset($_SESSION['success']) && $_SESSION['success'] == 'passchanged'){
  echo '<center> <div class="alert alert-success" style="width:40%; text-align: center;">
        <strong>Success!</strong> Password Changed.
        </div></center>';
  unset($_SESSION['success']);
}

	 if(isset($_SESSION['success']) && $_SESSION['success'] == 'updated'){
  echo '<center> <div class="alert alert-success" style="width:40%; text-align: center;">
        <strong>Success!</strong> User Information Updated.
        </div></center>';
  unset($_SESSION['success']);
}

	$username = $_SESSION['user'];
	$sql = 'SELECT user_name,first_name,last_name,address,email,phone FROM persons WHERE user_name =\''.$username.'\'';
	
 	$num = $newDB->executeStatement($sql);

	$user = $num['USER_NAME'];
	$first = $num['FIRST_NAME'];
	$last = $num['LAST_NAME'];
	$address = $num['ADDRESS'];
	$email =$num['EMAIL'];
	$phone = $num['PHONE'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Photoshare Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body background = "./include/images/bgimage.jpg">
  <br><br>
  <div class="container-fluid well span6" style="width:800px; left:5px;">
  	<div class="row-fluid">

          <div class="span8">
              <h3><?php echo $user ?></h3>
              <h6>Email: <?php echo $email ?></h6>
              <h6>Name: <?php echo $first.' '.$last ?></h6>
              <h6>Address: <?php echo $address ?></h6>
              <h6>Phone: <?php echo $phone ?></h6>
          </div>

          <div class="span2">
              <div class="btn-group">
                  <a class="btn dropdown-toggle btn-info" style="width:200px; height=50px" data-toggle="dropdown" href="#">
                      Action
                      <span class="icon-cog icon-white"></span><span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                      <li><a href="updateInfo/changePass.php"><span class="icon-wrench"></span> Change Password</a></li>
		      <li><a href="updateInfo/updateinfo.php"><span class="icon-wrench"></span> Update Information</a></li>
                  </ul>
              </div>
          </div>
          
    </div>
  </div>
</body>
</html>




