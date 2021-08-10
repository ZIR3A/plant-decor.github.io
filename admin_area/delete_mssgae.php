<?php

if (!isset($_SESSION['admin_email'])) {
	echo"<script>window.open('adminlogin.php','_self')</script>";
} else {
	

?>
<?php
if (isset($_GET['delete_msg'])) {
	$delete_id = $_GET['delete_msg'];
	$delete_pro = "delete from customer_message where sn='$delete_id'";
	$run_dlt=mysqli_query($con, $delete_pro);
    
	if ($run_dlt) {
		echo "<script>alert('Message has been deleted')</script>";
		echo "<script>window.open('index.php?dashboard','_self')</script>";
	}
}
?>
<?php } ?>