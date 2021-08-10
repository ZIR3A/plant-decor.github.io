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
			View Products
		</h1>
		<ol class="breadcrumb">
		    <li class="active">
		    	<i class="fas fa-tachometer-alt"></i>
		    	 Dashboard / View Product
		    </li>
		</ol>
	</div>
</div><!--row end 1-->


<div class="row"><!--row start 2-->
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-bars" aria-hidden="true"></i> View Products
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Product Id</th>
								<th>Product Title</th>
								<th>Product Image</th>
								<th>Product Price</th>
								
								<th>Product Keyword</th>
								
								<th>Product Delete</th>
								<th>Product Edit</th>
							</tr>
						</thead>

						<tbody>
							<?php
							$i=0;
							$get_pro="select * from product";
							$run_pro=mysqli_query($con,$get_pro);
							while ($row=mysqli_fetch_array($run_pro)) {
							    $pid=$row['p_id'];
							    $ptitle=$row['p_title'];
							    $pimage=$row['p_image1'];
							    $pprice=$row['p_price'];
							    $pkeyw=$row['p_keyw'];
							    		
							    $i++;
							?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $ptitle?></td>
								<td><img src="product_images/<?php echo $pimage?>" style="height: 80px; width: 80px;" alt=""></td>
								<td>Rs <?php echo $pprice?></td>

								<td><?php echo $pkeyw?></td>
								
								<td>
									<a href="index.php?delete_product=<?php echo $pid?>">
										<i class="fa fa-trash fa-fw"></i>  Delete
									</a>
								</td>
								<td>
									<a href="index.php?edit_product=<?php echo $pid?>">
										<i class="fas fa-edit fa-fw"></i>  Edit
									</a>
								</td>
								
							</tr>
							<?php } ?>
						</tbody>
					</table>
					
				</div>
				
			</div>


		</div>
	</div>
</div><!--row end 2-->



<?php } ?>
