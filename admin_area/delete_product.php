<?php

if (!isset($_SESSION['admin_email'])) {
	echo"<script>window.open('adminlogin.php','_self')</script>";
} else {
	

?>
<?php
if (isset($_GET['delete_product'])) {
	$delete_id= $_GET['delete_product'];
	$delete_pro = "delete from product where p_id='$delete_id'";
	$run_dlt=mysqli_query($con, $delete_pro);
	if ($run_dlt) {
		echo "<script>alert('Your product has been deleted')</script>";
		echo "<script>window.open('index.php?view_product','_self')</script>";
	}
}
?>
<?php } ?>