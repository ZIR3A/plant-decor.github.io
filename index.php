<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Plant Shop</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!--link style sheet-->
<link rel="stylesheet" href="styles/style.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<!-- font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />




</head>
<body>

	<div id="top"> <!-- TOP  BAR STARTING-->
		<div class="container"><!-- container start-->
			<div class="col-md-6 offer"><!-- container start offer-->
				<a href="./customer/my_account.php?my_order" class="btn  btn-success btn-sm"> <?php
					if(!isset($_SESSION['c_email'])){
						echo "Welcome Guest";
					}else{
						echo "Welcome: ".$_SESSION['c_email']. "";
					}

					?></a>
				<a href="cart.php">Total Cart Price: NPR <?php totalPrice(); ?>, Total Items: <?php item(); ?></a>
				
			</div><!-- container end offer-->

			<div class="col-md-6">
				<ul  class="menu">
					<li>
						<a href="registration.php">Register</a>
					</li>
					<li>
						<?php
						if (!isset($_SESSION['c_email'])) {
							echo "<a href='checkout.php'>My Account</a>";
						}else{
							echo "<a href='customer/my_account.php?my_order'>My Account</a>";
						}
						?>
					</li>
					<li>
						<a href="cart.php">Goto Cart</a>
					</li>
					<li>
						<?php
						if (!isset($_SESSION['c_email'])) {
							echo "<a href='checkout.php'>Login</a>";
						}else{
							echo "<a href='logout.php'>Log Out</a>";
						}


						?>
					</li>
					

				</ul>
				

			</div>

		</div><!-- container end-->

	</div> <!-- TOP  BAR ENDING-->


	<div class="navbar navbar-default" id="navbar"> <!-- navigation bar start-->
		<div class="container">
			
			
				
				
				<a class="navbar-brand home" href="index.php">
					
					<img src="images/2.png"  alt="Plant Decor" style="width:45px;height:41px; margin: 0px;" class="visible-lg"><!--  logo for pc big and mob small-->
			
					<img src="images/logo222.png" alt="Plant Decor" style="width:45px;height:45px; margin: 0px;" class="visible-xs"><!--small pic for mob view-->
				
				</a>
			
				
				
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only"> Toggle Navigation</span>
					<i class="fa fa-align-justify"> </i>
				</button>

				

			
			<div class="navbar-collapse collapse" id="navigation"> <!--navbar-header-start-->
				<div class="padding-nav"><!--paading  nav  start-->
				
					<ul class="nav navbar-nav navbar-left">
						<li class="active">
							<a href="index.php" >Home</a>
						</li>

						<li>
							<a href="shop.php">Shop</a>
						</li>
						<li>
								<?php
						if (!isset($_SESSION['c_email'])) {
							echo "<a href='checkout.php'>My Account</a>";
						}else{
							echo "<a href='customer/my_account.php?my_order'>My Account</a>";
						}
						?>
						</li>
						<li>
							<a href="cart.php">Shopping cart</a>
						</li>
						 <li class="visible-xs-block"><a href="Contactus.php">Contact Us</a></li>
                   		 <li class="visible-lg-block "><a href="Contactus.php">Contact Us</a></li>
						<li>
						<form id="search2" method="get" action="search.php?search">
						
							<input type="text" name="user_query" placeholder="Search" class="form-control" required="">
							<button type="submit" value="Search" name="search" class="btn btn-dark">
								<i class="fa fa-search ">
								</i>
							</button>
						</form>
                   		 </li>
                   		 


					</ul>
					
					</div>

					
				
			</div><!--navbar-header-end-->
		</div>	
	</div><!-- navigation bar end-->





	<div class="container" id="slider" > <!--container start-->
		<div class="col-md-12"><!-- col-md -12 start-->
			<div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- slider start-->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
								<li data-target="#myCarousel" data-slide-to="3"></li>
				</ol>

				<div class="carousel-inner"> <!-- slider inner-->
					<?php
					$get_slider= "select * from slider LIMIT 0,1";
					$run_slider= mysqli_query($con,$get_slider);
					while ($row= mysqli_fetch_array($run_slider)){
						$slider_name=$row['slider_name'];
						$slider_image=$row['slider_image'];
						echo "<div class='item active'>

						<img src='admin_area/slider_images/$slider_image'>

						</div>
						";
					}

					?>
					 <?php 

					 $get_slider="select * from slider LIMIT 1,3";
					 $run_slider= mysqli_query($con,$get_slider);
					 while ($row= mysqli_fetch_array($run_slider)){
						$slider_name=$row['slider_name'];
						$slider_image=$row['slider_image'];
						echo "<div class='item'>

						<img src='admin_area/slider_images/$slider_image'>

						</div>
						";
					}
					 ?>
				</div> <!-- slider inner end-->
				<a href="#myCarousel" class="left carousel-control" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only"> Previous </span>
				</a>
				
				<a href="#myCarousel" class="right carousel-control" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only"> Next </span>
				</a>


			</div> <!-- slider end-->
			
		</div><!-- col-md-12 end-->	

	</div><!-- container end-->

	<div id="advantage"><!-- advantage start-->
		<div class="container"><!--container start-->
			<div class="same-height-row"><!--same height start-->
				<div class="col-sm-4"><!--col-sm-4  start-->
					<div class="box same-height"><!--box same  -height start-->
						<div class="icon">
							<i class="fa fa-heart"></i>
						</div>
						<h3><a href="#"> BEST QUALITY </a></h3>
							<p>ahsduhasuidua</p>
					</div><!--box same  -height end-->
				</div><!--col-sm-4  end-->
				<div class="col-sm-4"><!--col-sm-4  start-->
					<div class="box same-height"><!--box same  -height start-->
						<div class="icon">
							<i class="fa fa-heart"></i>
						</div>
						<h3><a href="#"> BEST Prices</a></h3>
							<p>ahsduhasuidua</p>
					</div><!--box same  -height end-->
				</div><!--col-sm-4  end-->
				<div class="col-sm-4"><!--col-sm-4  start-->
					<div class="box same-height"><!--box same  -height start-->
						<div class="icon">
							<i class="fa fa-heart"></i>
						</div>
						<h3><a href="#">Best products</a></h3>
							<p>ahsduhasuidua</p>
					</div><!--box same  -height end-->	
				</div><!--col-sm-4  end-->				
			</div><!--same height end-->
		</div><!--container end-->
	</div><!-- advantage  end-->

	<div id="hot"><!--hot  start-->
		<div class="box">
			<div class="container">
				<div class="col-md-12">
					<h2> New plants </h2>	
				</div>
			</div>
		</div>
	</div><!--hot end-->

	<div id="content" class="container" >
		
			<div class="row"><!--Product start-->	
				<?php
				getpro();
				?>
			</div><!--Product END-->
		
	</div>


<!--Footer start-->

<?php 
include("includes/footer.php")
?>

<!--Footer end-->

		<!--JS  cdn-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>