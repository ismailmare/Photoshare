<?php


/*This is the user doc for the project
Here we outline the required elements of the user doc, which include
how to install our source code and website and how to use website, and take advantage of each of the modules.



*/



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

<h4>Installation<br></br> 1. Download photoshare.tgz and put it into the folder you want your web documents to be created in <br></br>2. Extract the files in photoshare.tgz using the command tar xzvf photoshare.tgz <br></br> 3. Set the permissions with the command chmod &ndash;R 777.  <br></br>4. Run setup.sql to initialize the database tables <br></br>5. Go into setup.php and enter you oracle username and password</h4>
<br></br>
<h3>User Manual Main Page (index.php)</h3>
<img src="391ScreenShots/index.png" alt="Mountain View" style="width:1000px;height:400px;">
>p> </p>
<br><br>
<h4>This is the main page that is displayed when the website is called. You can either login or register. If you have already done either of these actions and not logged out, you are automatically logged in and set to your profile.</h4>

<p></p>

<h3> Usermanagement Module</h3>
<br><br>
<p> </p>
<img src="391ScreenShots/signin.png" alt="Mountain View" style="width:1000px;height:400px;">
<h4>Once you have clicked the sign in button, you be redirected to this page where you are presented with a form to input your username and password. Once you have entered your information, the sign in button is clicked, and your have correctly entered your password and username you will be redirected to your profile. If the user name or password is invalid then an error message is displayed</h4>
<br><br>
<p> </p>
<img src="391ScreenShots/register.png" alt="Mountain View" style="width:1000px;height:400px;">
<br><br>
<h4>If you click the register button on the homepage you will be redirected to provide some basic information  </h4>
<br><br>
<img src="391ScreenShots/error.png" alt="Mountain View" style="width:1000px;height:400px;">
<h4>If  &bull; Passwords do not match &bull; User name is too short / password to short &bull; Email is invalid &bull; Phone number is invalid The user will be displayed an error message and be placed back onto this page</h4>
<br><br>
<img src="391ScreenShots/Profile.png" alt="Mountain View" style="width:1000px;height:400px;">
<h4>If the user signs is or registers successfully, the profile page will be called</h4>
<br><br>
<p>  .</p>

<p></p>

<h3> Logout</h3>
<br><br>
<img src="391ScreenShots/logout.png" alt="Mountain View" style="width:1000px;height:400px;">
<h4>The logout button is displayed in the header at the top of the webpage. Clicking this button will simply logout the user</h4>
<br><br>
<p> </p>

<br><br><h3> Upload Module</h3>
<br><br>
<img src="391ScreenShots/uploadingrecent.png" alt="Mountain View" style="width:1000px;height:400px;">
<br><br>
<h4>  If you would like to upload an image, click on the upload button in the nav bar. You will be redirected to this page where you can select an image and input some information about it.</h4>

<p> </p>

<h4>A success message will be displayed if the image was uploaded.</h4>
<br><br>
<img src="391ScreenShots/uploading.png" alt="Mountain View" style="width:1000px;height:400px;">
<p></p>
<br><br>
<h3>Search Module</h3>
<h4> If you click search you can search images.  </h4>
<br><br>
<img src="391ScreenShots/Search.png" alt="Mountain View" style="width:1000px;height:400px;">
<h4> You can search by keyword or by dates. You will only be returned pictures permitted for you to see. Eg. You pictures, pictures uploaded by friends in groups, and public pictures.</h4>
<br><br>
<h4>Results will be displayed to you.  </h4>
<img src="391ScreenShots/photos.png" alt="Mountain View" style="width:1000px;height:400px;">
<p></p>
<br><br>
<p></p>

<h3>Display Module  </h3>
<br><br>
<h4>If you click the button &ldquo;my pictures&rdquo; you will be shown a table of your pictures. You can then update or delete images. </h4>
<br><br>
<img src="391ScreenShots/images.png" alt="Mountain View" style="width:1000px;height:400px;">
<br><br>
<h4>Deleting </h4>
<br><br>
<img src="391ScreenShots/deleting.png" alt="Mountain View" style="width:1000px;height:400px;">
<h4>Updating </h4>
<br><br>
<img src="391ScreenShots/updating1.png" alt="Mountain View" style="width:1000px;height:400px;">
<h4>If you click on a picture, more information about that picture will be displayed.</h4>
<br><br>
<img src="391ScreenShots/moreinfo.png" alt="Mountain View" style="width:1000px;height:400px;">
<p> </p>
<br><br>
<p></p>

<p></p>

<p></p>

<h3> Security Module</h3>

<h4>Groups: Users can login, create groups, and add and remove friends to these groups. Only restriction is the group name must be unique to the user that is logged in.  </h4>
<h4>Register: Users registers with a unique username. We check if the username is already in the database, preventing the same users to have the same username.</h4>
<br><br>
<img src="391ScreenShots/error.png" alt="Mountain View" style="width:1000px;height:400px;">
<br><br>
<h4>Loggin In: Users cannot login without providing a valid username and password.</h4>
<br><br>
<img src="391ScreenShots/error2.png" alt="Mountain View" style="width:1000px;height:400px;">
<br><br>
<h4>Images: Images have a unique owner in the database. Each image can only be viewed by users who have permission to see the image. For example the user who views the picture is in the same group as the user who uploades the image. Or the image can be set to public.</h4>


<h3> Data Analysis Module </h3>
<h4>If the user logged in, is an admin, they will have the ability to access admin tools where they can do searches on the amount of images uploaded by a users or images uploaded by subject name. They can view this imformation by weekly, monthly, or yearly.</h4>
<br><br>
<img src="391ScreenShots/datanalysis.png" alt="Mountain View" style="width:1000px;height:400px;">
<p> The owner of this image is the username 'ish', and from the tag at the top left, it is clear this user is an admin</p>
<br><br>



</div>
</div>
</body>
</head>
</html>
