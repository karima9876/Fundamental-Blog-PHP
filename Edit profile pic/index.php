<form action="insert.php" method="post" enctype="multipart/form-data">
	<input type="text" name="username" placeholder="username" required="required">
	<input type="email" name="email" placeholder="email" required="required">
	<input type="password" name="pass" placeholder="password" required="required">
	<input type="file" name="profile_pic" value="upload" required="required">
	<input type="submit" name="submit">

</form>

<?php
$conn=mysqli_connect('localhost','root','','users');
// print_r($conn);
if(!$conn){
	die("Not connected.".mysqli_error());
}
$query="SELECT * FROM users_info";
$adanprodan=mysqli_query($conn,$query);
$count=mysqli_num_rows($adanprodan);

if($count>0){
	if(isset($_REQUEST['updated'])){
		echo "<font color='green'> Data updated </font>";
	}
?>
<!-- <style>
.thead-dark {
  background-color: tomato;
  color: white;
  border: 2px solid black;
  margin: 20px;
  padding: 20px;
}
</style> -->

<br>
<br>
<table class="table" >
	<thead style="background-color:tomato;color:white;" class="thead-dark">
		<tr >
			<th>Serial N0.</th>
			<th>ID</th>
			<th>NAME</th>
			<th>PROFIlES</th>
			<th>EMAIL</th>
			<th>PASSWORD</th>
			<th>ACTION</th>
		</tr>
	</thead>



	<?php
	$serial_number=0;
	while ($row=mysqli_fetch_assoc($adanprodan)) {
		$id=$row['id'];
		$username=$row['username'];
		$profile_pic=$row['profile_pic'];
		$email=$row['email'];
		$password=$row['password'];
		$serial_number++;


		?>
		<tbody>
			<tr>
				<td><?php echo $serial_number; ?></td>
			    <td><?php echo $id; ?></td>
			    <td><?php echo $username; ?></td>
			    <td><img width="50px" src="uploads/<?php echo $profile_pic; ?>"></td>
			    <td><?php echo $email; ?></td>
			    <td><?php echo $password; ?></td>
				<td><a href="single_data_edit.php?edit_data=<?php echo $id; ?>">Edit</a>||



					<a onclick="return confirm('Are you sure?')" 

					href="delete.php?id=<?php echo $id ?>&profile_pic=<?php echo $profile_pic?>">Delete</a></td>
			</tr>
		</tbody>
<?php
	}
	?>

	</table>

	<?php
}else{
	"You don't have any data";

}
?>
