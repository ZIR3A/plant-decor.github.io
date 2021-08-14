<?php 

include("includes/db.php");

?>



<div class="box">
	<center>
		<h1>
			My Order
		</h1>
		<p>If you have any questions, please feel free to <a href="../Contactus.php">contact us </a>, our customer service center is working for you 24/7 </p>
	</center>
	<hr>
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Height</th>
					<th>Total Amount</th>
					<th>Order Date</th>
					<th>Status</th>
					<th>Payment Type</th>
					<th>Delete</th>
					<th>Payment Method</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$customer_session = $_SESSION['c_email'];
				$get_customer = "select * from customers where c_email = '$customer_session' ";
				$run_cust = mysqli_query($db, $get_customer);
				$row_custs = mysqli_fetch_array($run_cust);
				$customer_id = $row_custs['c_id'];
				$get_order = "select * from customer_order where customer_id='$customer_id'";
				$run_order = mysqli_query($db, $get_order);
				$i = 0;
				while ($row_order = mysqli_fetch_array($run_order)) {
					$order_id = $row_order['order_id'];
					$order_dueamount = $row_order['due_amount'];
					$order_invoice = $row_order['invoice_no'];
					$order_qty = $row_order['qty'];
					$order_height = $row_order['height'];
					$order_date = substr($row_order['order_date'], 0, 11);
					$order_status = $row_order['order_status'];
					$pname = $row_order['p_name'];
					$pmtho = $row_order['payment_method'];
					$i++;
					if ($order_status == 'pending') {
						$order_status = "Not Ordered";
					} else {
						$order_status = "Ordered";
					}
				?>
					<tr>
						<td><?php echo $pname ?></td>
						<td><?php echo $order_qty ?></td>
						<td><?php echo $order_height ?></td>
						<td><?php echo $order_dueamount ?></td>
						<td><?php echo $order_date ?></td>
						<td style="color:red;"><?php echo $order_status ?></td>
						<td><?php echo $pmtho ?></td>
						<td>
							<a href="delete_order.php?dltord=<?php echo $order_id ?>">
								<i class="fa fa-trash fa-fw">
								</i> Delete
							</a>
						</td>
						<td>
							<a href="confirm.php?order_id=<?php echo $order_id ?>" target="_self" class="btn btn-primary btn-sm" style="margin-bottom:2px;">Pay Offline</a>
							<ul class="list-group">
								<form action="https://uat.esewa.com.np/epay/main" method="POST">
									<input value="<?php echo $order_dueamount; ?>" name="tAmt" type="hidden">
									<input value="<?php echo $order_dueamount; ?>" name="amt" type="hidden">
									<input value="0" name="txAmt" type="hidden">
									<input value="0" name="psc" type="hidden">
									<input value="0" name="pdc" type="hidden">
									<input value="EPAYTEST" name="scd" type="hidden">
									<input value="<?php echo $order_invoice; ?>" name="pid" type="hidden">
									<input value="http://localhost/NEWone/customer/esewa_payment_success.php?q=su" type="hidden" name="su">
									<input value="http://localhost/NEWone/customer/esewa_payment_failed.php?q=fu" type="hidden" name="fu">
									<input class=" btn btn-warning" value="Pay online" type="submit" name="submit">
								</form>
							</ul>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

