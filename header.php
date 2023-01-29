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
						<?php 
							include 'admin/config.php';
                            $querySlogan="SELECT * FROM slo limit 1";
                            $resultSlo=mysqli_query($conn,$querySlogan);
                            $rowSlo = mysqli_fetch_assoc($resultSlo);

                        ?>

<body>
	<div class="headersection templete clear">
		<a href="#">
			<div class="logo">
				<img src="images/logo.png" alt="Logo"/>
				<h2><?php if(!empty($rowSlo['title'])) echo $rowSlo['title']; ?> </h2>
				<p><?php if(!empty($rowSlo['slogan'])) echo $rowSlo['slogan']; ?> </p>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="http://twitter.com/share?text=[TITLE]&url=[URL_FULL]&hashtags=[HASTAG]" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="https://www.google.com" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
			<!-- <div class="searchbtn clear">
			<form action="search.php" method="GET">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" value="Search"/>
			</form>
			</div> -->
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
