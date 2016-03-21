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
				if(document.getElementById('group_checked').checked){
					var form = document.getElementById('photoUpload');
					var box= document.createElement('input');
					box.setAttribute('type', 'text');
					box.setAttribute('name', 'groupname');
					box.setAttribute('placeholder',, 'Group Name');
					form.appendChild(box);
				}
     	</script>
    </head>

    <body>
      <div class="container">
        <div class="panel-group">
          <div class="panel panel-primary">
          <div class="panel-heading">Upload Single Image</div>
          <div class="panel-body">
            <span>Upload one image stored as a local file, and optionally enter the descriptive/security information of the image.</span>
            <br></br>
            <form action="uploadSingleDB.php" method="POST" name="photouploadform" id="photoUpload">

              <div class="form-group">
              	<label for="exampleInputFile">File input</label>
              	<input type="file" name="image">
              	<p class="help-block">Optional: Enter a description for the photo.</p>
              	<textarea class="form-control" rows="3" name="description"></textarea>
              </div>

      				<input type="radio" name="optradio">Public
      				<input type="radio" name="optradio">Private
      				<input type="radio" name="optradio" id="group_checked">Group<br><br>
 
              <button type="submit" class="btn btn-default" value="SendFile">Submit</button>
            </form>
          </div>
          </div>
        </div>
      </div>
    </body>
</html>