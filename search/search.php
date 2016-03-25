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
  
  <div class = "container">
      <center>
          <img src="/~imare/include/images/logoblue.png" alt="" width="350" height="150" style="z-index:-5;">
      </center>
      <br></br><br></br>
      <div class="panel panel-primary">
      <div class="panel-heading">Search For Pictures</div>
      <div class="panel-body"></div>
      <form role="form" id="" action="searchdb.php">
          <h1 class="form-signin-heading"></h1>
          <div class="input-group input-group-lg">
              <span class="input-group-addon">Keywords</span>
              <input type="text" class="form-control" placeholder="Ex: #greatday" name="keywords">
          </div>
		<div class='checkbox'>
	  	<label>
				<input type="radio" name="searchby" value="Most-Recent">Most Recent
  				<input type="radio" name="searchby" value="Oldest"> Oldest
		</label>
        <br></br>
        	<button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
	
      </form>

      </div>
  </div>
	


</html>
