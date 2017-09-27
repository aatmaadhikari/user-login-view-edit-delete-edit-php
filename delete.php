<?php 
session_start();
if (isset($_SESSION['username'])){
//including the database connection file
include("config.php");
 
//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table
$result = mysql_query("DELETE FROM ".$tbl_name." WHERE id=$id");
if($result){
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
	} else {
		echo 'Delete error please try again <a href="index.php">View Record</a>';
	}
}

?>