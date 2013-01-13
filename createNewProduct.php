<?php 
	
	// if you didn't post a new product to get here
	if (!isset($_POST['productName']))
	{
		// get outta here. Back to the crud from whence you should've come.
		header("Location:crud.php");
	}
	else
	{
		// otherwise if you did post new info to get here, perform the product addition.
		require("database.php");

		$productName = $_POST['productName'];
		$category = $_POST['category'];
		$isFeatured = $_POST['isFeatured'];
		$sdesc = $_POST['sdesc'];
		$ldesc = $_POST['ldesc'];
		$stock = $_POST['stock'];
		$sku = $_POST['sku'];
		$price = $_POST['price'];
		$cost = $_POST['cost'];
		$productImg = $_POST['sproductImg'];
		$weight = $_POST['weight'];
		$size = $_POST['size'];		

		$query = "INSERT INTO product (featured, productName, sDesc, lDesc, category, sku, stock, cost, price, productImg, featuredImg, weight, size, rating) VALUES ('".$isFeatured."', '".$productName."', '".$sdesc."', '".$ldesc."', '".$category."', '".$sku."', '".$stock."', '".$cost."', '".$price."', '".$productImg."', '".$featuredImg."', '".$weight."', '".$size."', '".$rating."')";

		mysql_query($query);	

		msql_close($connection);

		// Mission accomplished. Back to base, kiddo.
		header("Location:crud.php");
	}

 ?>