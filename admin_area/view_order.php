<?php





if (!isset($_SESSION['admin_email'])) {
	echo"<script>alert('You are Not Logged In')</script>";
	echo"<script>window.open('adminlogin.php','_self')</script>";
} else {
	

?>
<style>

.col-lg-12{
    margin: auto 10%;
    width: 80%;
}
</style>
</style>
<div class="row">
    <div class="col-lg-12">
    <h1 class="page-header">
			View Orders
		</h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fas fa-tachometer-alt"></i> Dashboard / View Orders
            </li>
        </ol>
    </div>
</div>
<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">
								<i class="fa fa-tasks "></i>  Cash on delivery
							</h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover table-striped">
									<thead>
										<tr>
                                        <th>SN:</th>
											<th>Order id:</th>
											
											<th>Customer Email:</th>
											<th>Customer Id:</th>
                                            <th>Customer Name:</th>
                                            
											<th>Product Id:</th>
											<th>Product Name:</th>
                                            <th>Product Quantity:</th>
                                            <th>Product height:</th>
											<th>Invoice No:</th>
                                            <th>Delivery Address:</th>
                                            <th>Order Status:</th>
                                            <th>Payment Type:</th>
											<th>Total:</th>
											<th>Date:</th>
											
                                            <th>Delete: </th>
										</tr>
									</thead>
									<tbody>
										<?php
										
								$get_order = "select * from customer_order";
								$run_order = mysqli_query($con,$get_order);
								$i=0;


							while ($row_order = mysqli_fetch_array($run_order)) {
								$order_id = $row_order['order_id'];
								$cid = $row_order['customer_id'];
								$cname = $row_order['c_name'];
								$proid = $row_order['product_id'];
								$order_dueamount = $row_order['due_amount'];
								$order_invoice = $row_order['invoice_no'];
								$order_qty = $row_order['qty'];
								$order_height = $row_order['height'];
								$order_date = substr($row_order['order_date'], 0,11);
								$order_status = $row_order['order_status'];
								$pname=$row_order['p_name'];
								$pmtho = $row_order['payment_method'];
								$dadd = $row_order['delivery_address'];
								$i++;
								
										?>
										<tr>
											
											<td><?php echo $i ?></td>
                                            <td><?php echo $order_id ?></td>
											<td><?php 
											$get_cust ="select * from customers where c_id='$cid'";
											$run_cust=mysqli_query($con,$get_cust);
											$row_cust=mysqli_fetch_array($run_cust);
											$cemail = $row_cust['c_email'];

											echo $cemail;
											?>
											</td>
                                           
                                            
                                            <td><?php echo  $cid ?></td>
											<td><?php echo $cname ?></td>
											<td><?php echo $proid ?></td>
											<td><?php echo $pname  ?></td>
											<td><?php echo $order_qty ?></td>
                                            <td><?php echo $order_height ?></td>
                                            <td><?php echo $order_invoice ?></td>
                                             <td><?php echo $dadd ?></td>
                                            <td><?php echo $order_status ?></td>
                                            <td><?php echo $pmtho ?></td>
                                            <td><?php echo $dadd ?></td>
                                            <td><?php echo $order_date ?></td>
                                           
											
                                            <td> <a href="index.php?delete_order=<?php echo $order_id ?>">
                                    <i class="fa fa-trash fa-fw">
                                    </i>  Delete
                                </a></td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
				</div>


               

</div>
                <?php } ?>

   