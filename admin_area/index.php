<?php

session_start();
include("includes/db.php");
if (!isset($_SESSION['admin_email'])) {
	echo"<script>alert('You are Not Logged In')</script>";
	echo"<script>window.open('adminlogin.php','_self')</script>";
} else {
	

?>
<?php
	$admin_session=$_SESSION['admin_email'];
	$get_admin = "select * from admins where admin_email='$admin_session'";
	$run_admin=mysqli_query($con,$get_admin);
	$row_admin=mysqli_fetch_array($run_admin);
	$admin_id = $row_admin['admin_id'];
	$admin_name = $row_admin['admin_name'];
	$admin_email = $row_admin['admin_email'];
	$admin_image = $row_admin['admin_image'];
	$admin_country = $row_admin['admin_country'];
	$admin_contact = $row_admin['admin_contact'];
	$admin_about = $row_admin['admin_about'];


	$get_pro = "select * from product";
	$run_pro = mysqli_query($con,$get_pro);
	$count_pro= mysqli_num_rows($run_pro);


	$get_cust="select * from customers";
	$run_cust=mysqli_query($con,$get_cust);
	$count_cust= mysqli_num_rows($run_cust);



	$get_pro_cat="select * from product_categories";
	$run_pro_cat= mysqli_query($con,$get_pro_cat);
	$count_pro_cat=mysqli_num_rows($run_pro_cat);

	$get_order="select * from customer_order";
	$run_order= mysqli_query($con,$get_order);
	$count_order=mysqli_num_rows($run_order);

	$get_cod="select * from cash_on_delivery";
	$run_cod= mysqli_query($con,$get_cod);
	$count_cod=mysqli_num_rows($run_cod);



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Panel</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!--link style sheet-->
<link rel="stylesheet" href="css/style.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

</head>
<body>
	
	<div id="wrapper">
		
		<?php  include 'includes/sidebar.php';  ?>

		<div id="wrapper-inside">

			<div id="container">
				<?php  
				if (isset($_GET['dashboard'])) {
					include 'dashboard.php';
				}
				if (isset($_GET['p_insert'])) {
					include 'p_insert.php';
				}
				if (isset($_GET['view_product'])) {
					include 'view_product.php';
				}
				if (isset($_GET['delete_product'])) {
					include 'delete_product.php';
				}
				if (isset($_GET['edit_product'])) {
					include 'edit_product.php';
				}
				if (isset($_GET['insert_product_cat'])) {
					include 'insert_product_cat.php';
				}
				if (isset($_GET['view_product_cat'])) {
					include 'view_product_cat.php';
				}
				if (isset($_GET['delete_p_cat'])) {
					include 'delete_product_cat.php';
				}
				if (isset($_GET['edit_p_cat'])) {
					include 'edit_product_cat.php';
				}
				if (isset($_GET['view_customer'])) {
					include 'view_customer.php';
				}
				if (isset($_GET['customer_delete'])) {
					include 'customer_delete.php';
				}
				if (isset($_GET['view_order'])) {
					include 'view_order.php';
				}
				if (isset($_GET['delete_order'])) {
					include 'delete_order.php';
				}
				if (isset($_GET['delete_msg'])) {
					include 'delete_mssgae.php';
				}

				?>
				
			</div>
		</div>
	</div>











<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>


<?php } ?>