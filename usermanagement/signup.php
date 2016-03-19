<?php
/**
    * This page is meant to allow clients to login as a registered user
    * and perform various tasks.
    
    * @date March 18, 2016
*/
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
    </head>
    
    <body background="/~imare/include/images/bgimage.jpg" >
        <div class="container">
            
            <form class="form-signin">
            <h2 class="form-signin-heading">Please Register</h2>
                
                <div style="float:left;margin-right:20px;">
                    <label for="inputUsername" class="label_defult"> </label> 
                    <input type="username" id="inputUser"name class="form-control" placeholder="Username" required autofocus>
                </div>
                <div style="float:left;">
                    <label for="inputFirstname" class="label_defult"> </label>
                    <input type="Firstname" id="inputFirstname" class="form-control" placeholder="First Name" required autofocus>
                </div>
                
                
                <br></br>
                <br style="clear:both;" />
                <div style="float:left;margin-right:20px;">
                    <label for="inputLastname" class="label_defult"> </label>
                    <input type="Lastname" id="inputLastname" class="form-control" placeholder="Last Name" required autofocus>
                </div>
                <div style="float:left;">
                    <label for="inputEmail" class="label_defult"> </label>
                    <input type="Email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                </div>
            
            
                <br></br>
                <br style="clear:both;" />
                <div style="float:left;margin-right:20px;">
                    <label for="inputLastname" class="label_defult"> </label>
                    <input type="Lastname" id="inputLastname" class="form-control" placeholder="Last Name" required autofocus>
                </div>
            
                <div style="float:left;">
                    <label for="inputAddress" class="label_defult"> </label>
                    <input type="Address" id="inputAddress" class="form-control" placeholder="Address" required>
                </div>
                <br></br>
            
                <br style="clear:both;" />
                <div style="float:left;margin-right:20px;">
                    <label for="inputPhone" class="label_defult"></label>
                    <input type="number_format" id="inputPhone" class="form-control" placeholder="Phone" required autofocus>
                </div>
                <br></br>
            
                <br style="clear:both;" />
                <div style="float:left;margin-right:20px;">
                    <label for="inputPassword1" class="label_defult"></label>
                    <input type="password" id="inputPassword1" class="form-control" placeholder="Password" data-minlength="6" required autofocus>
                    <div class="help-block">Minimum of 6 characters</div>
                </div>
            
                <div style="float:left;">
                    <label for="inputPassword2" class="label_defult"></label>
                    <input type="password" id="inputPassword2" class="form-control" placeholder="Confirm" data-minlength="6" required autofocus>
                    <div class="help-block">Minimum of 6 characters</div>
                </div>
            
            
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            </form>
            </center>
        </div>
        </div>
    </body>
 </html>