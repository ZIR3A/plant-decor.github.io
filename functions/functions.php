<?php
$db = mysqli_connect("localhost", "root", "", "plant_shop");
//for getting user IP start
function getUserIP()
{

	switch (true) {
		case (!empty($_SERVER['HTTP_X_REAL_IP'])):
			return $_SERVER['HTTP_X_REAL_IP'];

		case (!empty($_SERVER['HTTP_CLIENT_IP'])):
			return $_SERVER['HTTP_CLIENT_IP'];

		case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
			return $_SERVER['HTTP_X_FORWARDED_FOR'];

		default:
			return $_SERVER['REMOTE_ADDR'];
	}
}
//for getting user IP end

function addCart()
{
	global $db;

	if (isset($_GET['add_cart'])) {
		$ip_add = getUserIP();
		$p_id = $_GET['add_cart'];
		$product_qty = $_POST['product_qty'];
		$invoice_no = mt_rand();
		$product_height = $_POST['choose_height'];
		$check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
		$run_check = mysqli_query($db, $check_product);
		if (mysqli_num_rows($run_check) > 0) {
			echo "<script>alert('Product already in cart.')</script>";
			echo "<script>window.open('shop.php?pro_id=$p_id','_self')</script>";
			//echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";



		} else {
			$query = "insert into cart(p_id,ip_add,qty,height,invoice_no) values('$p_id','$ip_add','$product_qty','$product_height','$invoice_no')";
			$run_quer = mysqli_query($db, $query);
			echo "<script>alert('Item added to your cart.')</script>";
			echo "<script>window.open('shop.php?pro_id=$p_id','_self')</script>";
			//echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		}
	}
}
//items count start
function item()
{
	global $db;
	$ip_add = getUserIP();
	$get_items = "select * from cart where ip_add='$ip_add'";
	$run_item = mysqli_query($db, $get_items);
	$count = mysqli_num_rows($run_item);
	echo $count;
}
//items count end
//total price start
function totalPrice()
{
	global $db;
	$ip_add = getUserIP();
	$total = 0;
	$select_cart = "select * from cart where ip_add='$ip_add'";

	$run_cart = mysqli_query($db, $select_cart);
	while ($record = mysqli_fetch_array($run_cart)) {
		$pro_id = $record['p_id'];
		$pro_qty = $record['qty'];
		$get_price = "select * from product where p_id='$pro_id'";
		$run_price = mysqli_query($db, $get_price);
		while ($row = mysqli_fetch_array($run_price)) {
			$sub_total = $row['p_price'] * $pro_qty;
			$total += $sub_total;
		}
	}
	echo $total;
}
//total price end




function getpro()
{
	global $db;
	$get_product = "select * from product order by 1 DESC LIMIT 0,4";
	$run_product = mysqli_query($db, $get_product);
	while ($row_product = mysqli_fetch_array($run_product)) {
		$pro_id = $row_product['p_id'];
		$pro_title = $row_product['p_title'];
		$pro_price = $row_product['p_price'];
		$pro_image = $row_product['p_image1'];

		echo "
	
		<div class='col-md-3 col-sm-6 center-responsive'>
						<div class='product'>
						<a href='details.php?pro_id=$pro_id'> 
						<img src='admin_area/product_images/$pro_image' class='img-responsive center-responsive' style='height:300px; object-fit: fill; display: block;
							margin-left: auto;
							margin-right: auto;
							width: 100%;
	    					overflow: hidden;'>

						</a>
						<div class='text'>
						<h3 style ='font-size: 13px; text-align:left; font-weight:bold;'><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
						<p class='price'> NPR $pro_price</p>
						<p class='buttons'>
						<a href='details.php?pro_id=$pro_id' class='btn btn-default'><i class='fas fa-info'></i> View Details</a>
						<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add To Cart</a>
						</p>
						</div>
						</div>
						</div>
		    	";
	}
}


/*product categories*/
function getPcats()
{
	global $db;
	$get_p_cats = "select * from product_categories";
	$run_p_cats = mysqli_query($db, $get_p_cats);
	while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
		$p_cat_id = $row_p_cats['p_cat_id'];
		$p_cat_title = $row_p_cats['p_cat_title'];
		echo "<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";
	}
}


/*Get product categories product*/
function getPcatpro()
{
	global $db;
	if (isset($_GET['p_cat'])) {
		$p_cat_id = $_GET['p_cat'];
		$get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
		$run_p_cat = mysqli_query($db, $get_p_cat);
		$row_p_cat = mysqli_fetch_array($run_p_cat);
		$p_cat_title = $row_p_cat['p_cat_title'];
		$p_cat_desc = $row_p_cat['p_cat_desc'];

		$get_products = "select * from product where p_cat_id= '$p_cat_id'";
		$run_products = mysqli_query($db, $get_products);
		$count = mysqli_num_rows($run_products);
		if ($count == 0) {
			echo "
			<div class='box'>
			<h1>No Product Found In This Product Category</h1>

			</div>";
		} else {
			echo "
				<div class='box'>
				<h1>$p_cat_title</h1>
				<p>$p_cat_desc</p>
				</div>
				";
		}
		while ($row_products = mysqli_fetch_array($run_products)) {
			$pro_id = $row_products['p_id'];
			$pro_title = $row_products['p_title'];
			$pro_price = $row_products['p_price'];
			$pro_image = $row_products['p_image1'];

			echo " 
						<div class='col-md-4 col-sm-6 center-responsive'>
						<div class='product'>
						<a href='details.php?pro_id=$pro_id'> 
						<img src='admin_area/product_images/$pro_image' class='img-responsive' style='height:300px; object-fit: fill; display: block;
						  margin-left: auto;
						  margin-right: auto;
						  width: 100%;
    					overflow: hidden;' >

						</a>
						<div class='text'>
						<h3  style ='font-size: 13px; text-align:left; font-weight:bold;><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
						<p class='price'> NPR $pro_price</p>
						<p class='buttons'>
						<a href='details.php?pro_id=$pro_id' class='btn btn-default'><i class='fas fa-info'></i> View Details</a>
						<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add To Cart</a>
						</p>
						</div>
						</div>
						</div>
			";
		}
	}
}
