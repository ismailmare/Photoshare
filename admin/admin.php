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
<title>Photo Share - Admin Tools</title>
</head>
 
  <div class = "container">
      <center>
          <img src="/~imare/include/images/logoblue.png" alt="" width="350" height="150" style="z-index:-5;">
      </center>
      <br></br><br></br>
      <div class="panel panel-primary">
      <div class="panel-heading">Data Analysis</div>
      <div class="panel-body"></div>
      <form role="form" id="" action="searchdb.php">
          <h1 class="form-signin-heading"></h1>
          <div class="input-group input-group-lg">
              <span class="input-group-addon">Keywords</span>
              <input type="text" class="form-control" placeholder="Ex: #greatday" name="keywords">
          </div>
		<br></br>
		<div class="panel-heading">Sort By</div>
		<div class='checkbox'>
	  	<label>
				<input type="radio" name="searchby" value="Most-Recent">Most Recent
  				<input type="radio" name="searchby" value="Oldest"> Oldest
				<input type="radio" name="searchby" value="Oldest" onclick="show();"> Time Period (MM/DD/YYYY)
				
		</label>
		<div class="form-group">
                 <input type="text" name="fromDate" class = "form-control" id="fromDate" style="display:none;width:400px" placeholder="From Date">
		 <input type="text" name="fromDate" class = "form-control" id="toDate" style="display:none;width:400px" placeholder="To Date">
                  </div>
	
        
        	<button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
	
      </form>

      </div>
  </div>
	


</html>
