<?php 
include 'config.php';
$rcv_id=$_GET['id'];
$query="DELETE FROM users WHERE user_id = '{$rcv_id}'";
$result=mysqli_query($conn,$query);
if($result){

	header("location:userlist.php");
}else{
	"Can't Delete User.";
}
mysql_close($conn);






 ?>