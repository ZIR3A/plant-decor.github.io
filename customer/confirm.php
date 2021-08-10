<?php
session_start();
if (!isset($_SESSION['c_email'])) {
	echo "<script>window.open('../checkout.php','_self')</script>";
}else{



include("includes/db.php");
include("../functions/functions.php");
if (isset($_GET['order_id'])) {
	$order_id = $_GET['order_id'];
	 
	$get_order = "select  * from customer_order where order_id = '$order_id'";
	$run_q = mysqli_query($con, $get_order);
	$row_q= mysqli_fetch_array($run_q);
	$cid = $row_q['customer_id'];
	$cname = $row_q['c_name'];
	$p_title = $row_q['p_name'];
	$p_qty = $row_q['qty'];
	$invoice = $row_q['invoice_no'];
	$height = $row_q['height'];
	$pro_id = $row_q['product_id'];
	$total = $row_q['due_amount'];
	$dadd = $row_q['delivery_address'];
	
	$get_img = "select  * from product where p_id ='$pro_id'";
	$run = mysqli_query($con, $get_img);
	$row = mysqli_fetch_array($run);
	$img = $row['p_image1'] ;
	
	


	
	$select_cust = "select * from customers where c_id = '$cid'";

	$run_cust = mysqli_query($con,$select_cust);
	$row_cust=mysqli_fetch_array($run_cust);
	
	
	$c_name = $row_cust['c_name'];
	$cemial = $row_cust['c_email'];
	$ccountry = $row_cust['c_country'];
	$ccity = $row_cust['c_city'];
	$ccontact = $row_cust['c_contact'];
	$c_add = $row_cust['c_address'];
	
}

?>


<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	
	<title>Plant Shop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
				<a href="#" class="btn  btn-success btn-sm"> <?php
					if(!isset($_SESSION['c_email'])){
						echo "Welcome Guest";
					}else{
						echo "Welcome: ".$_SESSION['c_email']. "";
					}

					?></a>
				<a href="#"></a>
				
			</div><!-- container end offer-->

			<div class="col-md-6">
				<ul  class="menu">
					<li>
						<a href="registration.php">Register</a>
					</li>
					<li>
						<a href="customer/my_account.php">My Account</a>
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

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
					<span class="sr-only"></span>
					<i class="fa fa-search">
					</i>
				</button>				
			</div>

			<div class="navbar-collapse collapse" id="navigation"> <!--navbar-header-start-->
				<div class="padding-nav"><!--paading  nav  start-->
					<ul class="nav navbar-nav navbar-left">
						<li >
							<a href="../index.php">Home</a>
						</li>
						<li >
							<a href="../shop.php">Shop</a>
						</li>
						<li class="active">
							<a href="my_account.php">My account</a>
						</li>
						<li>
							<a href="../cart.php">Shopping cart</a>
						</li>
						<li>
							<a href="../about.php">About Us</a>
						</li>
						<li>
							<a href="../services.php">Services</a>
						</li>
						<li>
							<a href="../Contactus.php">Contact Us</a>
						</li>
					</ul>	
				</div><!--paading  nav  ending-->


				<div class="navbar-collapse collapse right"><!--navbar collapse start-->
					<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
						<span class="sr-only"> Toggle Search</span>
						<i class="fa fa-search"></i>
					</button>
				</div><!--navbar collapse end-->

				<div class="collapse clearfix" id="search">
					<form class="navbar-form" method="get" action="result.php">
						<div class="input-group">
							<input type="text" name="user_query" placeholder="Search" class="form-control" required="">
							<span class="input-group-btn">
							<button type="submit" value="Search" name="search" class="btn btn-primary">
								<i class="fa fa-search">
								</i>
							</button>
							</span>
						</div>
					</form>
				</div>
			</div><!--navbar-header-end-->
		</div>	
	</div><!-- navigation bar end-->


<div id="content">
	<div class="container"><!--Container start-->
		<div class="col-md-12"><!--col-md-12 start-->
			<ul class="breadcrumb">
				<li><a href="home.php">Home</a></li>
				<li>
					Confirm Payment
				</li>
			</ul>
		</div><!--col-md-12 end-->
		<div class="col-md-3">
			<?php 
				include("includes/sidebar.php");
			?>
		</div>

					
		<div class="col-md-9">
			<div class="box">
				<h1 class="text-center"> Check Out</h1>
				<h3 class="text-center" style="color:red;">BIll to the same address</h3>
				<form action="confirm.php?update_id=<?php echo $order_id ?>" method="post" enctype="multipart/form-data">
					<table class="table">
									<thead>
										<tr>
											<th colspan="1">Name:</th>
											<th >Email:</th>
											<th>Country:</th>
											<th>City:</th>
											<th>Contact:</th>
											<th  style="color:red;">Delivery Address:</th>
											<th>Edit Info:</th>
										</tr>
									</thead>
									<tbody>
									<tr>
											
											<td><?php echo $c_name ?></td>
											<td><?php echo $cemial ?></td>
											<td><?php echo $ccountry ?></td>
											<td><?php echo $ccity ?></td>
											<td><?php echo $ccontact ?></td>
											<td><?php echo $c_add ?></td>
											<td>
											<a href="my_account.php?edit_account=<?php echo $customer_id?>">
											<i class="fas fa-edit fa-fw"></i>  Edit Profile
									</a>
											</td>
										</tr>

										
									</tbody>
									
									
								</table>
					
					
					<table class="table ">
						<thead>
							<tr>
							<th>Plant Image</th>
								<th>Plant Name</th>
								<th>Plant Height</th>
								<th>Plant Quantity</th>
								<th>Total Price</th>
								
							
						
								
									</tr>
								</thead>
								<tbody>

										<tr>
										<td><img src="../admin_area/product_images/<?php echo $img ?>" width="70" height="70" alt=""> </td>
								<td><?php echo $p_title ?></td>
								<td><?php echo $height ?></td>
								<td><?php echo $p_qty ?></td>
								<td><?php echo $total ?></td>
								
								
								


								
									
				
				
								</tr>
					
							</tbody>
							</table>
							
					<div class="text-center">
						<button type="submit" name="confirm_order" class="btn btn-primary btn-lg">Confirm Order</button>
						
					</div>
				</form>

				<?php 
			

			

					if (isset($_POST['confirm_order'])) {
						$update_id = $_GET['update_id'];
						$get_order = "select  * from customer_order where order_id = '$update_id'";
							$run_q = mysqli_query($con, $get_order);
							$row_q= mysqli_fetch_array($run_q);
							
							$cid = $row_q['customer_id'];
							$cname = $row_q['c_name'];
							$p_title = $row_q['p_name'];
							$p_qty = $row_q['qty'];
							$invoice = $row_q['invoice_no'];
							$height = $row_q['height'];
							$pro_id = $row_q['product_id'];
							$total = $row_q['due_amount'];
							$dadd = $row_q['delivery_address'];
							$ststau =  $row_q['order_status'];


						if ($ststau == 'pending') {
							$update_co = "update customer_order set order_status = 'Complete',
							payment_method = 'Cash On Delivery' where order_id='$update_id'";
							$run_insert = mysqli_query($con,$update_co);
							echo "<script> alert('Your Order Has Been Received.') </script>;
							<script>window.open('my_account.php?my_order','_self')</script>";
							
						}else{

							echo "<script> alert('Your Order Has Already Been Received.') </script>;
							<script>window.open('my_account.php?my_order','_self')</script>";
							
						}
						

						
						
						


					}

				?>








			</div>
			
		</div>



	</div><!--Container end-->
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


<?php } ?>