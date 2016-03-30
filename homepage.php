<?php
session_start();
require_once "../setup.php";

if(isset($_SESSION['admin'])){
require_once "../headerAdmin.php";
}

else{
require_once "../header.php";
}
?>

