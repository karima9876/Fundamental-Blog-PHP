<?php
   session_start();
  if (isset($_SESSION['username'])) {
       header("location:admin/postlist.php");
   }
?> 
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/><br><br>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/><br><br>
			</div>
			<div>
				<input type="submit" name="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<?php
if(isset($_POST['submit'])){
$conn=mysqli_connect("localhost","root","","lifeproject");
$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=$_POST['password'];
$query = "SELECT user_id,username,role FROM users WHERE username='{$username}' AND password='{$password}'";
$result = mysqli_query($conn,$query) or die("Query failed.");
if(mysqli_num_rows($result)>0){
while ($row = mysqli_fetch_assoc($result)) {
session_start();
$_SESSION['username']=$row['username'];
$_SESSION['user_id']=$row['user_id'];
$_SESSION['role']=$row['role'];
// header('location: login.php');
header('location:admin/postlist.php');
}

}else{
echo "Username and Password  are not matched";

}
}

?>
		
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>