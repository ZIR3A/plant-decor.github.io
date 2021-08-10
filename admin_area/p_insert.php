<?php





if (!isset($_SESSION['admin_email'])) {
	echo"<script>alert('You are Not Logged In')</script>";
	echo"<script>window.open('adminlogin.php','_self')</script>";
} else {
	

?>

<!DOCTYPE html>
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
			Insert Products
		</h1>
		<ol class="breadcrumb">
		    <li class="active">
		    	<i class="fas fa-tachometer-alt"></i>
		    	 Dashboard / Insert Product
		    </li>
		</ol>
	</div>
</div><!--row end 1-->
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading"><!--panelheading start-->
					<h3 class="panel-title">
						<i class="fas fa-tools"></i> Insert Product
					</h3>
				</div><!--panelheading start-->

				<div class="panel-body">
					<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">Product Title</label>
							<input type="text" name="p_title" class="form-control" required="">
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Categories</label>
							<select name="p_cat_title" class="form-control">
								<option>Select a product category</option>
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



						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 1</label>
							<input type="file" name="p_image1" class="form-control" required="">
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 2</label>
							<input type="file" name="p_image2" class="form-control" required="">
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 3</label>
							<input type="file" name="p_image3" class="form-control" required="">
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Price</label>
							<input type="text" name="p_price" class="form-control" required="">
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Keyword</label>
							<input type="text" name="p_keyw" class="form-control" required="">
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Description</label>
							<textarea name="p_desc" class="form-control" rows="6" cols="15"></textarea>
						</div>

						<div class="form-group">
							<input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">
						</div>
					</form>
					
				</div>
			</div>
		</div>
		<div class="col-lg-3"></div>
	</div>







</body>

</html>

<?php
if (isset($_POST['submit'])) {
	$product_title= $_POST['p_title'];
	$product_categories= $_POST['p_cat_title'];
	$product_price= $_POST['p_price'];
	$product_keyword= $_POST['p_keyw'];
	$product_desc= $_POST['p_desc'];

	$extensions= ['jpeg','jpg','png'];
	$product_img1= $_FILES['p_image1']['name'];
	$product_img2= $_FILES['p_image2']['name'];
	$product_img3= $_FILES['p_image3']['name'];

	$temp_name1= $_FILES['p_image1']['tmp_name'];
	$temp_name2= $_FILES['p_image2']['tmp_name'];
	$temp_name3= $_FILES['p_image3']['tmp_name'];

	
	
	$imageFileType = strtolower(pathinfo($product_img1,PATHINFO_EXTENSION));
	$imageFileType = strtolower(pathinfo($product_img2,PATHINFO_EXTENSION));
	$imageFileType = strtolower(pathinfo($product_img3,PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	echo  "<script>alert('Please choose image files.')</script>";
	$uploadOk = 0;

	
	

	}else{

	move_uploaded_file($temp_name1, "product_images/$product_img1");
	move_uploaded_file($temp_name2, "product_images/$product_img2");
	move_uploaded_file($temp_name3, "product_images/$product_img3");






  
		$insert_product="insert into product(p_cat_id,date,p_title,p_image1,p_image2,p_image3,p_price,p_desc,p_keyw)
		values('$product_categories',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$product_keyword')";
		$run_product=mysqli_query($con,$insert_product);
		if($run_product){
			echo "<script>alert('Product Inserted Succesfully')</script>";
			echo "<script>window.open('index.php?view_product','_self')</script>";


	
    


		}
	
	}
	# code...
}



?>
<?php } ?>