<!DOCTYPE html>
<html>
<head>
	<title>CocoaBean Products</title>
	<meta charset='utf-8'>     
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
<body id="cartProducts">
	
	<?php include 'php-includes/header-include.php'; ?>
	
    <div class="container">
		<div class="row">
            <div class="twelvecol last"> 
                <div class="titlebar">
                    <h2> Products in Cart</h2>
                </div>
            </div>
        </div>
        
        <div class="stuff">
        	<div class="row">
                <div class="twocol">
                    <div class="product">
                        <p>HOLDER</p>
                    </div>
                </div>
                <div class="onecol">
                    <div class="product">
                        <p>1.</p>
                    </div>
                </div>
                <div class="twocol">
                    <div class="product">
                        <p>THUMBNAIL</p>
                    </div>
                </div>  
                <div class="twocol">
                    <div class="product">
                        <p>PRODUCT NAME</p>
                    </div>
                </div>  
                <div class="twocol">
                    <div class="product">
                        <p>SHORT DESC</p>
                    </div>
                </div>
                <div class="twocol">
                    <div class="product">
                        <p>PRICE</p>
                    </div>
                </div>  
                <div class="onecol last">
                    <div class="product">
                        <p>HOLDER</p>
                    </div>
                </div>       
            </div>
        </div>
        
        <div class="stuff">
            <div class="row">
                <div class="twocol">
                    <div class="product">
                        <p>HOLDER</p>
                    </div>
                </div>
                <div class="onecol">
                    <div class="product">
                        <p>2.</p>
                    </div>
                </div>
                <div class="twocol">
                    <div class="product">
                        <p>THUMBNAIL</p>
                    </div>
                </div>  
                <div class="twocol">
                    <div class="product">
                        <p>PRODUCT NAME</p>
                    </div>
                </div>  
                <div class="twocol">
                    <div class="product">
                        <p>SHORT DESC</p>
                    </div>
                </div>
                <div class="twocol">
                    <div class="product">
                        <p>PRICE</p>
                    </div>
                </div>  
                <div class="onecol last">
                    <div class="product">
                        <p>HOLDER</p>
                    </div>
                </div>       
            </div>
		</div>
	    
	    <?php 
	        // here we dynamically create this page depending on what category was clicked earlier.			
	        $selectedCategory = $_GET["category"];			
	        print("selectedCategory = ".$selectedCategory."<br/>");	

	        // select products of selected category from database.				
			$query = mysql_query("SELECT * FROM product WHERE category='$selectedCategory'") or die(mysql_error());				
																													
			// While there are more results in the result set, loop through them and echo select info out.
			while ($results = mysql_fetch_array($query))
			{					
				echo "<div class='catalog-product'>";						
					echo "<img class='catalog-product-image' src='".$results["productImg"]."' alt='".$results["productName"]."'></img>";
					echo "<p class='catalog-product-price'>$".$results["price"]."</p>";
					echo "<a class='buy-button' href='#'>Add to cart</a>";
					echo "<h3>".$results['productName']."</h3>";
					echo "<p class='catalog-description'>".$results["lDesc"]."</p>";
					echo "<p class='product-rating'>Rating: ".$results["rating"]."</p>";
				echo "</div>";
			}				
	    ?>
        
        <div class="row">
        	<div class="total">
            	<div class="sevencol">
                </div>
            	<div class="twocol">
                	<p>TOTAL</p>
                </div>
                <div class="threcol last">
                	<p>500 million and 2 dollars</p>
                </div>
            </div>
        </div>
   
		<div class="row">
        	<div class="ninecol">
            </div>
            <div class="threecol last">
            	<div class="continue">
            		<a href="cart.php" />Continue to Checkout</a>
                </div>
            </div>
        </div>
        
        

    </div><!--/.container-->

	<?php include 'php-includes/footer-include.php'; ?>
	
	</body>
</html>