<?php 
	// if you didn't post to get here
	if (!isset($_POST['productNameToCheck']))
	{
		// get outta here. Back to the crud from whence you should've come.
		header("Location:crud.php");
	}
	else
	{
		// otherwise if you did post to get here, perform the product update.
		require("database.php");
	
		// get name of product that is going to be updated
		$productNameToCheck = $_POST['productNameToCheck'];

		// make query here, append to it as requested changes are encountered.
		$query="UPDATE product SET ";

		// check which inputs have been sent in. 
		if (isset($_POST['productName']))
		{
			// they want to edit productName.
			$productName = $_POST['productName'];
			$query .= "productName='".$productName."'";
		}

		if (isset($_POST['category']))
		{
			// they want to edit productName.
			$category = $_POST['category'];
			$query .= " category='".$category."'";
		}

		if (isset($_POST['isFeatured']))
		{
			// they want to edit productName.
			$isFeatured = $_POST['isFeatured'];
			$query .= " isFeatured='".$isFeatured."'";
		}

		if (isset($_POST['sdesc']))
		{
			// they want to edit productName.
			$sdesc = $_POST['sdesc'];
			$query .= " sdesc='".$sdesc."'";
		}

		if (isset($_POST['ldesc']))
		{
			// they want to edit productName.
			$ldesc = $_POST['ldesc'];
			$query .= " ldesc='".$ldesc."'";
		}

		if (isset($_POST['stock']))
		{
			// they want to edit productName.
			$stock = $_POST['stock'];
			$query .= " stock='".$stock."'";
		}

		if (isset($_POST['sku']))
		{
			// they want to edit productName.
			$sku = $_POST['sku'];
			$query .= " sku='".$sku."'";
		}

		if (isset($_POST['price']))
		{
			// they want to edit productName.
			$price = $_POST['price'];
			$query .= " price='".$price."'";
		}

		if (isset($_POST['cost']))
		{
			// they want to edit productName.
			$cost = $_POST['cost'];
			$query .= " cost='".$cost."'";
		}

		if (isset($_POST['productImg']))
		{
			// they want to edit productName.
			$productImg = $_POST['productImg'];
			$query .= " productImg='".$productImg."'";
		}

		if (isset($_POST['weight']))
		{
			// they want to edit productName.
			$weight = $_POST['weight'];
			$query .= " weight='".$weight."'";
		}

		if (isset($_POST['size']))
		{
			// they want to edit productName.
			$size = $_POST['size'];
			$query .= " size='".$size."'";
		}		

		$query .= " WHERE productName='".$productNameToCheck."'"; 
		echo $query;	

		// $query = "UPDATE product SET column1=value, column2=value2 WHERE productName=$productNameToCheck"; 	

		mysql_query($query);	

		// Close 'er up, we're done here (opened in database.php by the way).
		msql_close($connection);

		// Mission accomplished. Back to base, kiddo.
		header("Location:crud.php");
	}

 ?>