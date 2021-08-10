
<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
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
						<li >
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
						<li class="active">
							<a href="cart.php">Shopping cart</a>
						</li>
					
						</li>
						 <li class="visible-xs-block"><a href="Contactus.php">Contact Us</a></li>
                   		 <li class="pull-right visible-lg-block "><a href="Contactus.php">Contact Us</a></li>
                   		 

					</ul>	

				</div><!--paading  nav  ending-->

				


				
			</div><!--navbar-header-end-->
		</div>	
	</div><!-- navigation bar end-->
	



		<div id="content">
			<div class="container"><!--Container start-->
				<div class="col-md-12"><!--col-md-12 start-->
					<ul class="breadcrumb">
						<li><a href="home.php">Home</a></li>
						<li>
							Cart
						</li>
					</ul>
				</div><!--col-md-12 end-->

				<div class="col-md-12" id="cart"><!--col-md-9 start-->
					<div class="box">
						<form action="cart.php" method="post" enctype="multipart-form-data">

							<h1>Shopping Cart</h1>
							<?php
							$ip_add=getUserIP();
							$select_cart="select * from cart where ip_add='$ip_add'";
							$run_cart=mysqli_query($con,$select_cart);
							$count= mysqli_num_rows($run_cart);
							?>
							<p class="text-muted">Currently You Have <?php echo $count ?> item(s) in your cart</p>
							<div class="table-responsive"><!--Table responsive start-->
								<table class="table">
									<thead>
										<tr>
											<th colspan="1">Product Image</th>
											<th >Product Title</th>
											<th>Quantity</th>
											<th>Height</th>
											<th>Unit Price</th>
											<th colspan="1">Delete</th>
											<th colspan="1">Sub Total</th>
										</tr>
									</thead>
									<tbody>

										<?php
										$total=0;
										while ($row=mysqli_fetch_array($run_cart)) {
											$pro_id=$row['p_id'];
											$pro_qty=$row['qty'];
											$pro_height=$row['height'];
											$get_product="select * from product where p_id='$pro_id'";
											$run_product=mysqli_query($con,$get_product);
											while ($row=mysqli_fetch_array($run_product)) {
												
											$pro_title=$row['p_title'];
											$pro_image=$row['p_image1'];
											$pro_price=$row['p_price'];
											$sub_total=$row['p_price']*$pro_qty;	
																	
											?>
										<tr>
											<td><img src="admin_area/product_images/<?php echo $pro_image?>"></td>
											<td><?php echo $pro_title?></td>
											<td><?php echo $pro_qty?></td>
											<td><?php echo $pro_height?></td>
											<td><?php echo $pro_price?></td>
											<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id?>"></td>
											<td><?php echo $sub_total?></td>
										</tr>

									<?php }  } ?>
										
									
										

									</tbody>
									<tfoot>
									
										<tr>

											<th colspan="6">Total</th>
											<th colspan="1">NPR <?php echo totalPrice()?> <th>
										</tr>
									</tfoot>
								</table>
							</div><!--Table responsive end-->
							<div class="box-footer">
								<div class="pull-left"><!--pull left start-->
									<a href="shop.php" class="btn btn-default">
										<i class="fa fa-chevron-left"></i> Continue Shopping
									</a>
								</div><!--pull left end-->
								<div class="pull-right">
									<button class="btn btn-default" type="submit" name="update" value="Update Cart">
									<i class="fas fa-sync"></i></i> Update Cart
									</button>
										<?php

						
										if($count==0){
											echo "
													<a href='shop.php' class='btn btn-primary'>
										Proceed to Check Out <i class='fa fa-chevron-right'></i>
										</a>

											";
										}else {
											echo "
											<a href='checkout.php' class='btn btn-primary'>
										Proceed to Check Out <i class='fa fa-chevron-right'></i>
									</a>";
										}



										?>

								</div>
							</div>

						</form>
						
					</div>

					<?php 
					function update_cart(){
						global $con;
						if(isset($_POST['update'])){
							foreach ($_POST['remove'] as $remove_id) {
								$delete_pro="delete from cart where p_id='$remove_id'";
								$run_del=mysqli_query($con,$delete_pro);
								if($run_del){
									echo "<script>window.open('cart.php','_self')</script>";
								}
							}
						}
					}
					echo @$up_cart=update_cart();
					?>


								<div id="row same-height-row"><!--same row height  row start-->
					    <div class="col-md-12 col-sm-6">
					    	<div class="box same-height headline"><!--other product list start-->
					    		<h3 class="text-center"><i class="far fa-thumbs-up"></i>  You May also like these products</h3>
					    	</div><!--other product list start-->
					    </div>
						<div class="row">
					    <?php
		    $get_product="select * from product order by RAND() LIMIT 0,4";
		    $run_product=mysqli_query($con,$get_product);
		    while ($row=mysqli_fetch_array($run_product)) {
		    	$pro_id=$row['p_id'];
		    	$pro_title=$row['p_title'];
		    	$pro_price=$row['p_price'];
		    	$pro_image=$row['p_image1'];
		    	echo "
				<div class='col-md-3 col-sm-6 center-responsive'>
				<div class='product'>
				<a href='details.php?pro_id=$pro_id'> 
				<img src='admin_area/product_images/$pro_image' class='img-responsive center-responsive' style='height:300px; object-fit: fill; display: block;
					margin-left: auto;
					margin-right: auto;
					width: 100%;
					overflow: hidden;'>

				</a>
				<div class='text'>
				<h3 style ='font-size: 13px; text-align:left; font-weight:bold;'><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
				<p class='price'> NPR $pro_price</p>
				<p class='buttons'>
				<a href='details.php?pro_id=$pro_id' class='btn btn-default'><i class='fas fa-info'></i>   View Details</a>
				<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
				</p>
				</div>
				</div>
				</div>
		";
		    	
		    }

		    ?> 
			</div>

					
				</div><!--col-md-9 end-->
				
			
			</div>
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