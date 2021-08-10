<?php

if (!isset($_SESSION['admin_email'])) {

	echo"<script>window.open('adminlogin.php','_self')</script>";
} else {
	

?>


<?php

if (isset($_GET['edit_p_cat'])) {
    $edit_p_cat_id = $_GET['edit_p_cat'];
    $edit_p_cat_q = "select * from product_categories  where p_cat_id = '$edit_p_cat_id'";
    $run = mysqli_query($con, $edit_p_cat_q);
    $row_edit = mysqli_fetch_array($run);
    $p_cat_id = $row_edit['p_cat_id'];
    $p_cat_title = $row_edit['p_cat_title'];
    $p_cat_des = $row_edit['p_cat_desc'];
}

?>

<div class="container">
<div class="row"><!--fisrt row start-->
	<div class="col-lg-12">
		<h1 class="page-header">
			Edit Products
		</h1>
		<ol class="breadcrumb">
		    <li class="active">
		    	<i class="fas fa-tachometer-alt"></i>
		    	 Dashboard / Edit Product Category
		    </li>
		</ol>
	</div>
</div><!--row end 1-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 <h3 class="panel-title">
                    <i class="fa fa-tasks "></i>  Edit Product Category
                 </h3>
            </div>
             <div class="panel-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                         <label class="col-md-3 control-label">Product Category Title</label>
                            <div class="col-md-6">
                                 <input type="text" name="p_cat_title" class="form-control" value="<?php echo $p_cat_title ?>">
                             </div>
                    </div>
                        <div class="form-group">
                             <label class="col-md-3 control-label">Product Category Description</label>
                                 <textarea type="text" name="p_cat_desc" class="form-control" <?php echo $p_cat_des ?>></textarea>   
                        </div>
                        <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                            <input type="submit" name="update" value="Submit Now" class="btn btn-primary form-control">
                                
                            </div>
                        </div>
    
                </form>
            </div>
    
         </div>
    
    </div>    
</div>


<?php
if (isset($_POST['update'])) {
    $p_cat_title = $_POST['p_cat_title'];
    $p_cat_des = $_POST['p_cat_desc'];

    $updatep_cat = "update product_categories set p_cat_title='$p_cat_title',p_cat_desc='$p_cat_des' where p_cat_id='$p_cat_id'";

    $run_q = mysqli_query($con, $updatep_cat);
    if ($run_q) {
        echo"<script>alert('Product category has been updated.')</script>";
        echo"<script>window.open('index.php?view_product_cat','_self')</script>";
    }
}


?>






<?php } ?>