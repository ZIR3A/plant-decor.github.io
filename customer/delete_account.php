
<div class="box">
	<center>
		<h1>Delete Your Account</h1>

	
	<form action="" method="post">
		<input type="submit" name="dlte" value="Yes, I want to Delete" class="btn btn-danger">
		<input type="submit" name="no" value="No, I dont want" class="btn btn-primary">
	</form>
	</center>
</div>
<?php
$customer_email = $_SESSION['c_email'];
if (isset($_POST['dlte'])) {
	$delete_cust = "delete from customers where c_email='$customer_email'";
	$run_q = mysqli_query($con,$delete_cust);
	if ($run_q) {
		session_destroy();
		echo "<script>alert('Your account has been deleted.')</script>";
		echo "<script>window.open('../index.php','_self')</script>";
	}
}




?>