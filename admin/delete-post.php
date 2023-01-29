<?php 
include 'config.php';

$post_id=$_GET['id'];
$category_id=$_GET['catid'];
$query1="SELECT * FROM  post WHERE post_id = {$post_id}";
$result=mysqli_query($conn,$query1) or die("Query failed: Select");
$row=mysqli_fetch_assoc($result);


// unlink("upload/".$row['post_img']);
$query="DELETE FROM  post WHERE post_id = {$post_id}";
$result=mysqli_multi_query($conn,$query);
$query = "UPDATE category SET post = post-1 WHERE category_id={$category_id}";
if(mysqli_multi_query($conn,$query)){
     unlink("upload/".$row['post_img']);
	header("location:postlist.php");
}else{
	echo "Can't Delete Post.";
}

 ?>