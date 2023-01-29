<?php 
if(isset($_POST['submit'])){
include 'admin/config.php';

$fname=mysqli_real_escape_string($conn,$_POST['firstname']);
$lname=mysqli_real_escape_string($conn,$_POST['lastname']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
// $password=mysqli_real_escape_string($conn,md5($_POST['password']));
 $body=mysqli_real_escape_string($conn,$_POST['body']);

$query="SELECT body FROM contact WHERE body='$body'";

$result=mysqli_query($conn,$query) or die("Query failed.");
$count=mysqli_num_rows($result);

if($count>0){
echo "Text already exists.";
}else{
$query1 ="INSERT INTO contact(firstname,lastname,email,body)
VALUES('$fname','$lname','$email','$body')";
//print_r($query1);
$result=mysqli_query($conn,$query1);

if($result){
  $_SESSION['MSG']="Successfully Message Sent";
 // echo $_SESSION['MSG'];

}else{
	 $_SESSION['MSG']="Message Not Sent";
	 // echo $_SESSION['MSG'];
}
//header("location:contact.php");
}
}
?>
<?php  include "header.php";?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

			<h2 style="color: red">
					<?php if (!empty($_SESSION['MSG'])) {
				echo $_SESSION['MSG'];
				}  ?>

			   </h2>
			<div class="about">
				<h2>Contact us</h2>
				
				
			<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" required="1"/>
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" required="1"/>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="email" name="email" placeholder="Enter Email Address" required="1"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>

		<?php  include "sidebar.php";?>
		
	</div>

	<?php include "footer.php";?>
</body>
</html>