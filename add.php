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
<div class="addnew"><a href="index.php">View Record</a> | <a href="logout.php">Logout</a></div>
<form id="test_form" role="form"  method="post" action="form_submit.php">
  <div class="form-texbox">
    <input type="text" class="form-control" id="name" Name="name" placeholder="Name" >
  </div>
  <div class="form-textarea">
    <textarea type="text" class="form-control" rows="10" id="description" Name="description" placeholder="Description"></textarea>
  </div>
 
  
  <div class="form-submit">
    <div class="ajax-loader text-center" style="display:none;"><img src="assets/img/ajax-loader.gif"></div>
    <br>
    
    <input type="submit" class="btn btn-lg btn-support" id="submit_form" name="submit" Value="submit">
  </div>
  
</form>

</body>
</html>
<?php } else { 

header("Location:login.php");
}
?>