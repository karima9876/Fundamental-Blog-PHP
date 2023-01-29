<?php


$conn=mysqli_connect('localhost','root','640087@m','users');
// print_r($conn);
if(!$conn){
	die("Not connected.".mysqli_error());
}
$recv=$_REQUEST['id'];
$recv_img_file=$_REQUEST['profile_pic'];


$query="DELETE  FROM users_info WHERE id=$recv";
$run_delete_query=mysqli_query($conn,$query);
if ($run_delete_query) {
	unlink("uploads/$recv_img_file");
	header("location:index.php?deleted");
}
?>
