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
        <div class="container-fluid">
            <form class="form-signin">
            <h2 class="form-signin-heading">Please Register</h2>
                <div style="float:left;margin-right:20px;">
                    <label for="inputUsername" class="label_defult"> </label> 
                    <input type="username" id="inputUser"name class="form-control" placeholder="Username" data-maxlength='20' data-minlength="6" required autofocus>
                </div> 
                <div style="float:left;">
                    <label for="inputFirstname" class="label_defult"> </label>
                    <input type="Firstname" id="inputFirstname" class="form-control" placeholder="First Name" data-maxlength='20' required autofocus>
                </div>
                
                
                <br></br>
                <br style="clear:both;" />
                <div style="float:left;margin-right:20px;">
                    <label for="inputLastname" class="label_defult"> </label>
                    <input type="Lastname" id="inputLastname" class="form-control" placeholder="Last Name" data-maxlength='20' required autofocus>
                </div>
                <div style="float:left;">
                    <label for="inputEmail" class="label_defult"> </label>
                    <input type="Email" id="inputEmail" class="form-control" placeholder="Email" data-maxlength='20' required autofocus>
                </div>
            
            
                <br></br>
                <br style="clear:both;" />
                
                <div style="float:left;margin-right:20px;">
                    <label for="inputAddress" class="label_defult"> </label>
                    <input type="Address" id="inputAddress" class="form-control" placeholder="Address" data-maxlength='20' required>
                </div>
               
                <div style="float:left;">
                    <label for="inputPhone" class="label_defult"></label>
                    <input type="number_format" id="inputPhone" class="form-control" placeholder="Phone" data-maxlength='10' required autofocus>
                </div>
                <br></br>
            
                <br style="clear:both;" />
                <div style="float:left;margin-right:20px;">
                    <label for="inputPassword1" class="label_defult"></label>
                    <input type="password" id="inputPassword1" class="form-control" placeholder="Password" data-maxlength='20' data-minlength="6" required autofocus>
                    <div class="help-block">Minimum of 6 characters</div>
                </div>
            
                <div style="float:left;">
                    <label for="inputPassword2" class="label_defult"></label>
                    <input type="password" id="inputPassword2" class="form-control" placeholder="Confirm" data-maxlength='20' data-minlength="6" required autofocus>
                    <div class="help-block">Minimum of 6 characters</div>
                </div>

                <br style="clear:both;" />
                <div style="float:left;margin-right:20px;">
                <button class="btn btn-lg btn-primary" type="submit" name="register">Register</button>
                </div>
                
                <div style="float:left;">
                <button class="btn btn-lg btn-primary" onclick="../index.php">Home Page</button>
                </div>        
            </form>
        </div>
        
        
        
<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            inputUser: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 24,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            
            inputFirstname: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 24,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            inputLastname: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 24,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            inputEmail: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            
            inputPhone: {
                validators: {
                    phone: {
                        message: 'The input is not a valid Canadian phone number'
                    }
                }
            },
         
            inputPassword1: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            inputPassword2: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    });
});
</script>
</body>
</html>