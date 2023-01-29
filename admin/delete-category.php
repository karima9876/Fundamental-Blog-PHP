<?php 
include 'config.php';
// if($_SESSION['role'] == '0') {
//    header("location:post.php");
//        }

$rcv_id=$_GET['id'];
$query="DELETE FROM  category WHERE category_id = '{$rcv_id}'";
$result=mysqli_query($conn,$query);
if($result){

	header("location:catlist.php");
}else{
	"Can't Delete category.";
}
mysql_close($conn);






 ?>