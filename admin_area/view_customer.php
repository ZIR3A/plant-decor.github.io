<?php

if (!isset($_SESSION['admin_email'])) {

	echo"<script>window.open('adminlogin.php','_self')</script>";
} else {
	

?>

<div class="container">
<div class="row"><!--fisrt row start-->
	<div class="col-lg-12">
		<h1 class="page-header">
			View Customer Info
		</h1>
		<ol class="breadcrumb">
		    <li class="active">
		    	<i class="fas fa-tachometer-alt"></i>
		    	 Dashboard / View Customer
		    </li>
		</ol>
	</div>
</div><!--row end 1-->



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title">
            <i class="fa fa-money fa-fw"></i> View Customer
            </h3>
            </div>
            <div class="panel-body">
            <div class="table-responsive">
            <table class="table table-bordered tabel-hover table-striped">
            <thead>
            <tr>
            <th>Customer No:</th>
            <th>Customer Id:</th>
            <th>Customer Name:</th>
            <th>Customer Email:</th>
           
            <th>Customer Country:</th>
            <th>Customer City:</th>
            <th>Customer Contact:</th>
            <th>Customer Address:</th>
            <th>Delete:</th>
            </tr> 
            </thead>
                        <tbody>
                            <?php 
                            $i=0;
                            $get_c = "select * from customers";
                            $run_c = mysqli_query($con , $get_c);
                            while ($row_c = mysqli_fetch_array($run_c)) {
                                $c_id = $row_c['c_id'];
                                $c_name = $row_c['c_name'];
                                $c_email = $row_c['c_email'];
                                $c_country = $row_c['c_country'];
                                $c_city = $row_c['c_city'];
                                $c_contact = $row_c['c_contact'];
                                $c_add = $row_c['c_address'];
                                $i++;
                            
                            
                            
                            ?>
                            <tr>
                            <td><?php echo $i ?></td>  
                                <td><?php echo $c_id ?></td>    
                                <td><?php echo $c_name ?></td>  
                                <td><?php echo $c_email ?></td>  
                                <td><?php echo $c_country ?></td>  
                                <td><?php echo $c_city ?></td>  
                                <td><?php echo $c_contact ?></td>  
                                <td><?php echo $c_add ?></td>    
                                <td>
                                <a href="index.php?customer_delete=<?php echo $c_id ?>">
                                    <i class="fa fa-trash fa-fw">
                                    </i>  Delete
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
</div>

<?php } ?>