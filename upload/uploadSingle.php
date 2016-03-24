<?php
require_once "../header.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script>
      function show() {document.getElementById('groupEnter').style.display = 'block'; }
      function hide() {document.getElementById('groupEnter').style.display = 'none'; }
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
              <label for="subject">Photo Subject (128 Chr Max): </label>
              <input type="text" id="subject" name="subject" placeholder="Subject" style="width:400px;"><br></br>
              <label for ="place">Place (128 Char Max):</label>
              <input type="text" id="place" name="place" placeholder="Place" style="width:400px;"><br></br>
              <label for="image_date">Date Image Taken:</label>
              <input type="date" name="image_date" id="image_date" placeholder="Date (Format: MM-DD-YYYY)" style="width:350px;"><br></br>
              <label for="optradio">Photo Permissions</label><br>
      				<input type="radio" name="optradio" onclick="hide();"/>Public
      				<input type="radio" name="optradio" onclick="hide();"/>Private
      				<input type="radio" name="optradio" id="group_checked" onclick="show();"/>Group<br>
              <input type="text" name="groupName" id="groupEnter" style="display: none" placeholder="Group ID">
              <button type="submit" class="btn btn-default" value="SendFile">Submit</button>
            </form>
          </div>
          </div>
        </div>
      </div>
    </body>
</html>