<?php





if (!isset($_SESSION['admin_email'])) {

	echo"<script>window.open('adminlogin.php','_self')</script>";
} else {
	

?>

<?php 
if (isset($_GET['delete_order'])) {
   $delete_id = $_GET['delete_order'];
   $delete_codd = "delete from customer_order where order_id='$delete_id'";

   $run_deletr = mysqli_query($con, $delete_codd);

   if ($run_deletr) {
       echo"<script>alert('Order has been deleted')</script>";
       echo"<script>window.open('index.php?view_order','_self')</script>";
   }
}
?>
<?php } ?>