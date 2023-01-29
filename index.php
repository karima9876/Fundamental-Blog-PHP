<!DOCTYPE html>
<html>
<head>
	<title>Basic Website</title>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="#">
			<div class="logo">
				<img src="images/logo.png" alt="Logo"/>
				<h2>Website Title</h2>
				<p>Our website description</p>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="http://twitter.com/share?text=[TITLE]&url=[URL_FULL]&hashtags=[HASTAG]" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="https://www.google.com" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="GET">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<ul>
		<li><a id="active" href="index.php">Home</a></li>
		<li><a href="about.php">About</a></li>	
		<li><a href="contact.php">Contact</a></li>
		<li><a href="login.php">Login</a></li>
	</ul>
</div>
	
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


$conn=mysqli_connect("localhost","root","","lifeproject") or die("Not connected".mysqli_error());
$query="SELECT post.post_id,post.title,post.description,post.post_img,post.post_date,post.category,category.category_name,users.username FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN users ON post.author = users.user_id
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
			
			
			
			<?php  include "sidebar.php";?>

		</div>
		
		
	</div>
	<?php  include "footer.php";?>

	
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>