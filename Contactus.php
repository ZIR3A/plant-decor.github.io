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
						</li>
						<li>
							<a href="cart.php">Shopping cart</a>
						</li>
						
						<li class="visible-xs-block"><a href="Contactus.php">Contact Us</a></li>
                   		 <li class="pull-right visible-lg-block active "><a href="Contactus.php">Contact Us</a>
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
				<li><a href="home.php">Home</a></li>
				<li>
					Contact Us
				</li>
			</ul>
		</div><!--col-md-12 end-->
		<div class="col-md-3">
			<?php 
				include("includes/sidebar.php");
			?>
		</div>

		<div class="col-md-9"><!--col-md-9 start-->
			<div class="box"><!--box start-->
				<div class="box-header"><!--box header start-->
					<center>
						<h2>Contact Us</h2>
						<p class="text-muted">If you have any questions, please feel free to contact us, our customer service center is working for you 24/7</p>
					</center>
					
				</div><!--box header end-->
				<form action="Contactus.php" method="post">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" required="" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" required="">
					</div>

				<div class="form-group">
					<label>Subject</label>
					<input type="text" name="subject" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Message</label>
					<textarea class="form-control" name="message"></textarea>
				</div>
				<div class="text-center">
					<button type="submit" name="send" class="btn btn-primary">
						<i class="fa fa-user-md"></i>Send Message
					</button>
				</div>
				</form>
			</div><!--box-header end-->
			
		</div><!--col-md-9 end-->
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

<?php

//admin mail

if (isset($_POST['send'])) {
	
	$c_name=mysqli_real_escape_string ($con,$_POST['name']);
	$c_email=mysqli_real_escape_string ($con,$_POST['email']);
	$c_sub=mysqli_real_escape_string ($con, $_POST['subject']);
	$c_mssg=mysqli_real_escape_string ($con,$_POST['message']);
	
	

	$insert_cust_msg="insert into customer_message (c_name,c_email,c_subject,c_messsage) values ('$c_name','$c_email','$c_sub','$c_mssg')";
	$run_cust=mysqli_query($con,$insert_cust_msg);
	echo"
	<script>alert('Your message has been sent. Feel free to message us :)')</script>;
	";

	
}

?>