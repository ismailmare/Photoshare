<?php

session_start();
        require_once "setup.php";

  if(isset($_SESSION['admin'])){
    require_once "headerAdmin.php";
  }

  else{
    require_once "header.php";
  }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
      <div class="container">
        <div class="panel-group">
          <div class="panel panel-primary">
          <div class="panel-heading">Upload Images From a Local Directory</div>
          <div class="panel-body">
            <span>Upload all image files stored in a local directory.</span><br></br>
            <form>
              <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <input type="file" id="exampleInputFile">
              <p class="help-block">Example block-level help text here.</p>
              </div>
              <div class="checkbox">
              <label>
              <input type="checkbox"> Check me out
              </label>
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
          </div>
        </div>
      </div>
    </body>
</html>
