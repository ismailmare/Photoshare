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
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <script>
        $(function() {
        $( "#datepicker" ).datepicker();
        });
      </script>

      <script>
      function show() {document.getElementById('groupID').style.display = 'block'; }
      function hide() {document.getElementById('groupID').style.display = 'none';
                       document.getElementById('groupID').value=""; }

      // Validates the date string to ensure proper format
      // Original Javascript code acknowledged here:
      // http://stackoverflow.com/questions/6177975
      function validDate(dateString)
      {
        // check pattern
        if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
          return false;

        // parse string into integers
        var parse = dateString.split("/");
        var month = parseInt(parse[0], 10);
        var day = parseInt(parse[1], 10);
        var year = parseInt(parse[2], 10);

        // Check ranges of month and year
        if(year < 1000 || year > 3000 || month == 0 || month > 12)
          return false;

        var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

        // Adjust for leap years
        if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
          monthLength[1] = 29;

        return day > 0 && day <= monthLength[month -1]; 
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
                <form action="uploadSingleDB.php" method="POST" name="photouploadform" enctype="multipart/form-data" onsubmit = "event.preventDefault(); return validateForm();">

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
                  <!--<input type="text" name="image_date" id="image_date" class = "form-control" placeholder="Date" style="width:400px;"><br>-->
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
