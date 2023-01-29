<?php


$conn=mysqli_connect('localhost','root','','users');
// print_r($conn);
if(!$conn){
	die("Not connected.".mysqli_error());
}
if(isset($_REQUEST['submit'])){

$username=$_REQUEST['username'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$hidden=$_REQUEST['updating_hidden_id'];
//print_r($_FILES['profile_pic']);
$recv_file=$_FILES['profile_pic'];

$img_name=$recv_file['name'];
$img_tmp_name=$recv_file['tmp_name'];
$name_changer=uniqid().".png";
$queryImageUpdate="SELECT * FROM users_info WHERE id=$hidden limit 1";
$resultImageUpdate =mysqli_query($conn,$queryImageUpdate);
$countImageUpdate= mysqli_fetch_array($resultImageUpdate);

if (!empty($img_name)) {
	$loc="uploads/";
	
	//print_r($countImageUpdate['profile_pic']);
	unlink($loc.$countImageUpdate['profile_pic']);
	move_uploaded_file($img_tmp_name,$loc.$name_changer);
	
	}else{

		$name_changer=$countImageUpdate['profile_pic'];
		
	}

$update_query="UPDATE   users_info SET username='$username',email='$email',password='$password', profile_pic='$name_changer' WHERE id=$hidden";
$final_update_query=mysqli_query($conn,$update_query);
if ($final_update_query) {
	header("location:index.php?updated");
}
}
?>
