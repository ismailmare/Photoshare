<?php

	require_once("../homepage.php");



?>

<!DOCTYPE html>
<html>




<head>
  <title>Photoshare-Photos-MoreInfo</title>
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>





<body>



<br><br>
<div class="container-fluid well span6" style="width:1500px; left:5px;">
        <div class="row-fluid">
        <div class="span2" >

<h1>User Documentation</h1>

<p>Installation 1. Download photoshare.tgz and put it into the folder you want your web documents to be created in 2. Extract the files in photoshare.tgz using the command tar xzvf photoshare.tgz  3. Set the permissions with the command chmod &ndash;R 777.  4. Run setup.sql to initialize the database tables 5. Go into setup.php and enter you oracle username and password</p>

<h3>User Manual Main Page (index.php)</h3>

<p> </p>

<p>This is the main page that is displayed when the website is called. You can either login or register. If you have already done either of these actions and not logged out, you are automatically logged in and set to your profile.</p>

<p></p>

<h3> Usermanagement Module</h3>

<p> </p>

<p>Once you have clicked the sign in button, you be redirected to this page where you are presented with a form to input your username and password. Once you have entered your information, the sign in button is clicked, and your have correctly entered your password and username you will be redirected to your profile. If the user name or password is invalid then an error message is displayed</p>

<p> </p>

<p>If you click the register button on the homepage you will be redirected to provide some basic information  </p>

<p>If  &bull; Passwords do not match &bull; User name is too short / password to short &bull; Email is invalid &bull; Phone number is invalid The user will be displayed an error message and be placed back onto this page</p>

<p>If the user signs is or registers successfully, the profile page will be called</p>

<p>  .</p>

<p></p>

<h3> Logout</h3>

<p>The logout button is displayed in the header at the top of the webpage. Clicking this button will simply logout the user</p>

<p> </p>

<h3> Upload Module</h3>

<p>  If you would like to upload an image, click on the upload button in the nav bar. You will be redirected to this page where you can select an image and input some information about it.</p>

<p> </p>

<p>A success message will be displayed if the image was uploaded.</p>

<p></p>

<p> Search Module If you click search you can search images.  </p>

<p> You can search by keyword or by dates. You will only be returned pictures permitted for you to see. Eg. You pictures, pictures uploaded by friends in groups, and public pictures.</p>

<p>Results will be displayed to you.  </p>

<p></p>

<p></p>

<h3>Display Module  </h3>

<p>If you click the button &ldquo;my pictures&rdquo; you will be shown a table of your pictures. You can then update or delete images. </p>

<p>Deleting </p>

<p>Updating </p>

<p>If you click on a picture, more information about that picture will be displayed.</p>

<p> </p>

<p></p>

<p></p>

<p></p>

<h3> Security Module</h3>

<p>Groups: Users can login, create groups, and add and remove friends to these groups. Only restriction is the group name must be unique to the user that is logged in.  </p>
<p>Register: Users registers with a unique username. We check if the username is already in the database, preventing the same users to have the same username.</p>
<p>Loggin In: Users cannot login without providing a valid username and password.
<p>Images: Images have a unique owner in the database. Each image can only be viewed by users who have permission to see the image. For example the user who views the picture is in the same group as the user who uploades the image. Or the image can be set to public.</p>
<h3> Data Analysis Module </h3>
<p>If the user logged in, is an admin, they will have the ability to access admin tools where they can do searches on images and users. They can also view some analytics about</p>

<p>  </p>




</div>
</div>
</body>
</head>
</html>