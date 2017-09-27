<?php  //Start the Session
session_start();
require('config.php');
if (isset($_POST['username']) and isset($_POST['password'])){
$username = $_POST['username'];
$password = $_POST['password'];
$result = mysql_query("SELECT * FROM `user` WHERE username='$username' and password='$password'");
echo $count = mysql_num_rows($result); 

if ($count == 1){
$_SESSION['username'] = $username;
}else{

$fmsg = "Invalid Login Credentials.";
}
}

if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
header("Location:index.php");
 
}else{

?>
<html>
<head>
	<title>User Login </title>
	

</head>
<body>
 
<div class="container">
      <form class="form-signin" method="POST">
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <h2 class="form-signin-heading">Please Login</h2>
        <div class="input-group">
	 
	  <input type="text" name="username" class="form-control" placeholder="Username" required>
	</div>
        <div class="input-group">
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    
      </form>
</div>
 
</body>
 
</html>
<?php } ?>