<!DOCTYPE html>
<?php
require_once "include/db.php";
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" 	crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>
    
    <body background="bgimage.jpg">
        <div class="container-fluid">
            <div class="jumbotron" style="background:rgba(0, 0, 0, 0);">
                <h1 class="col-md-6 col-md-offset-4" style="color:white;">Photo Share</h1> 
            </div>
            
            </div class="row-fluid">
                <h2 style="color:white;" class ="text-center"> A web-based photo sharing application.</h2>
            </div>
            
            </div class="row-fluid">
                <div class ="col-md-6 col-md-offset-4" style="height:20px;"></div>
            </div>
            
            <div class="row-fluid">
                <div class="col-md-6 col-md-offset-5">
                <p>
                <button type="button" class="btn btn-primary btn-lg">Sign in</button>
                <button type="button" class="btn btn-default btn-lg">Register</button>
                </p>
                </div>
            </div>
        </div>
    </body>
</html>
