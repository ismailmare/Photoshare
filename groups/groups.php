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
?>

<!DOCTYPE html>
<html>

<head>
  <title>Photoshare - Groups</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script>
    function show() {
      var groupID = document.getElementById('groupID')
      groupID.style.display = 'block';
      groupID.setAttribute("required","true");
    }
    function hide() {
      var groupID = document.getElementById('groupID')
      groupID.style.display = 'none';
      groupID.value=""
      groupID.removeAttribute("required");
    }

    function validateForm()
    {
      var image_date = document.getElementById('datepicker').value;
      if(validDate(image_date)) {
        return true; 
      }
      else{
        alert("Invalid Date Format!");
        return false;
      }

    }
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body background = "../include/images/bgimage.jpg">
<br><br>
<div class="container-fluid well span6" style="width:1000px; left:5px;">
        <div class="row-fluid">
        <div class="span8" style background="grey">
            <h2>Groups You Own</h3>
	    <br></br>

	    <h4 style="text-align:left;float:left;margin-right:300px;">Group Name</h4> 
	    <h4 style="text-align:center;float:left;margin-right:300px;">Group Id</h4> 
	    <h4 style="text-align:right;float:left;right:500px;">Friends</h4> 

	    
	    <?php
		echo "<table border='5'; style='width:100%'>\n";
		foreach ($row as $col) {
    			echo "<tr>\n";
    			foreach ($col as $item) {
        			echo "    <td>".$item."</td>\n";
				$item = intval($item);	
				$sql1 = 'SELECT friend_id FROM group_lists WHERE group_id=\''.$item.'\'';
				$conn = $newDB->getConnection();
        			$stmt = oci_parse ($conn, $sql1);
				//oci_bind_by_name($stmt,':ITEM',$item);
        			oci_execute($stmt);
				echo '<td>';
			 	while (($arr = oci_fetch_row($stmt)) != false) {
					echo $arr['0'];
					echo ', ';
				}
				echo'</td>';
    			}
    			echo "</tr>\n";
		}
		echo "</table>\n";

	    ?>
	    </h6>
        </div>

        <div class="span2">
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" style="width:200px; height=50px; margin-down:5px" data-toggle="dropdown" href="#">
                    Action
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="groupAdd.php"><span class="icon-wrench"></span> Create a New Group</a></li>
                    <li><a href="friendsAdd.php"><span class="icon-trash"></span> Add Friends to a Group</a></li>
                    <li><a href="friendsRemove.php"><span class="icon-trash"></span> Remove Friends from a Group</a></li>
                </ul>
            </div>
        </div>

</div>

</div>
</div>


</body>
</html>
