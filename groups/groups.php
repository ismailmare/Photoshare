<?php


	session_start();
        require_once "../setup.php";

  	if(isset($_SESSION['admin'])){
    		require_once "../headerAdmin.php";
  	}

  	else{
    		require_once "../header.php";
  	}

	
	$username = $_SESSION['user'];

	$sql = 'SELECT group_name, group_id FROM groups WHERE user_name =\''.$username.'\'';
	$row = $newDB->executeStatement($sql);
	$size = count($row);

?>
<!DOCTYPE html>
<html>



<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>




<body>

<br><br>
<div class="container-fluid well span6" style="width:800px; left:5px;">
        <div class="row-fluid">
        <div class="span2" >
                    <img src="" class="img-circle">
        </div>

        <div class="span8">
            <h3><?php echo $user ?></h3>
            <h3>Groups:</h3>
	    <h6>
	    <?php 
		echo "size:".$sizeof;
		echo $row[0];

	    ?>
	    </h6>
        </div>

        <div class="span2">
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                    Action
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="groupAdd.php"><span class="icon-wrench"></span> Create a New Group</a></li>
                    <li><a href="groupDelete.php"><span class="icon-trash"></span> Leave a Group</a></li>
                </ul>
            </div>
        </div>

</div>

</div>
</div>


</body>
</html>
