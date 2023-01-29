<?php


$conn=mysqli_connect("localhost","root","","lifeproject") or die("Not connected".mysqli_error());
$query="SELECT post.post_id,post.title,post.description,post.post_img,post.post_date,post.category,category.category_name,users.username FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN users ON post.author = users.user_id
ORDER BY post.post_id DESC";
$result =mysqli_query($conn,$query);
$result2 =mysqli_query($conn,$query);
//print_r($result2 );
?>


<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
					<ul>
						<?php
while ($rows = mysqli_fetch_assoc($result2)) { 
?>
						 <li><a href=""><?php echo $rows['category_name'] ?></a></li>
							<?php } ?>
									
					</ul>
			</div>
			<div class="samesidebar clear">
				<h2>Popular articles</h2>
				<?php

while ($row = mysqli_fetch_assoc($result)) { 
	
?>
					<div class="popular clear">
						<h3><a href='post.php?id=<?php echo $row['post_id'] ?>'><?php echo $row['title'] ?></a></h3>
						<i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $row['post_date'] ?>
						<a class="post-img" href="post.php?id=<?php echo $row['post_id'] ?>"><img src="admin/upload/<?php echo $row['post_img'] ?>" alt=""/></a>
                        
						<p><?php echo substr($row['description'],0,150)."..."?></p>
						<a class='read-more pull-right' href='post.php?id=<?php echo $row['post_id'] ?>'>read more</a>	
					</div>
				<?php } ?>
					
					
			</div>
			
		</div>
	