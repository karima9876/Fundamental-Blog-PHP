

<?php include "header.php";?>

	
		<?php 

		$conn=mysqli_connect("localhost","root","","lifeproject") or die("Not connected".mysqli_error());

$post_id=$_GET['id'];

  $query="SELECT post.post_id,post.title,post.description,post.post_img,post.post_date,post.category,category.category_name,users.username,post.author FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN users ON post.author = users.user_id
WHERE post.post_id={$post_id}";
       
       $result=mysqli_query($conn,$query) or die("Query failed.");
		$row=mysqli_fetch_assoc($result);


?>

<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			
			
			
        <div class="about">
				
		
				<h2><a href="#"><?php echo $row['title'] ?></a></h2>
				<h4><?php echo $row['post_date'] ?>, By <a href="#"><?php echo $row['username'] ?></a></h4>
				 <a href="#"><img src="admin/upload/<?php echo $row['post_img'] ?>"></a>
				<p><?php echo $row['description'] ?></p>
				

								
	
		
				<div style="margin-top: 50%" class="relatedpost clear">
					<h2>Related articles</h2>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
				</div>

	</div>
	</div>


		<?php  include "sidebar.php";?>
		</div>

		
	
		
	<?php  include "footer.php";?>

</body>
</html>