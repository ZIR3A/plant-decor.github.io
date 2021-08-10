<?php





if (!isset($_SESSION['admin_email'])) {
	echo"<script>alert('You are Not Logged In')</script>";
	echo"<script>window.open('adminlogin.php','_self')</script>";
} else {
	

?>

<style>

.col-lg-12{
    margin: auto 20%;
    width: 60%;
}
</style>

<div class="row">
    <div class="col-lg-12">
    <h1 class="page-header">
			View Product Categories
		</h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fas fa-tachometer-alt"></i> Dashboard / View Products Category
            </li>
        </ol>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">

        <div class="panel-heading">
            <h3"panel-title">
                <i class="fa fa-tasks"></i>  View Product Ccategory
            </h3>
        </div>


        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Product Category Id</th>
                            <th>Product Category Title</th>
                            <th>Product Category Description</th>
                            <th>Delete Product Category</th>
                            <th>Edit Product Category</th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=0;
                        $get_p_cats= "select * from product_categories";
                        $run_p_cats = mysqli_query($con,  $get_p_cats);
                        while ($row_p_cats= mysqli_fetch_array($run_p_cats)) {
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            $p_cat_tit = $row_p_cats['p_cat_title'];
                            $p_cat_des = $row_p_cats['p_cat_desc'];
                            $i++;
                        
                        
                        
                        
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $p_cat_tit; ?></td>
                            <td width="300"><?php echo $p_cat_des; ?></td>
                            <td>
                                <a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">
                                <i class="fa fa-trash fa-fw"></i> Delete   
                                </a>
                            </td>
                            <td>
                                <a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">
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
</div>

<?php } ?>