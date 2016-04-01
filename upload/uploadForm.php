<?php
/*
This file is called from display/update.php file where the user specifies the images
they wish to update. This file gives the user to input the images new information
such as subject description, or place. 
calls updateImageDB.php

*/
session_start();
require_once "../setup.php";

if(isset($_SESSION['admin'])){
  require_once "../headerAdmin.php";
}
else{
  require_once "../header.php";
}

if(isset($_SESSION['success']) && $_SESSION['success'] == 'successuploaded'){
  echo '<center> <div class="alert alert-success" style="width:40%; text-align: center;">
        <strong>Success!</strong> Picture(s) Uploaded.
        </div>
        </center>';
  unset($_SESSION['success']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="../include/js/validDate.js" type="text/javascript"></script>
  <script>
    $(function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker" ).datepicker("setDate", new Date());
    });
  </script>

  <script>
  function show() {
    var groupID = document.getElementById('groupID')
    groupID.style.display = 'block';
    groupID.setAttribute("required","true");
  }
  function hide() {
    var groupID = document.getElementById('groupID')
    groupID.style.display = 'none';
    groupID.value="";
    groupID.removeAttribute("required");
  }

  function validateForm()
  {
    var image_date = document.getElementById('datepicker').value;
    if(validDate(image_date)) {
      return true;
    }
    else{
      alert("Invalid Date Format!");
      return false;
    }

  }
  </script>

  <title>Photo Share - Upload Images</title>
</head>

<body background = "../include/images/bgimage.jpg">
  <div class="container">
    <div class="panel-group">
      <div class="panel panel-primary">
        <div class="panel-heading">Upload Single Image</div>
          <div class="panel-body">
            <span>Upload one image stored as a local file, and optionally enter the descriptive/security information of the image.</span>
            <br></br>
            <form action="uploadDB.php" method="POST" name="photouploadform" enctype="multipart/form-data" onsubmit = "return validateForm();">
              <div class="form-group">
          	   <label for="image">File input</label>
          	   <input type="file" name="images[]" id ="imageupload" required multiple/>
          	   <p class="help-block">Optional: Enter a description for the photo.</p>
          	   <textarea class="form-control" rows="3" name="description"></textarea>
              </div>

              <div class="form-group">
              <label for="subject">Photo Subject: </label>
              <input type="text" id="subject" name="subject" class = "form-control" placeholder="Subject" style="width:400px;"><br>
              </div>

              <div class="form-group">
              <label for ="place">Place:</label>
              <input type="text" id="place" name="place" class = "form-control" placeholder="Place" style="width:400px;"><br>
              </div>

              <div class="form-group">
              <label for="image_date">Date Image Taken (MM/DD/YYYY):</label>
              <input type = "text" name="image_date" class = "form-control" id="datepicker"style="width:400px;"><br> 
              </div>

              <div class="form-group">  
              <label for="permission">Photo Permissions</label><br>
  				    <input type="radio" name="permission" onclick="hide();" value="public"/>Public

  				    <input type="radio" name="permission" onclick="hide();" value="private" checked/>Private

  				    <input type="radio" name="permission" id="group_checked" onclick="show();"/>Group
              <input type="text" name="groupID" class = "form-control" id="groupID" style="display:none;width:400px" placeholder="Group ID">
              </div>

              <button type="submit" class="btn btn-default" value="SendFile">Submit</button>
            </form>
          </div>
      </div>
    </div>
  </div>
</body>
</html>
