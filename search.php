<?php include "header.php";?>
	
<div class="slidersection templete clear">
        <div id="slider">
            <a href="#"><img src="images/slideshow/01.jpg" alt="nature 1" title="This is slider one Title or Description" /></a>
            <a href="#"><img src="images/slideshow/02.jpg" alt="nature 2" title="This is slider Two Title or Description" /></a>
            <a href="#"><img src="images/slideshow/03.jpg" alt="nature 3" title="This is slider three Title or Description" /></a>
            <a href="#"><img src="images/slideshow/04.jpg" alt="nature 4" title="This is slider four Title or Description" /></a>
        </div>

</div>

	<div class="contentsection contemplete clear">
		<?php

                    include 'admin/config.php';
                    if(isset($_GET['search'])){
                    $search=mysqli_real_escape_string($conn,$_GET['search']);
                    
                    ?>


                   <h2 class="page-heading">Search:<?php echo $search; ?></h2>

<?php
$conn=mysqli_connect("localhost","root","","lifeproject") or die("Not connected".mysqli_error());
$query="SELECT post.post_id,post.title,post.description,post.post_img,post.post_date,post.category,category.category_name,users.username FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN users ON post.author = users.user_id  WHERE post.title LIKE '%{$search}%' or post.description LIKE '%{$search}%'
ORDER BY post.post_id DESC";
 $result=mysqli_query($conn,$query) or die("Query failed.");
$count=mysqli_num_rows($result);

?>		
		
	<div class="maincontent clear">
		<?php
	if($count>0){
    while ($row = mysqli_fetch_assoc($result)) { 


?>
		
	
			<div class="samepost clear">
				<h2><a href='post.php?id=<?php echo $row['post_id'] ?>'><?php echo $row['title'] ?></a></h2>
						<i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $row['post_date'] ?>
						<a class="post-img" href="post.php?id=<?php echo $row['post_id'] ?>"><img src="admin/upload/<?php echo $row['post_img'] ?>" alt=""/></a>
                       <p><?php echo substr($row['description'],0,150)."..."?></p>
						<a class='read-more pull-right' href='post.php?id=<?php echo $row['post_id'] ?>'>read more</a>
				
				
				</div>
				<?php }

                        }else{
                            echo "No record found";
                        }
                        ?>
			
			
			</div>
		<?php } ?>
			
			
			
			<?php  include "sidebar.php";?>

		</div>
		
		
	</div>
	<?php  include "footer.php";?>

	
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>