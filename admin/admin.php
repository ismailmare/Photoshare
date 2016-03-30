
<?php
/*
This file "admin.php" is mostly for displaying a webpage to the user.
It lists some options for the user to do some data analysis

It calls adminDB.php after the user checks some boxes, and clicks submit.
Uses post in the form



*/




session_start();
if(isset($_SESSION['admin'])){
    require_once "../headerAdmin.php";
  }

  else{
    require_once "../header.php";
  }


  if(isset($_SESSION['autherror']) && $_SESSION['autherror'] == 'notchecked'){
        echo '<center> <div class="alert alert-warning" style="width:40%; text-align: center;">
              <strong>Warning!</strong> No Boxes Checked.
              </div></center>';

        unset($_SESSION['autherror']);
}






?>



<!DOCTYPE html>
<html>
 <head>

<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
       <script src="../include/js/validDate.js" type="text/javascript"></script>
  <script>
    $(function() {
    $( "#fromDate" ).datepicker();
    $( "#fromDate" ).datepicker("setDate", new Date());
    });
  </script>

      <script>
      function show() {document.getElementById('fromDate').style.display = 'block';  
			document.getElementById('toDate').style.display = 'block'; }
      function hide() {document.getElementById('groupID').style.display = 'none';
                       document.getElementById('groupID').value=""; }
      


      function validateForm()
  {
    var image_date = document.getElementById('fromDate').value;
    var image_date1 = document.getElementById('toDate').value;
    if(validDate(image_date) && validDate(image_date1)) {
      return true; 
    }
    else{
      if(!document.getElementById('period').checked){
	return true;
      }
      alert("Invalid Date Format!");
      return false;
    }

  }



	</script>
<title>Photo Share - Admin Tools</title>
</head>
<body background = "../include/images/bgimage.jpg">
  <div class = "container">
  <center>
  </center>
  <br/><br/>
  <div class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading"><h3>Data Analysis</h3></div>
        <div class="panel-body">
        <h4>Display number of records for a category.</h4><br>
          <form method="post" name="admin" action="adminDB.php" enctype="multipart/form-data" onsubmit ="return validateForm();">
            <h1 class="form-signin-heading"></h1>

            <div class="form-group">
            <h4> User</h4> <input type="checkbox" class="form-control" name="user">
            <h4> Subject</h4><input type="checkbox" class="form-control" name="subject">
            </div>

            <div class = "form-group">
            <h4>Time Period:</h4>
            </div>
            
            <div class = "form-group">
            <div class='checkbox'>
            <label>
            <input type="checkbox" name="searchby1" value="Weekly"> Weekly &nbsp &nbsp &nbsp   
            <input type="checkbox" name="searchby2" value="Monthly">  Monthly   &nbsp &nbsp &nbsp  
            <input type="checkbox" name="searchby3" value="Yeary"> Yearly     
            </label>
            </div>
            </div>
            <br></br> 
            <center><button class="btn btn-lg btn-primary" style="width:200px" type="submit">Search</button></center>
          </form>
        </div>
    </div>
  </div>
  </div>
</body>

</html>
