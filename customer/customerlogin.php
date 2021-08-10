<?php

include("includes/db.php");

?>

<div class="box">
    <div class="box-header">
      <center>
        <h2>Login</h2>
        <p class="lead">Already our customer</p>
      </center>
      
    </div>
    <form action="checkout.php" method="post">
       <div class="form-group">
        <label>Email:</label>
        <input type="text" class="form-control" name="c_email" required="">
      </div>
      <div class="form-group">
        <label>Password:</label>
        <input type="password" class="form-control" name="c_password" required="">
      </div>
      <div class="text-center">
        <button class="btn btn-primary" name="login" value="Login">
        <i class="fas fa-sign-in-alt"></i> Log in
        </button>
      </div>
    </form>
    <center>
      <a href="registration.php">
        <h3>New User? Register Now</h3>
      </a>
    </center>

</div>


<?php
if(isset($_POST['login'])){
  $customer_email=$_POST['c_email'];
  $customer_password=$_POST['c_password'];
  $customer_password = md5($customer_password); 
  $select_customer="select * from customers where c_email='$customer_email' AND c_password='$customer_password'";
  $run_cust=mysqli_query($con,$select_customer);
  $get_ip = getUserIP();
  $check_customer = mysqli_num_rows($run_cust);
  $select_cart = "select * from cart where ip_add='$get_ip'";
  $run_cart = mysqli_query($con,$select_cart);
  $check_cart = mysqli_num_rows($run_cart);
  if ($check_customer==0) {
    echo"<script>alert('Email ID or Password is incorrect.')</script>";
    exit();
  }
  if ($check_customer==1 AND $check_cart==0) {
    $_SESSION['c_email']=$customer_email;
    echo "<script>alert('You are successfully logged In')</script>";
    echo "<script>window.open('customer/my_account.php?my_order','_self')</script>";
    
  }else{
    $_SESSION['c_email']=$customer_email;
       echo "<script>alert('You are successfully logged In')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
  }

}


?>