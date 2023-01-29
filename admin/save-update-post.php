<?php
include 'config.php';
//print_r($_FILES['new-image']['name']);
if(empty($_FILES['new-image']['name'])){
	$new_name=$_POST['old-image'];
	$image_name=$new_name;
	//print_r($image_name);

}else{
	//print_r($_FILES['post_image']);
$errors=array();
$file_name=$_FILES['new-image']['name'];
$file_size=$_FILES['new-image']['size'];
$file_tmp=$_FILES['new-image']['tmp_name'];
$file_type=$_FILES['new-image']['type'];
$file_ext= end(explode('.',$file_name ));

$extentions=array("jpeg","jpg","png");
if(in_array($file_ext,$extentions)===false)
{
 $errors[]="not";
}
if($file_size>2097152){
 $errors[]="File size must be 2mb or lower. ";
}

$new_name= time()."-".basename($file_name);
$target="upload/".$new_name;
$image_name=$new_name;
if(empty($errors) == true){
	move_uploaded_file($file_tmp,$target);
}else{
	print_r($errors);
	die();
}
}


$query="UPDATE post SET
title='{$_POST["post_title"]}',description='{$_POST["postdesc"]}',category={$_POST["category"]},
post_img='{$image_name}'
WHERE post_id={$_POST["post_id"]};";
if($_POST['old_category'] != $_POST['category']){
	$query .="UPDATE category SET post=post-1 WHERE category_id={$_POST['old_category']};";
	$query .="UPDATE category SET post=post+1 WHERE category_id={$_POST['category']};";
}
$result=mysqli_multi_query($conn,$query);
if($result){
	header("location:../admin/postlist.php");
}else{
	echo "query failed";
}


?>


