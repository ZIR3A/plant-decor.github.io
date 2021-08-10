
<?php

$customer_email = $_SESSION['c_email'];
$get_cust = "select * from customers where c_email = '$customer_email' ";
$run_cust = mysqli_query($con, $get_cust);
$row_cust = mysqli_fetch_array($run_cust);
	$cus_id = $row_cust['c_id'];
	$cus_name = $row_cust['c_name'];
	$cus_email = $row_cust['c_email'];
	$cus_country = $row_cust['c_country'];
	$cus_city = $row_cust['c_city'];
	$cus_contact = $row_cust['c_contact'];
	$cus_address = $row_cust['c_address'];

?>


<div class="box">
	<form action="" method="POST" enctype="multipart/form-data">
	<center>
		<h1>Edit Your Account</h1>

	</center>
	<form action="edit_account.php" method="post">
	<div class="form-group">
		<label>Customer Name</label>
		<input type="text" name="cu_name" class="form-control" value="<?php echo $cus_name ?>" required="">
		
	</div>
	<div class="form-group">
		<label>Customer Email</label>
		<input type="email" name="cu_email" class="form-control" value="<?php echo $cus_email ?>" required="">
		
	</div>
	
	<div class="form-group">
		<label>Customer Country</label>
		<input type="text" name="cu_country" class="form-control" value="<?php echo $cus_country ?>" required="">
		
	</div>
	<div class="form-group">
		<label>Customer City</label>
		<input type="text" name="cu_city" class="form-control" value="<?php echo $cus_city ?>" required="">
		
	</div>
	<div class="form-group">
		<label>Customer Number</label>
	
		<input type="tel" id="phone" name="cus_num" value="<?php echo $cus_contact ?>" pattern="[0-9]{5}[0-9]{2}[0-9]{3}" required="" class="form-control"  oninvalid="this.setCustomValidity('Enter number only.')"
       onvalid="this.setCustomValidity('')">
		
	</div>
	<div class="form-group">
		<label>Customer Address</label>
		<input type="text" name="cu_add" class="form-control" value="<?php echo $cus_address ?>" required="">
		
	</div>
	
	<div class="text-center">
		<button class="btn btn-primary" name="update" >
			Update Now
		</button>
		
	</div>
	</form>
</div>


<?php
if (isset($_POST['update'])) {
	$update_id = $cus_id;
	$c_name = $_POST['cu_name'];
	$c_email = $_POST['cu_email'];
	$c_country = $_POST['cu_country'];
	$c_city= $_POST['cu_city'];
	$c_num = $_POST['cu_num'];
	$c_add = $_POST['cu_add'];

	$update_cust = "update customers set c_name = '$c_name', c_email = '$c_email',c_country = '$c_country'
	,c_city='$c_city',c_contact='$c_num',c_address='$c_add' where c_id = '$update_id'";
	$run_up =mysqli_query($con,$update_cust);
	if($run_up){
		echo "<script>alert('Your details have been updated.')</script>";
		echo "<script>window.open('../logout.php','_self')</script>";
	}

}




?>