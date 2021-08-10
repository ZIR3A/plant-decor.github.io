<?php
// $db = mysqli_connect("localhost","root","","plant_shop");
$db = mysqli_connect("remotemysql.com", "69v3kWP3fl", "VQ88LrJeAr", "69v3kWP3fl");
function getpro(){
	global $db;
	$get_product="select * from product order by 1 DESC LIMIT 0,6";
	$run_product=mysqli_query($db,$get_product);
	while ($row_product=mysqli_fetch_array($run_product)) {
		$pro_id=$row_product['p_id'];
		$pro_title=$row_product['p_title'];
		$pro_price=$row_product['p_price'];
		$pro_image=$row_product['p_image1'];
		
		echo"<div class='col-md-4 col-sm-6'> 
		<div class-'product'>
		<a href='details.php?pro_id=$pro_id'>
		<img src='admin_area/product_images/$pro_image' class='img-responsive'>

		 </a>
		</div class=' text'>
		<h3> <a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
		<p class='price'>NPR $pro_price </p>
		<p class='button'>
		<a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
		<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to cart </a>
		</p>
		<div>

		</div>
		</div>";


		# code...
	}
}

?>