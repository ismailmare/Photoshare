<?php
session_start();
if(isset($_SESSION['autherror']) && $_SESSION['autherror'] == true){
    echo '<center> <div class="alert alert-warning" style="width:40%; text-align: center;">
              <strong>Warning!</strong> Invalid Username or Password
          </div></center>';

    session_unset($_SESSION['autherror']);
}
if(isset($_SESSION['user'])){
    header("Location ../header.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
	    <!-- Latest compiled and minified CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
            integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	    <!-- Optional theme -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" 
            integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" 	crossorigin="anonymous">

	    <!-- Latest compiled and minified JavaScript -->
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	    <link href = "/~imare/include/css/signin.css" rel="stylesheet">
    </head>
    
    <body background="/~imare/include/images/bgimage.jpg" >
        <div class="container">

            <form class="form-signin" action="loginAuth.php" method="post">
                <h2 class="form-signin-heading">Please sign in</h2>
                <center>
		  <label for="inputUser" class="sr-only">Username</label>
		  <input type="user" name="inputUser" class="form-control" placeholder="Email address" required autofocus>
		  <label for="inputPassword" class="sr-only">Password</label>
		  <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
		  <button class="btn btn-lg btn-primary" type="submit"
		  name="uservalidate">Sign in</button>
                </center>
	    </form>
	    </div>            
    </body>
 </html>
