<?php

if (!isset($_SESSION['admin_email'])) {

	echo"<script>window.open('adminlogin.php','_self')</script>";
} else {
	

?>

<?php
if (isset($_GET['edit_product'])) {
	$edt_id = $_GET['edit_product'];
	$get_pro = "select * from product where p_id='$edt_id'";
	$run=mysqli_query($con,$get_pro);
	$row_p=mysqli_fetch_array($run);
	$product_id= $row_p['p_id'];
	$product_cat_id= $row_p['p_cat_id'];
	
	$product_title= $row_p['p_title'];
	$product_price= $row_p['p_price'];
	$product_keyword= $row_p['p_keyw'];
	$product_desc= $row_p['p_desc'];


	$product_img1= $row_p['p_image1'];
	$product_img2= $row_p['p_image2'];
	$product_img3= $row_p['p_image3'];

	$getpcat = "select * from product_categories where p_cat_id='$product_cat_id'";

	$runpcat= mysqli_query($con,$getpcat);
	$rowpcat=mysqli_fetch_array($runpcat);
	$pcattitle= $rowpcat['p_cat_title'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Plant Shop</title>


<script>tinymce.init({selector:'textarea'});</script>



</head>
<body>

	<div class="container">
<div class="row"><!--fisrt row start-->
	<div class="col-lg-12">
		<h1 class="page-header">
			Edit Products
		</h1>
		<ol class="breadcrumb">
		    <li class="active">
		    	<i class="fas fa-tachometer-alt"></i>
		    	 Dashboard / Edit Product
		    </li>
		</ol>
	</div>
</div><!--row end 1-->
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading"><!--panelheading start-->
					<h3 class="panel-title">
						<i class="fas fa-tools"></i> Edit Product
					</h3>
				</div><!--panelheading start-->

				<div class="panel-body">
					<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">Product Title</label>
							<div class="col-md-6">
							
							<input type="text" name="p_title" class="form-control" required="" value="<?php echo $product_title;?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Categories</label>
							<div class="col-md-6">
							<select name="p_cat_title" class="form-control">
								<option value="<?php echo $pcattitle; ?>">Select a product category</option>
								<?php
								$get_p_cats="select * from product_categories";
								$run_p_cats= mysqli_query($con,$get_p_cats);
								while($row=mysqli_fetch_array($run_p_cats)){
									$id=$row['p_cat_id'];
									$title=$row['p_cat_title'];
									echo"<option value='$id'>$title</option>";
								}
								?>

							</select>
							</div>
						</div>



						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 1</label>
							<div class="col-md-6">
							<input type="file" name="p_image1" class="form-control" required="">
							<br><img src="product_images/<?php echo $product_img1 ?>"  width="70" height="70" alt="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 2</label>
							<div class="col-md-6">
							<input type="file" name="p_image2" class="form-control" required="">
							<br><img src="product_images/<?php echo $product_img2 ?>"  width="70" height="70" alt="">
						</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 3</label>
							<div class="col-md-6">
							<input type="file" name="p_image3" class="form-control" required="">
							<br><img src="product_images/<?php echo $product_img3 ?>"  width="70" height="70" alt="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Price</label>
							<div class="col-md-6">
							<input type="text" name="p_price" value="<?php echo $product_price; ?>" class="form-control" required="">
						</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Keyword</label>
							<div class="col-md-6">
							<input type="text" name="p_keyw" value="<?php echo $product_keyword ?>" class="form-control" required="">
						</div>
					</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Description</label>
							<div class="col-md-6">
							<textarea name="p_desc" class="form-control" rows="6" cols="19"><?php echo $product_desc ?></textarea>
						</div>
					</div>

						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
							<input type="submit" name="update" value="Update Product" class="btn btn-primary form-control">
						</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
		







</body>

</html>

<?php
if (isset($_POST['update'])) {
	$product_title= $_POST['p_title'];
	$product_cat_id= $_POST['p_cat_id'];
	$product_price= $_POST['p_price'];
	$product_keyword= $_POST['p_keyw'];
	$product_desc= $_POST['p_desc'];


	$product_img1= $_FILES['p_image1']['name'];
	$product_img2= $_FILES['p_image2']['name'];
	$product_img3= $_FILES['p_image3']['name'];



	$temp_name1= $_FILES['p_image1']['tmp_name'];
	$temp_name2= $_FILES['p_image2']['tmp_name'];
	$temp_name3= $_FILES['p_image3']['tmp_name'];

	move_uploaded_file($temp_name1, "product_images/$product_img1");
	move_uploaded_file($temp_name2, "product_images/$product_img2");
	move_uploaded_file($temp_name3, "product_images/$product_img3");



	



	$update_product="update product set p_cat_id='$product_cat_id',date=NOW(),p_title='$product_title',p_image1='$product_img1',p_image2='$product_img2',p_image3='$product_img3',p_price='$product_price',p_desc='$product_desc',p_keyw='$product_keyword' where p_id='$product_id'";
	$run_product=mysqli_query($con,$update_product);
	if($run_product){
		echo "<script>alert('Product has been updates succesfully')</script>";
		echo "<script>window.open('index.php?view_product','_self')</script>";
	}
	
}



?>
<?php } ?>