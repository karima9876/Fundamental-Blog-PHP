<?php

if(isset($_POST['submit'])){
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['pass'];
$recv_file=$_FILES['profile_pic'];
$img_name=$recv_file['name'];
$img_tmp_name=$recv_file['tmp_name'];
$name_changer=uniqid().".png";
if (!empty($img_name)) {
	$loc="uploads/";
	if(move_uploaded_file($img_tmp_name,$loc.$name_changer)){

		header("location:index.php");
	}

	}else{


		"file not found";
	}
 
$conn=mysqli_connect('localhost','root','','users');
// print_r($conn);
if(!$conn){
	die("Not connected.".mysqli_error());
}
$query="INSERT INTO users_info(profile_pic,username,email,password) VALUES('$name_changer','$username','$email','$password')";
//$query.="VALUES('$username','$email','$password')";
// print_r($query);
$result=mysqli_query($conn,$query);
 //print_r($result);
if(!$result){
	die("Not inserted.");
}



}






?>



