<?php

/*

form to add groups to database



*/

session_start();
if(isset($_SESSION['admin'])){
    require_once "../headerAdmin.php";
}
else{
    require_once "../header.php";
}
require_once "../setup.php";

if(isset($_SESSION['autherror']) && $_SESSION['autherror'] == 'groupnametaken'){
    echo '<center> <div class="alert alert-warning" style="width:40%; text-align: center;">
          <strong>Warning!</strong> Sorry, Group Name Taken Already.
          </div></center>';

    $_SESSION['autherror']='';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Photoshare-Groups</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body background = "../include/images/bgimage.jpg">

<div class="container" style="color:#ffffff">
  <h2>Create a New Group</h2>
    <form class='form-group' action="groupAddDB.php" method="post">
      <label for="group_name">New Group Name</label>
      <input type="text" class="form-control" name="group_name" placeholder="" required autofocus>

    <br></br>
    <button type="submit" class="btn btn-default" style="width:10%; text-align:left;">Create</button>
  </form>
</div>

</body>
</html>
