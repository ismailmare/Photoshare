<?php
session_start();
if(isset($_SESSION['admin'])){
    require_once "../headerAdmin.php";
  }

  else{
    require_once "../header.php";
  }

?>



<!DOCTYPE html>
<html>
 <head>

<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script>
      function show() {document.getElementById('fromDate').style.display = 'block';  
			document.getElementById('toDate').style.display = 'block'; }
      function hide() {document.getElementById('groupID').style.display = 'none';
                       document.getElementById('groupID').value=""; }
      </script>
<title>Photo Share - Search Image</title>
</head>
 
  <div class = "container">
      <center>
          <img src="/~imare/include/images/logoblue.png" alt="" width="350" height="150" style="z-index:-5;">
      </center>
      <br></br><br></br>
      <div class="panel panel-primary">
      <div class="panel-heading">Search For Pictures</div>
      <div class="panel-body"></div>

	  <form action="searchdb.php" method="POST" name="searchform" enctype="multipart/form-data">

          <h1 class="form-signin-heading"></h1>
          <div class="input-group input-group-lg">
              <span class="input-group-addon">Keywords &nbsp&nbsp&nbsp&nbsp</span>
              <input type="text" class="form-control" placeholder="Ex: #greatday" name="keywords">
          </div>
		  <div class="input-group input-group-lg">
              <span class="input-group-addon">Time Period: </span>
              <input class="form-control" placeholder="Starting YYYY-MM-DD" id="date" name="date" type="text">
			  <input class="form-control" id="date2" name="date2" placeholder="Ending YYYY-MM-DD" type="text">
          </div>
		<br></br>
		<div class="panel-heading">Sort By</div>
		<div class='checkbox'>
	  	<label>
				<input type="radio" name="searchby" value="Most-Recent">Recent First
  				<input type="radio" name="searchby" value="Oldest"> Oldest First
				
		</label>
		<br></br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
	
      </form>

      </div>
  </div>
	


</html>
