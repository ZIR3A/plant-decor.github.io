<?php
session_start();
include("includes/db.php");
include("functions/functions.php");


?>

<?php
if (isset($_GET['cu_id'])) {
	$customer_id = $_GET['cu_id'];
	$get_cu = "select * from customers where c_id='$customer_id'";
	$run_cus = mysqli_query($con, $get_cu);
	$row_cu = mysqli_fetch_array($run_cus);
	$c_name = $row_cu['c_name'];
	$c_add = $row_cu['c_address'];
	$cip = $row_cu['c_ip'];
}


$ip_add = getUserIP();

$status = "pending";

$select_cart = "select * from cart where ip_add = '$ip_add'";
$run_cart = mysqli_query($con, $select_cart);
while ($row_cart = mysqli_fetch_array($run_cart)) {
	$pro_id = $row_cart['p_id'];
	$pro_qty = $row_cart['qty'];
	$pro_height = $row_cart['height'];
	$invoice_no = $row_cart['invoice_no'];

	$get_pro = "select * from product where p_id='$pro_id'";
	$run_pro = mysqli_query($con, $get_pro);




	while ($row_pro = mysqli_fetch_array($run_pro)) {
		$pidd = $row_pro['p_id'];
		$amountt = $row_pro['p_price'];
		$sub_total = $row_pro['p_price'] * $pro_qty;
		$pro_title =  $row_pro['p_title'];


		$get_order = "select  * from customer_order where product_id = '$pidd' AND order_status='pending' AND customer_id ='$customer_id' AND height='$pro_height'";
		$run_q = mysqli_query($con, $get_order);
		$row_q = mysqli_fetch_array($run_q);
		$cus_idd = $row_q['c_ip'];
		$count = mysqli_num_rows($run_q);

		if ($count > 0) {
			echo "<script>alert('Your Order Has Already Been Placed.')</script>";
			echo "<script>window.open('customer/my_account.php?my_order','_self')</script>";
		} else {
			$insert_corder = "insert into customer_order (customer_id,c_name, product_id ,p_name,due_amount,invoice_no,qty,height,order_date,delivery_address,order_status,c_ip)
		 values
		 ('$customer_id','$c_name','$pro_id' ,'$pro_title','$sub_total','$invoice_no','$pro_qty','$pro_height',NOW(),'$c_add','$status','$cip')";

			$run_corder = mysqli_query($con, $insert_corder);




			// $insert_porder = "insert into pending_order (customer_id,invoice_no,product_id,qty,height,order_status) 
			// values 
			//('$customer_id','$invoice_no','$pro_id','$pro_qty','$pro_height','$status')";

			// $run_porder = mysqli_query($con,$insert_porder);
			$delete_cart = "delete from cart where ip_add = '$ip_add'";
			$run_delete_cart = mysqli_query($con, $delete_cart);
			echo "<script>alert('Your Order Has Been Placed.')</script>";
			echo "<script>window.open('customer/my_account.php?my_order','_self')</script>";
		}
	}
}




?>