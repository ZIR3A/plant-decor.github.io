<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>


<?php
$msg="";
if (isset($_POST['submit'])) {
	$c_name=mysqli_real_escape_string($con,$_POST['cus_name']);
	$c_email=mysqli_real_escape_string ($con,$_POST['cus_email']);
	$c_password=mysqli_real_escape_string ($con, $_POST['cus_password']);
	$c_country=mysqli_real_escape_string ($con,$_POST['cus_country']);
	$c_city=mysqli_real_escape_string ($con,$_POST['cus_city']);
	$c_contact=mysqli_real_escape_string ($con,$_POST['cus_number']);
	$c_address=mysqli_real_escape_string ($con,$_POST['cus_address']);



	$c_password = md5($c_password); 

	$c_ip=getUserIP();
		


	
		$check = mysqli_num_rows(mysqli_query($con,"select * from customers where c_email='$c_email'"));


			if ($check > 0) {
				$msg="Email ID Already Registered";
				
			}else{


	$insert_cust="insert into customers (c_name,c_email,c_password,c_country,c_city,c_contact,c_address,c_ip) values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_ip')";
	$run_cust=mysqli_query($con,$insert_cust);
	$sel_cart="select * from cart where ip_add='$c_ip'";
	$run_cart=mysqli_query($con,$sel_cart);
	$check_cart=mysqli_num_rows($run_cart);

	if ($check_cart>0) {
		$_SESSION['c_email']=$c_email;
		echo "<script>alert('You have been registered successfully!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	
	}else{
		$_SESSION['c_email']=$c_email;
		echo "<script>alert('You have been registered successfully!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}

		
	}
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
				<a href="#" class="btn  btn-success btn-sm"> 
					<?php
					if(!isset($_SESSION['c_email'])){
						echo "Welcome Guest";
					}else{
						echo "Welcome: ".$_SESSION['c_email']. "";
					}

					?>
				</a>
				<a href="#"></a>
				
			</div><!-- container end offer-->

			<div class="col-md-6">
				<ul class="menu">
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

						
			</div>

			<div class="navbar-collapse collapse" id="navigation"> <!--navbar-header-start-->
				<div class="padding-nav"><!--paading  nav  start-->
					<ul class="nav navbar-nav navbar-left">
						<li class="active">
							<a href="index.php">Home</a>
						</li>
						<li >
							<a href="shop.php">Shop</a>
						</li>
						<li>
							<a href="customer/my_account.php">My account</a>
						</li>
						<li>
							<a href="cart.php">Shopping cart</a>
						</li>
						
						<li >
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


				
				</div><!--navbar collapse end-->

				
			</div><!--navbar-header-end-->
		</div>	
	</div><!-- navigation bar end-->


<div id="content">
	<div class="container"><!--Container start-->
		<div class="col-md-12"><!--col-md-12 start-->
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li>
					Registration
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
						<h2>Customer Registration</h2>
						
					</center>
					
				</div><!--box header end-->
				<form action="registration.php" name="myForm" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
					<?php echo $msg ?>
					<div class="form-group">
						<label> Customer Name</label>
						<input type="text" name="cus_name" placeholder="Name *"  
						 class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Customer Email</label>
						<input type="email" id="email" name="cus_email"   placeholder="Name *"  class="form-control" required="">
						
					</div>
					<div class="form-group">
						<label>Customer Password</label>

						<input type="password" id="myInput"  value="password"  name="cus_password" class="form-control" required="">


							<input type="checkbox" onclick="myFunction()" style="margin-top:20px;"> Show Password
					

	
					</div>
					
					<div class="form-group">
						<label>Contact Number</label>
						<input type="text" id="phone" name="cus_number"  placeholder="Contact *" pattern="[0-9]{10}" required="" class="form-control"  oninvalid="this.setCustomValidity('Enter number only.')"
       					onvalid="this.setCustomValidity('')">
				
					</div>
					<div class="form-group">
						<label>Country</label>
						<input type="text" name="cus_country"  placeholder="Country *"  class="form-control" required="">
					</div>
					<div class="form-group">
						<label>City</label>
						<input type="text" name="cus_city"  placeholder="City *"  class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" name="cus_address"  placeholder="Address *"  class="form-control" required="">
					</div>
					
					
					
			
				<div class="text-center">
					<button type="submit" name="submit" class="btn btn-primary">
						<i class="fa fa-user-md"></i> Register
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
<script>
						function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


// function CheckSpace(event)
// {
//    if(event.which ==32)
//    {
//       event.preventDefault();
//       return false;
//    }
// }
// function validateForm() {
//   var x = document.forms["myForm"]["cus_name"]["cus_passwrod"]["cus-number"]["cus_country"]["cus_city"]["cus_address"].value;
//   if (x == " ") {
//     alert("Name must be filled out");
//     return false;
//   }
// }
</script>
</body>

</html>
