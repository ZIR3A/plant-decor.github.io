<?php

session_start();
include("includes/db.php");

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
      @import url('https://fonts.googleapis.com/css?family=Poppins:300,300i,400,500,500i,600,700');
      body{
      padding:0;
      margin: 0;
      background: url('admin_images/1.jpg');
      font-family: 'Poppins', sans-serif;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      }
      section{
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
      }
      form{
      padding: 40px;
      border-radius: 4px;
      width: 40vw;
      background: rgba( 255, 255, 255, 0.25 );
      box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
      backdrop-filter: blur( 1px );
      -webkit-backdrop-filter: blur( 2px );
      }
      input{
      margin-top: 25px;
      height: 60px;
      outline: none;
      padding-left: 10px;
      box-sizing: border-box;
      border:1px solid #fff;
      transition: .2s;
      font-family: 'Poppins', sans-serif;
      font-size: 22px;
      width:100%;
      }
      input:hover{
      border: 1px solid #777;
      transition: .4s;
      }
      button{
      background: #000;
      border-radius:8px;
      outline: none;
      border: 0px;
      color: #fff;
      font-size: 28px;
      cursor: pointer;
      height: 60px;
      width: 100%;
      margin-top: 25px;
      }
      ::placeholder{
      font-size: 20px;
      }
      @media(max-width: 824px){
      form{
      width: 60vw;
      }
      }
      @media (max-width: 475px){
      form {
      width: 70vw;
      }
      }



      .form-login-heading{
        text-align: center;
        font-size: 30px;

      }
    </style>
  </head>
  <body>
    <section>
      <form class="form-login" action="" method="post">
         <h2 class="form-login-heading">Admin Login</h2>
            <input type="text" class="form-control" name="admin_email" placeholder="Email Address" required>
            <input type="password" class="form-control" name="admin_pass" placeholder="Password" required>
        <button type="submit" name="admin_login">Login </button>
      </form>
    </section>
  </body>
</html>

<?php
if(isset($_POST['admin_login'])){
    $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
    $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
    $get_info = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
    


    $run_info = mysqli_query($con, $get_info);
    $count_info = mysqli_num_rows($run_info);
    if ($count_info==1) {
        $_SESSION['admin_email']=$admin_email;
        echo"<script>alert('You are Logged In')</script>";
        echo"<script>window.open('index.php?dashboard','_self')</script>";
    }else {
        echo"<script>alert('Your Email/Password is Incorrect.')</script>";
    }
}

?>