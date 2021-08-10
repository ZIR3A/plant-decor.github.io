<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html>
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
						<a href="cart.php">Goto  Cart</a>
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
			<div class="navbar-header">
				<a class="navbar-brand home" href="index.php">
				<img src="images/2.png"  alt="Plant Decor" style="width:45px;height:41px; margin: 0px;" class="visible-lg"><!--  logo for pc big and mob small-->
			
					<img src="images/logo222.png" alt="Plant Decor" style="width:45px;height:45px; margin: 0px;" class="visible-xs"><!--small pic for mob view-->
				</a>

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only"> Toggle Navigation</span>
					<i class="fa fa-align-justify"> </i>
				</button>

							
			</div>

			<div class="navbar-collapse collapse" id="navigation"> <!--navbar-header-start-->
				<div class="padding-nav"><!--paading  nav  start-->
					<ul class="nav navbar-nav navbar-left">
						<li >
							<a href="index.php" >Home</a>
						</li>
						<li class="active">
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
						<li>
							<a href="Contactus.php">Contact Us</a>
						</li>
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

				</div><!--paading  nav  ending-->

				


				
					

				
			</div><!--navbar-header-end-->
		</div>	
	</div><!-- navigation bar end-->


<div id="content">
	<div class="container"><!--Container start-->
		<div class="col-md-12"><!--col-md-12 start-->
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li>
					Shop
				</li>
			</ul>
		</div><!--col-md-12 end-->
		

			<div class="col-md-3">
			<?php 
				include("includes/sidebar.php");
			?>
		</div>
		<div class="col-md-9"><!--col-md-9 start-->
			<?php
			if(!isset($_GET['p_cat'])){
				echo "<div class='box'>
			<h1>Shop</h1>
				<p>We Are Mediator Between Farmers And Consumers.<br>
					 We Supply Organic Products:  Home Decorative Plants.
					 We promote Local Farmers Products.
					 </p>


			</div>";
			}
			?>




			<div class="row"><!--Row start-->
				<?php
				if(!isset($_GET['p_cat']))
				{
					$per_page=6;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}
					else{
						$page=1;
					}
					$start_from=($page-1) * $per_page;
					$get_product="select * from product order by RAND() LIMIT $start_from, $per_page";
					$run_pro=mysqli_query($con,$get_product);
					while ($row=mysqli_fetch_array($run_pro)) {

						$pro_id=$row['p_id'];
						$pro_title=$row['p_title'];
						$pro_price=$row['p_price'];						
						$pro_img1=$row['p_image1'];						
						
						echo"
						
						<div class='col-md-4 col-sm-6 center-responsive'>
						<div class='product'>
						<a href='details.php?pro_id=$pro_id'> 
						<img src='admin_area/product_images/$pro_img1' class='img-responsive center-responsive' style='height:300px; object-fit: fill; display: block;
							margin-left: auto;
							margin-right: auto;
							width: 100%;
	    					overflow: hidden;'>

						</a>
						<div class='text'>
						<h3 style ='font-size: 13px; text-align:left; font-weight:bold;'><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
						<p class='price'> NPR $pro_price</p>
						<p class='buttons'>
						<a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
						<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add To Cart</a>
						</p>
						</div>
						</div>
						</div>
		    	";				
					}
				}
				?>

				
			</div><!--Row end-->
			
			<div class="row"><!--pagination function call-->
					
				<?php
				getPcatpro()
				?>
				</div>
			<center>
				<ul class="pagination">
					<?php

					$per_page=6;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}
					else{
						$page=1;
					}
					
				
						
					$start_from=($page-1) * $per_page;
					$query="select * from product";
					$result=mysqli_query($con,$query);
					$total_record=mysqli_num_rows($result);
					$total_pages=ceil($total_record/$per_page);
					echo"
					<li><a href='shop.php?page=1'><i class='fas fa-angle-double-left'></i> ".'First Page'."</a></li>
					";
					for($i=1; $i<=$total_pages; $i++){
					echo "
					<li><a href='shop.php?page=".$i."'>".$i."</a></li>
					";
					}
					echo "
					<li><a href='shop.php?page=$total_pages'> ".'Last Page'." <i class='fas fa-angle-double-right'></i></a></li>
					";
					?>
				</ul>

	</div><!--Container end-->
	

			</center>
			
				
			


		</div> <!--col-md-9 end-->

				
</div>







<!--Footer start-->
<?php 
include("includes/footer.php");
?>

<!--Footer end-->

		<!--JS  cdn-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>