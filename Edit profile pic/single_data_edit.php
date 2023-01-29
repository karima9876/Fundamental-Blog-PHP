<?php
$conn=mysqli_connect('localhost','root','','users');
// print_r($conn);
if(!$conn){
	die("Not connected.".mysqli_error());
}
if(isset($_REQUEST['edit_data'])){

	$recvd_id=$_REQUEST['edit_data'];
	$get_info="SELECT * FROM users_info WHERE id=$recvd_id";
	$select_info=mysqli_query($conn,$get_info);
	$row=mysqli_fetch_assoc($select_info);
		?>
		<form action="update_data.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="updating_hidden_id" value="<?php echo $recvd_id;?>">
	<input type="text" name="username"  value="<?php if(!empty($row['username'])) echo $row['username'];?>" placeholder="username" required="required">
	<input type="email" name="email" value="<?php if(!empty($row['email'])) echo $row['email'];?>" placeholder="email" required="required">
	<input type="password" name="password" value="<?php if(!empty($row['password'])) echo $row['password'];?>" placeholder="password" required="required">

	<img width='80px' height='80px' style='margin-top:5px' src="uploads/<?php echo $row['profile_pic'];?>">
	<input type="file" name="profile_pic" value="" >
	<input type="submit" name="submit" value="Update Data">


</form>



		<?php
	
}


?>






