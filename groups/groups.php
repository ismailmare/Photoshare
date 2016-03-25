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
	$row = $newDB->executeStatementAlt($sql);
	$size = count($row);
	echo $size;

?>
<!DOCTYPE html>
<html>



<head>
  <title>Photoshare-Groups</title>
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
            <h2>Groups:</h3>
	    <br></br>

	    <h4 style="text-align:left;float:left;">Group Name</h4> 
	    <h4 style="text-align:right;float:right;">Group Id</h4> 


	    <h6>
	    <?php
		echo "<table border='5'; style='width:100%'>\n";
		foreach ($row as $col) {
    			echo "<tr>\n";
    			foreach ($col as $item) {
        			echo "    <td>".($item !== null ? htmlentities($item, ENT_QUOTES) : "")."</td>\n";
    			}
    			echo "</tr>\n";
		}
		echo "</table>\n";

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
                    <li><a href="friendsAdd.php"><span class="icon-trash"></span> Add Friends to a Group</a></li>
		    <li><a href="groupLeave.php"><span class="icon-trash"></span> Leave a Group</a></li>
		    <li><a href="groupDelete.php"><span class="icon-trash"></span> Delete Group</a></li>

                </ul>
            </div>
        </div>

</div>

</div>
</div>


</body>
</html>