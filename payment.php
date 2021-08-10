<div class="box">
	<?php
	$session_email = $_SESSION['c_email'];
	$select_cust = "select * from customers where c_email='$session_email'";

	$run_cust = mysqli_query($con,$select_cust);
	$row_cust = mysqli_fetch_array($run_cust);
	$cust_id = $row_cust['c_id'];
	


	?>

	
		
		<h1 class="text-center">Add to order list</h1>
		<p class="lead text-center">

			<a href="order.php?cu_id=<?php echo $cust_id?>">Go to order page</a>
		</p>
		<center>
			<p class="lead">
			<a href="order.php?cu_id=<?php echo $cust_id?>"><i class="fas fa-money-check fa-6x"></i></a>
			
			</p>
		</center>
</div>