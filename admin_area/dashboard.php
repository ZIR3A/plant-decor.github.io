<?php


if (!isset($_SESSION['admin_email'])) {
	echo"<script>alert('You are Not Logged In')</script>";
	echo"<script>window.open('adminlogin.php','_self')</script>";
} else {

	

?>


<div class="container">
	<div class="row"><!--fisrt row start-->
		<div class="col-lg-12">
			<h1 class="page-header">
				Dashboard
			</h1>
			<ol class="breadcrumb">
				<li class="active">
					<i class="fas fa-tachometer-alt"></i>
					Dashboard
				</li>
			</ol>
		</div>
	</div><!--row end 1-->
</div>

<div class="container">
	<div class="row">

		<div class="col-lg-3 col-md-9">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-tasks fa-5x"></i>
						</div>
							<div class="col-xs-9 text-right">
								<div class="huge">
									<?php echo $count_pro; ?>
								</div>
								<div>Products</div>
							</div>
					</div>
				</div>
					<a href="index.php?view_product">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>			
					</div>
					</a>
			</div><!--panel heading end-->
		</div><!--end col-lg-->
	



	
 
 <!--2nd box-->

			<div class="col-lg-3 col-md-12">
				<div class="panel panel-green">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-comments fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo $count_cust; ?></div>
									<div>Customers</div>
								</div>
							</div>
						</div>
						<a href="index.php?view_customer">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			

 <!--3rd box-->
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-red">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-shopping-cart fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo $count_pro_cat; ?></div>
									<div>Product Categories</div>
								</div>
							</div>
						</div>
						<a href="index.php?view_product_cat">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>

			
	

			<!--4rd box-->
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-yellow">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fab fa-first-order-alt fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo $count_order; ?></div>
									<div>Orders</div>
								</div>
							</div>
						</div>
						<a href="index.php?view_order">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>

					<!--4rd box-->
			



			<div class="row">
				<div class="col-lg-8">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">
								<i class="fa fa-money fa-fw"></i>Recent Customer Messages
							</h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover table-striped">
									<thead>
										<tr>
										<th>SN:</th>
											<th>Customer Name:</th>
											<th>Customer Email:</th>
											<th>Subject:</th>
											<th>Message:</th>
											<th>Delete:</th>
											
											
										</tr>
									</thead>
									<tbody>
										<?php




//order by 1 DESC LIMIT 0,5
										$i=0;


										$get_order = "select * from customer_message";
										$run_ord = mysqli_query($con,$get_order);
										while ($row_order = mysqli_fetch_array($run_ord)) {
											$sn = $row_order['sn'];
										    $cname = $row_order['c_name'];
										    $cemail = $row_order['c_email'];
										    $csub = $row_order['c_subject'];
										    $cmssg = $row_order['c_messsage'];
										   
										    $i++;
										

										


										?>
										<tr>
											
											<td><?php echo $i ?></td>
											<td><?php echo $cname
										
											?>
												


											</td>
											<td><?php echo $cemail ?></td>
											<td><?php echo $csub ?></td>
											<td><?php echo $cmssg  ?></td>
											<td> <a href="index.php?delete_msg=<?php echo $sn ?>">
                                    <i class="fa fa-trash fa-fw">
                                    </i>  Delete
                                </a></td>
										
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
							<div class="text-right">
								<a href="index.php?view_order">  View All Messages   <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel">
						<div class="panel-body">
							<div class="thumb-info mb-md">
								<img src="admin_images/<?php echo $admin_image ?>" class="rounded img-responsive" alt="">
								<div class="thumb-info-title">
									<span class="thumb-info-inner"><?php echo $admin_name ?></span>
									

								</div>
							</div>
							<div class="mb-md">
								<div class="widget-content-expanded">
									<i class="fa fa-user"></i><span>Email:</span><?php echo $admin_email ?> <br>
									<i class="fa fa-user"></i><span>Country:</span><?php echo $admin_country ?> <br>
									<i class="fa fa-user"></i><span>Contact:</span><?php echo $admin_contact ?> <br>
								</div>
								<hr class="dotted short">
								<h5 class="text-muted"></h5>About
								<p><?php echo $admin_about ?></p>
							</div>
						</div>
					</div>
				</div>


			</div>



	</div>


<?php
}
?>