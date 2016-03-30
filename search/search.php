<?php
session_start();
if(isset($_SESSION['admin'])){
    require_once "../headerAdmin.php";
}
else{
    require_once "../header.php";
}

if(isset($_SESSION['search_result']) && $_SESSION['search_result'] == 'empty'){
  echo '<center> <div class="alert alert-warning" style="width:40%; text-align: center; position: absolute; margin-left: 381px;">
        <strong>Sorry. No result(s) for that search.</strong>
        </div></center>';       
  unset($_SESSION['search_result']);
}
?>

<!DOCTYPE html>
<html>
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
    $( "#datepicker_s" ).datepicker();
    $( "#datepicker_e" ).datepicker();
    });
  </script>

  <title>Photo Share - Search Image</title>
</head>

<body background = "../include/images/bgimage.jpg">
  <div class = "container">
    <br></br><br>
    <div class="panel panel-primary">
      <div class="panel-heading">Search For Pictures</div>
      <div class="panel-body">

  	  <form action="searchdb.php" method="POST" name="searchform" enctype="multipart/form-data">
        <div class="form-group">
        <h1 class="form-signin-heading"></h1>
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Keyword(s):&nbsp&nbsp</span>
          <input type="text" class="form-control" placeholder="Ex: greatday" name="keywords">
        </div>
      </div>
        <div class="form-group">
  		  <div class="input-group input-group-lg">
          <span class="input-group-addon">Time Period:</span>
          <input class="form-control" placeholder="Start Date (Format: MM/DD/YYYY)" id="datepicker_s" name="start_date" type="text">
  			  <input class="form-control" id="datepicker_e" name="end_date" placeholder="End Date (Format: MM/DD/YYYY)" type="text">
        </div>
      </div>

  		  <br>
        <div class="form-group">
        <label for="searchby">Sort by:</label><br>
        <input type="radio" name="searchby" value="most_recent">Recent First
        <input type="radio" name="searchby" value="oldest"> Oldest First
        <input type="radio" name="searchby" value="default" checked> None	
        </div>
        <button class="btn btn-lg btn-primary" type="submit">Search</button>
      </form>
    </div>
  </div>	
</body>
</html>
