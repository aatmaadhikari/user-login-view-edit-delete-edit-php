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
<div class="addnew"><a href="add.php">Add Record</a> | <a href="logout.php">Logout</a></div>
<?php 	require_once('config.php'); 	
		$results = mysql_query("SELECT * FROM `soding` ORDER BY `dateCreated` DESC"); //for view
		$datacount= mysql_num_rows($results);
		if($datacount>0){		
?>

<table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Name</td>
            <td>Description</td>
        	<td>dateCreated</td>
            <td>dateUpdated</td>
            <td>Action</td>
        </tr>
        <?php 
        while($result = mysql_fetch_array($results)) {         
            echo "<tr>";
            echo "<td>".$result['name']."</td>";
            echo "<td>".$result['description']."</td>";
            echo "<td>".$result['dateCreated']."</td>";
			echo "<td>".$result['dateUpdated']."</td>";
            echo "<td><a href=\"edit.php?id=$result[id]\">Edit</a> | <a href=\"delete.php?id=$result[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
<?php } else { 

	echo 'No record found please <a href="add.php">Add </a> record';
}
 ?>
</body>
</html>
<?php } else { 

header("Location:login.php");
}
?>