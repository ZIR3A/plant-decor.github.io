

<div class="box"> 
	
		<center>
			<h1>Change Your Password Here</h1>
		</center>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label>Current Password</label>
			<input type="text" name="cpas" class="form-control" required="">
			
		</div>
		<div class="form-group">
			<label> Enter New Password</label>
			

			<input type="password" id="myInput"  value="password"  name="cpassn" class="form-control" required="">
			<input type="checkbox" onclick="myFunction()" style="margin-top:20px;"> Show Password

							
					
			
		</div>
		<div class="form-group">
			<label>Confirm New Password</label>
		
			


			
			<input type="password" id="myInput1"  value="password"  name="cpassc" class="form-control" required="">


							<input type="checkbox" onclick="myFunction2()" style="margin-top:20px;"> Show Password
		</div>

		<div class="text-center">
			<button class="btn btn-primary btn-lg" name="update" type="submit">Update Password</button>
		</div>
	</form>
</div>
<?php
if (isset($_POST['update'])) {
	$customer_email = $_SESSION['c_email'];
	$old_pass = $_POST['cpas'];
	$old_pass = md5($old_pass); 
	$new_pass = md5($_POST['cpassn']);
	$confirm_pass = md5($_POST['cpassc']);
	$select_cust = "select * from customers where c_email='$customer_email' AND c_password='$old_pass'";
	$run_cust = mysqli_query($con,$select_cust);
	$chck_cust=mysqli_num_rows($run_cust);
		if ($chck_cust==0) {
			echo "<script>alert('Your current password does not match. Try again!')</script>";
			exit();
		}
			if ($new_pass!=$confirm_pass) {
				echo "<script>alert('Your new password does not match. Try again!')</script>";
				exit();
			}

		$update_q = "update customers set c_password='$new_pass' where c_email = '$customer_email'";
		$run_qq = mysqli_query($con,$update_q);
		echo "<script>alert('Your password has been changed.')</script>";
		echo "<script>window.open('my_account.php?my_order','_self')</script>";
}
	



?>

<script>
						function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

}

function myFunction2() {
  var x = document.getElementById("myInput1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

}



</script>