<?php

include("includes/db.php");

?>



<?php
if (isset($_GET['dltord'])) {
	$delete_ord= $_GET['dltord'];
	$delete_ord= "delete from customer_order where order_id='$delete_ord'";
	$run_dlt=mysqli_query($con, $delete_ord);
	if ($run_dlt) {
		echo "<script>alert('Your order has been removed.')</script>";
		echo "<script>window.open('my_account.php?my_order','_self')</script>";
	}
}
?>