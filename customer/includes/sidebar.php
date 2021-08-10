<div class="panel panel-default sidebar-menu">
	<div class="panel-heading">
		<!--panel heading start-->
		<center>
			<img src="customer_images/newuser.png" class="img-responsive">
		</center>
		<br>
		<h3 align="center" class="panel-title"> Name: Saran Baral</h3>
	</div>
	<!--panel heading end-->
	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked">
			<li class="<?php if (isset($_GET["my_order"])) {
							echo "active";
						} ?> ">
				<a href="my_account.php?my_order">
					<i class="fa fa-list"></i>
					My Order</a>
			</li>


			<li class="<?php if (isset($_GET['"edit_account"'])) {
							echo "active";
						} ?> ">
				<a href="my_account.php?edit_account">
					<i class="far fa-address-card"></i>
					Edit Account
				</a>
			</li>


			<li class="<?php if (isset($_GET["change_pass"])) {
							echo "active";
						} ?> ">
				<a href="my_account.php?change_pass">
					<i class="fas fa-key"></i>
					Change Password
				</a>
			</li>

			<li class="<?php if (isset($_GET["delete_account"])) {
							echo "active";
						} ?> ">
				<a href="my_account.php?delete_account">
					<i class="far fa-trash-alt"></i>
					Delete Account
				</a>
			</li>
			<li class="<?php if (isset($_GET["logout"])) {
							echo "active";
						} ?> ">
				<a href="my_account.php?logout">
					<i class="fas fa-sign-out-alt"></i>
					Log Out
				</a>
			</li>
		</ul>
	</div>
</div>