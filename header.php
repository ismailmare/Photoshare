<?php

session_start();
require_once "function.php";

if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        $userstr = " ($user)";
}
else {
  if(basename($_SERVER['PHP_SELF']) == 'profile.php'){
    header('Location: ./usermanagement/login.php');
  }
  else{
    header('Location: ../usermanagement/login.php');
  }
}

echo '<div class="container">
        <div style="float:left;">
          <div class="alert alert-info" style="width:10%; text-align:left; z-index:-1;position:absolute; top:2px; left:2px;">
          <strong>User: </strong>'.$user.' 
 	        </div>
        </div>
      </div>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
  integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" 
  integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- CSS for navigation bars -->
  <link rel="stylesheet" href="include/css/nav.css">
  <link rel="stylesheet" href="include/css/background.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
  integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>

<body role="document">
  <div class="container theme-showcase" role="main">
    <nav class="navbar navbar-inverse">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://consort.cs.ualberta.ca/~imare/profile.php">Home</a>
        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="http://consort.cs.ualberta.ca/~imare/display/display.php">My Photos</a></li>
            <li><a href="http://consort.cs.ualberta.ca/~imare/groups/groups.php">Groups</a></li>
            <li><a href="http://consort.cs.ualberta.ca/~imare/search/search.php">Search</a></li>
            <li><a href="http://consort.cs.ualberta.ca/~imare/upload/uploadForm.php">Upload</a></li>
            <li><a href="http://consort.cs.ualberta.ca/~imare/usermanagement/logout.php">Logout</a></li>
      	    <li><a href="http://consort.cs.ualberta.ca/~imare/documentation/help.php">Help/a></li>
            <li role="separator" class="divider"></li>
          </ul>
        </div>
      </div>
      
    </nav>
  </div>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="../../dist/js/bootstrap.min.js"></script>
</body>
</html>






