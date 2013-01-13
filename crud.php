<!DOCTYPE html>
<html>
<head>
	<title>Cocoa Bean CRUD</title>
	<meta charset='utf-8'/>     
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />    

    <!--[if lte IE 9]>
        <style type="text/css">         
            @import url("css/ie.css") screen;
        </style>    
    <![endif]-->

    <style type="text/css">
        @import url("css/reset.css") screen;
        @import url("css/1140.css") screen;
        @import url("css/style.css") screen;
    </style>
        
    <!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
    <script type="text/javascript" src="js/css3-mediaqueries.js"></script>    
    <script type="text/javascript" src="js/google-analytics.js"></script>
</head>
<body id="crud">
	
	<?php include 'php-includes/header-include.php'; ?>
	
    <div class="container">
        <div class="row">
            <h2>CRUD Admin Operations</h2>    
        </div>

        <div class="row"></div>                    
        
        <div class="row">
            <div class="fourcol">
                <!-- MAKE NEW PRODUCT FORM -->
                <form method="post" id="crud-create-product-form" action="createNewProduct.php">
                    <fieldset>
                        <legend>Create New Product</legend>
        
                        <label for="productName">Product Name:</label>
                        <input type="text" name="productName" id="productName" placeholder="Red Velvet Cake" required="required"></input><br/>
        
                        <label for="category">Category:</label>
                        <input type="text" name="category" id="category" placeholder="Cake" required="required"></input><br/>
        
                        <label for="isFeatured">Featured?</label>
                        <input type="radio" name="isFeatured" id="isFeatured" value="Yes" required="required">Yes</input>
                        <input type="radio" name="isFeatured" id="isFeatured" value="No" required="required"></input>No<br>

                        featuredImg: <input type="text" name="featuredImg" placeholder="img/red-velvet-cake.png"></input><br/>
        
                        <label for="sdesc">Short Description</label>
                        <input type="text" name="sdesc" id="sdesc" placeholder="Smooth, melt-in-your-mouth chocolate with almond creme." required="required"></input><br/>
        
                        long-description: <input type="text" name="ldesc" placeholder="Smooth, melt-in-your-mouth chocolate with almond creme with full descriptive text and all the bells and whistles." required="required"></input><br/>
                        stock: <input type="text" name="stock" placeholder="125" required="required"></input><br/>
                        sku: <input type="text" name="sku" placeholder="CC001" required="required"></input><br/>
                        price: <input type="text" name="price" placeholder="$12.49" required="required"></input><br/>
                        cost: <input type="text" name="cost" placeholder="$6.50" required="required"></input><br/>
                        productImg: <input type="text" name="productImg" placeholder="img/red-velvet-cake.png" required="required"></input><br/>
                        weight: <input type="text" name="weight" placeholder="25g" required="required"></input><br/>
                        size: <input type="text" name="size" placeholder="5x5x2 inches" required="required"></input><br/>
        
                        <input type="submit" value="Create New Product"></input><br/>
                    </fieldset>			
                </form>
            </div>    

    		<div class="fourcol">
                <!-- UPDATE PRODUCT FORM -->
                <form method="post" id="crud-update-product-form" action="updateProduct.php">
                    <fieldset>
                        <legend>Update Existing Product</legend>
        
                        <label for="productNameToCheck">Update the product with name:</label>
                        <input type="text" name="productNameToCheck" id="productNameToCheck" placeholder="Red Velvet Cake" required="required"></input><br/>
        
                         <label for="productName">Product Name:</label>
                        <input type="text" name="productName" id="productName" placeholder="Red Velvet Cake"></input><br/>
        
                        <label for="category">Category:</label>
                        <input type="text" name="category" id="category" placeholder="Cake"></input><br/>
        
                        <label for="isFeatured">Featured?</label>
                        <input type="radio" name="isFeatured" id="isFeatured" value="Yes">Yes</input>
                        <input type="radio" name="isFeatured" id="isFeatured" value="No"></input>No<br>

                        featuredImg: <input type="text" name="featuredImg" placeholder="img/red-velvet-cake.png"></input><br/>
        
                        <label for="sdesc">Short Description</label>
                        <input type="text" name="sdesc" id="sdesc" placeholder="Smooth, melt-in-your-mouth chocolate with almond creme."></input><br/>
        
                        long-description: <input type="text" name="ldesc" placeholder="Smooth, melt-in-your-mouth chocolate with almond creme with full descriptive text and all the bells and whistles."></input><br/>
                        stock: <input type="text" name="stock" placeholder="125"></input><br/>
                        sku: <input type="text" name="sku" placeholder="CC001"></input><br/>
                        price: <input type="text" name="price" placeholder="$12.49"></input><br/>
                        cost: <input type="text" name="cost" placeholder="$6.50"></input><br/>
                        productImg: <input type="text" name="productImg" placeholder="img/red-velvet-cake.png"></input><br/>
                        weight: <input type="text" name="weight" placeholder="25g"></input><br/>
                        size: <input type="text" name="size" placeholder="5x5x2 inches"></input><br/>
        
                        <input type="submit" value="Update Product"></input><br/>
                    </fieldset>			
                </form>
    		</div>
            
            <div class="fourcol last">
			
			<?php
			$username = $_SESSION['user'];
			$userQuery = mysql_query("SELECT level FROM users WHERE username='$username'");
			$userLevel = mysql_fetch_array($userQuery);
			if ($userLevel > 1)	{
				echo '
                <!-- REMOVE PRODUCT FORM -->
                <form method="post" id="crud-remove-product-form" action="removeProduct.php">
                    <fieldset>
                        <legend>Remove Product</legend>
        
                        <label for="productName">Product Name:</label>
                        <input type="text" name="productName" id="productName" placeholder="Red Velvet Cake" required="required"></input><br/>  

                        <input type="submit" value="Remove Product"></input><br/>
                    </fieldset>			
                </form>';
				
			} ?>
    		</div>
        </div><!--/.row-->
    </div><!--/.container-->

	<?php include 'php-includes/footer-include.php'; ?>
	
	</body>
</html>
	