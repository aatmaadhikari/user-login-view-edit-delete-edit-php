<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Submit New data</title>
</head>

<body>
<?php
require_once('config.php');
if(isset($_POST['name']) && !empty($_POST['name'])) {
	
	$name=addslashes($_POST['name']);
	
	if(isset($_POST['description']))
	{
		$description=addslashes($_POST['description']);
	}
	else
	{
		$description=false;
	}
	$dateCreated =  date("Y-m-d h:i:s");
	
	$sql="INSERT INTO ".$tbl_name."(name, description) VALUES('".addslashes($name)."', '".addslashes($description)."')";
	$result=mysql_query($sql);
	if($result){
		echo 'Thankyou your message has been sent <a href="index.php">Go to HOme </a>';
		
	} else {
		echo 'Sending error please try again <a href="index.php">Go to HOme </a>';
	}

}
?>
</body>
</html>