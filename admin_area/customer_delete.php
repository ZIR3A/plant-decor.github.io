<?php

if (!isset($_SESSION['admin_email'])) {
	echo"<script>window.open('adminlogin.php','_self')</script>";
} else {
	

?>
<?php
if (isset($_GET['customer_delete'])) {
	$delete_id= $_GET['customer_delete'];
	$delete_cus= "delete from customers where c_id='$delete_id'";
	$run_dlt=mysqli_query($con, $delete_cus);
	if ($run_dlt) {
		echo "<script>alert('Customer has been removed.')</script>";
		echo "<script>window.open('index.php?view_customer','_self')</script>";
	}
}
?>
<?php } ?>