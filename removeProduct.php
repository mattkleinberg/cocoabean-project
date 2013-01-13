<?php 
	// if you didn't post to get here
	if (!isset($_POST['productName']))
	{
		// get outta here. Back to the crud from whence you should've come.
		header("Location:crud.php");
	}
	else
	{
		// otherwise if you did post to get here, perform the product removal.
		require("database.php");

		$productName = $_POST['productName'];
		// $category = $_POST['category'];
		// $isFeatured = $_POST['isFeatured'];
		// $sdesc = $_POST['sdesc'];
		// $ldesc = $_POST['ldesc'];
		// $stock = $_POST['stock'];
		// $sku = $_POST['sku'];
		// $price = $_POST['price'];
		// $cost = $_POST['cost'];
		// $productImg = $_POST['sproductImg'];
		// $weight = $_POST['weight'];
		// $size = $_POST['size'];		

		$query = "DELETE FROM product WHERE productName='".$productName."'";		

		mysql_query($query);	

		msql_close($connection);
		
		// Mission accomplished. Back to base, kiddo.
		header("Location:crud.php");
	}

 ?>