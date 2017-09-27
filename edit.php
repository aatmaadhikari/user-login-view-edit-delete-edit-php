<?php session_start();
if (isset($_SESSION['username'])){
 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Testing Document</title>
<style>
.form-texbox input{
	width:300px;
	margin-bottom:10px;
	
}
.form-textarea textarea{
	width:300px;
}

</style>
</head>

<body>

<?php
require_once('config.php');

// update data 
$id = $_GET['id'];
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
	
	$sql="update".$tbl_name."(name, description) VALUES('".addslashes($name)."', '".addslashes($description)."')";
	$result=mysql_query($sql);
	if($result){
		echo 'Thankyou your message has been sent <a href="index.php">Go to HOme </a>';
		
	} else {
		echo 'Sending error please try again <a href="index.php">Go to HOme </a>';
	}
	
	
	$result = mysql_query("UPDATE ".$tbl_name." SET name='$name',description='$description' WHERE id=$id");
        if($result){
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
		} else {
		echo 'Sending error please try again <a href="add.php">Add record </a>';
	}

}

// get data 	
		if($id!=''){
		  $results = mysql_query("SELECT * FROM `soding` WHERE `id` =$id"); 
		  
		while($result = mysql_fetch_array($results))
			{
				$name = $result['name'];
				$description = $result['description'];
				
			}
			
?>
<div class="addnew"><a href="index.php">View Record</a> | <a href="logout.php">Logout</a></div>
<form id="test_form" role="form"  method="post" action="">
  <div class="form-texbox">
    <input type="text" class="form-control" id="name" Name="name" value="<?php echo $name;?>" >
  </div>
  <div class="form-textarea">
    <textarea type="text" class="form-control" rows="10" id="description" Name="description"> <?php echo $description;?></textarea>
  </div>
  
  <div class="form-submit">
    <div class="ajax-loader text-center" style="display:none;"><img src="assets/img/ajax-loader.gif"></div>
    <br>
    <input type="submit" class="btn btn-lg btn-support" id="submit_form" name="submit" Value="submit">
  </div>
  
</form>

<?php } else { echo 'ID error <a href="index.php">Go to HOme </a>'; } ?>


</body>
</html>

<?php } else { 

header("Location:login.php");
}
?>