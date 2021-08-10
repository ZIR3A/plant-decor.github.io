
<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>

<?php
if (isset($_GET['pro_id'])) {
	$pro_id=$_GET['pro_id'];
	$gets_product="select * from product where p_id='$pro_id'";
	$run_product=mysqli_query($con,$gets_product);
	$row_product=mysqli_fetch_array($run_product);
	$p_cat_id=$row_product['p_cat_id'];
	$pro_title=$row_product['p_title'];
	$pro_price=$row_product['p_price'];
	$pro_desc=$row_product['p_desc'];
	$pro_image1=$row_product['p_image1'];
	$pro_image2=$row_product['p_image2'];
	$pro_image3=$row_product['p_image3'];
	$get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
	$run_p_cat=mysqli_query($con,$get_p_cat);
	$row_p_cat=mysqli_fetch_array($run_p_cat);
	$p_cat_id=$row_p_cat['p_cat_id'];
	$p_cat_title=$row_p_cat['p_cat_title'];



}


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
						<li>
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
						
					
						 <li class="visible-xs-block"><a href="Contactus.php">Contact Us</a></li>
                   		 <li class="pull-right visible-lg-block "><a href="Contactus.php">Contact Us</a></li>
                   		 

					</ul>	

				</div><!--paading  nav  ending-->

				



				
			</div><!--navbar-header-end-->
		</div>	
	</div><!-- navigation bar end-->
		
			

	<div id="content"> <!-- content start -->
		<div class="container"><!--Container start-->
			<div class="col-md-12"><!--col-md-12 start-->
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li>
						Shop
					</li>
					<li><a href="shop.php?p_cat_i=<?php echo $p_cat_id;?>"><?php echo $p_cat_title ?></a></li>
					<li><?php echo $pro_title ?></li>




				</ul>
			</div><!--col-md-12 end-->
			<div class="col-md-3">
				<?php 
					include("includes/sidebar.php");
				?>
			</div> <!--col-md-3 end-->

	        <div class="col-md-9"> <!-- col-md-9  start -->
	            <div class="row" id="productmain"><!-- row start -->
	                <div class="col-sm-6"><!--col-sm-6 slider start-->
	                    <div id="mainimage">
	                        <div id="mycarousel" class="carousel slide" data-ride="carousel"><!--image  slider start-->
	                            <ol class="carousel-indicators">
	                                <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
	                                <li data-target="#mycarousel" data-slide-to="1"></li>
	                                <li data-target="#mycarousel" data-slide-to="2"></li>
	                            </ol>
	                            <div class="carousel-inner"><!-- carousel inner start-->
	                                <div class="item active">
	                                    <center>
	                                        <img src="admin_area/product_images/<?php echo $pro_image1 ?>" class="img-responsive">
	                                    </center>
	                                </div>
	                                <div class="item">
	                                	<center>
	                                		<img src="admin_area/product_images/<?php echo $pro_image2 ?>" class="img-responsive">
	                                	</center>
	                                </div>

	                                <div class="item">
	                                	<center>
	                                		<img src="admin_area/product_images/<?php echo $pro_image3 ?>" class="img-responsive">
	                                	</center>
	                                </div>

	                            </div><!-- carousel inner end-->


								<!--Slider  created  for shop items-->

	                            <a href="#mycarousel" class="left carousel-control" data-slide="prev">
	                            	<span class="glyphicon glyphicon-chevron-left"></span>                        		
	                            	<span class="sr-only">Previous</span>
	                            </a>

	                            <a href="#mycarousel" class="right carousel-control" data-slide="next">
	                            	<span class="glyphicon glyphicon-chevron-right"></span>                        		
	                            	<span class="sr-only">Next</span>
	                            </a>
	                        </div><!--image  slider end-->  
	                    </div>
	                </div><!--col-sm-6 slider end-->





	                    
	                
	                <div class="col-sm-6"> <!-- col-sm-6 start -->
	                	<div class="box"><!--Product Box start-->
	                		
	                		<h1 class="text-center"><?php echo $pro_title ?></h1>



	                		<?php
	                		addCart();
	                		?>

	                		<form action="details.php?add_cart=<?php echo $pro_id ?>" method="post" class="form-horizontal">  <!--Form start-->

	                			<div class="form-group"><!--form group 1-->
	                				<label class="col-md-5 control-label">Quantity</label>
	                				<div class="col-md-7">
	                				<input type="number" name="product_qty" class="form-control" value="<?php echo $product_qty ?>" min="1">
	                				</div>
	                			</div>

	                			<div class="form-group"><!--form group 2-->
	                				<label class="col-md-5 control-label">Choose height</label>
	                				<div class="col-md-7">
	                					<select name="choose_height" class="form-control" required="">
	                						
	                						
	                						<option value="">None</option>
										    <option value="10-20cm">Small</option>
										    <option value="20cm and above">Large</option>
										   
	                					</select>
	                				</div>
	                			</div>

	                			<p class="prices" style="margin-left: 95px">NPR <?php echo $pro_price; ?></p>
	                			<p class="text-center buttons">
	                				<button class="btn btn-primary" type="submit">
	                					<i class="fa fa-shopping-cart"></i>Add to Cart
	                				</button>
	                			</p>
	                		</form><!--Form end-->
	                	</div><!--Product Box end-->
	                	

	                <div class="col-md-12 col-xs-12" id="border">
				<div class="box">

	    		<h1  class="box" style="border-style: groove;">Description</h1>
	                	
	            <p class="center-responsive"><?php echo $pro_desc ?></p>
	     
	   	</div>
	 </div>




	            </div>    <!-- productmain end -->	 
        
	      
	            
	

	   	

			

		    </div><!--col-md-3 end-->
	    </div> <!-- container  end -->
	</div> <!-- Content  end -->
</div> <!-- col-md-9 end -->


<!--Footer start-->
<?php 
include("includes/footer.php");
?>

<!--Footer end-->

		<!--JS  cdn-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>