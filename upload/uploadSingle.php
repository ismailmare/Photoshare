<?php

session_start();
        require_once "../setup.php";

  if(isset($_SESSION['admin'])){
    require_once "../headerAdmin.php";
  }

  else{
    require_once "../header.php";
  }

?>
<!DOCTYPE html>
<html lang="en">
	<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script>
      function show() {document.getElementById('groupID').style.display = 'block'; }
      function hide() {document.getElementById('groupID').style.display = 'none';
                       document.getElementById('groupID').value=""; }
      </script>

      <title>Photo Share - Upload Image</title>
    </head>

    <body>
      <div class="container">
        <div class="panel-group">
          <div class="panel panel-primary">
            <div class="panel-heading">Upload Single Image</div>
              <div class="panel-body">
                <span>Upload one image stored as a local file, and optionally enter the descriptive/security information of the image.</span>
                <br></br>
                <form action="uploadSingleDB.php" method="POST" name="photouploadform" enctype="multipart/form-data">

                  <div class="form-group">
              	   <label for="image">File input</label>
              	   <input type="file" name="images[]" id ="imageupload" multiple/>
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
                  <label for="image_date">Date Image Taken (MM-DD-YYYY):</label>
                  <input type="text" name="image_date" id="image_date" class = "form-control" placeholder="Date" style="width:400px;"><br>
                  </div>

                  <div class="form-group">  
                  <label for="optradio">Photo Permissions</label><br>
      				    <input type="radio" name="optradio" onclick="hide();"/>Public

      				    <input type="radio" name="optradio" onclick="hide();"/>Private

      				    <input type="radio" name="optradio" id="group_checked" onclick="show();"/>Group
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
