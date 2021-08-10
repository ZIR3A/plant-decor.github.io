<?php


if (!isset($_SESSION['admin_email'])) {
	echo"<script>alert('You are Not Logged In')</script>";
	echo"<script>window.open('adminlogin.php','_self')</script>";
} else {
}
	

?>

<nav class="navbar navbar-inverse navbar-fixed-top" >
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-targer=".navbar-ex1-collapse">
			<span class="sr-only">Toggel Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			
		</button>
		<a href="index.php?dashboard" class="navbar-brand"> Admin Panel</a>
	</div>
	<ul class="nav navbar-right top-nav"><!--nav ar top start-->
		<li class="dropdown" style="margin-right: 20px;">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-user"></i> <?php echo $admin_name ?>
			</a>
			<ul class="dropdown-menu">
				<li>
				<a href="index.php?user_profile?id=<?php echo $admin_id?>">
					<i class="fa fa-fw-user"></i>Profile
				</a>

				</li>
				<li class="divider">
					
				</li>
				<li>
					<a href="index.php?view_product">
						<i class="fa fa-fw-envelope"></i>Products
						<span class="badge"><?php echo $count_pro ?></span>
					</a>

				</li>
				<li class="divider">
					
				</li>
				<li>
					<a href="index.php?view_customer">
						<i class="fa fa-fw-users"></i>Customer 
						<span class="badge"><?php echo $count_cust ?></span>
					</a>

				</li>
				<li class="divider">
					
				</li>
				<li>
				<a href="index.php?pro_cat">
					<i class="fa fa-fw-gear"></i>Product Categories
					<span class="badge"><?php echo $count_pro_cat ?></span>
					
				</a>

				</li>
				<li class="divider">
					
				</li>
				<li>
				<a href="index.php?pro_cat">
					<i class="fa fa-fw-gear"></i>Orders
					<span class="badge"><?php echo $count_pro_cat ?></span>
					
				</a>

				</li>
				<li class="divider">
					
				</li>
				
				<li class="divider">
					
				</li>
				<li>
					<a href="adminlogout.php">LogOut
						<i class="fa fa-fw fa-power-off"></i></a>
				</li>
			</ul>		
		</li>
	</ul>
	<!--nav bar top end-->
	<div id="sideid" class="collapse navbar-collapse">
		<ul class="nav navbar-nav side-nav">
			<li>
				<a href="index.php?dashboard">
					<i class="fas fa-tachometer-alt"></i>Dashboard


				</a>
			</li>

			<li> <!--Start here-->
					<a href="#" data-toggle="collapse" data-target="#products">
						<i class="fas fa-th-list"></i> Product</a>
					
				
				<ul id="products" class="collapse">
					<li>
						<a href="index.php?p_insert">Insert Product</a>
					</li>
					<li>
						<a href="index.php?view_product">View Product</a>
					</li>
				</ul>
			</li> <!--SEnd list-->

			<li> <!--Start here-->
					<a href="#" data-toggle="collapse" data-target="#product_cat">
						<i class="fas fa-th-list"></i> Product Categories</a>
						
				
				<ul id="product_cat" class="collapse">
					<li>
						<a href="index.php?insert_product_cat">Insert Product Categories</a>
					</li>
					<li>
						<a href="index.php?view_product_cat">View Product Categories</a>
					</li>
				</ul>
			</li> <!--SEnd list-->
			
			
			<li>
				<a href="index.php?view_customer">
					<i class="fa fa-fw fa-edit"></i> View Customers
				</a>
			</li>
			<li>
				<a href="index.php?view_order">
					<i class="far fa-list-alt"></i> View Orders
				</a>
			</li>
			<li>
				<a href="index.php?view_payments">
					<i class="fas fa-money-check"></i> Sliders
				</a>
		
			</li> <!--End list-->






		</ul>
		
	</div>
</nav>
