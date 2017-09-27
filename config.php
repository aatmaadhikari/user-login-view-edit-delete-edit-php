<?php
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'solution';
	$tbl_name="soding";
	$conn = mysql_connect($host,$user,$password) or die('Error: Could not connect to database - '.mysql_error());
			mysql_select_db($database,$conn) or die ('Failed to connect to MySQL:  '.mysql_error());
?>
