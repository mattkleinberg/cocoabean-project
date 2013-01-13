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
		
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/cart.js"></script>
	<!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
	<script type="text/javascript" src="js/css3-mediaqueries.js"></script>    
	<script type="text/javascript" src="js/google-analytics.js"></script>
</head>
<body id="cartProducts">
	
	<?php include 'php-includes/header-include.php'; ?>
	
    <div class="container">

        <?php 
            $cartContents = $_SESSION['cart'];

            $sizeOfCart = count($cartContents);
         ?>

		<div class="row">
            <div class="twelvecol last"> 
                <div class="titlebar">
                    <h2> Products in Cart</h2>
                </div>
            </div>
        </div>
        
        <div class="cartContents">

            <?php 
            $count = 1;

                foreach ($cartContents as $key) 
                {                                    
                echo"
                    <div class='row'>
                        <div class='onecol'></div>

                        <div class='twocol'>
                            <div class='product'>
                                <p>".$key['name']."</p>
                                <br/>
                                <p>Qty: ".$key['qty']."</p>
                            </div>
                        </div>

                        <div class='twocol'>
                            <div class='product'>
                                <img class='cart-product-image' src='".$key['img']."' alt=''></img>                                
                            </div>
                        </div>                                            

                        <div class='twocol'>
                            <div class='product'>
                                <p>Price: $".$key['price']."</p>
                            </div>
                        </div>  

                        <div class='twocol'>
                            <div class='product'>                                                      
                                <a href='#' class='cart-remove-button' id='id_".$key['id']."'>Remove From Cart</a>
                            </div>
                        </div>  

                        <div class='fivecol last'></div>     
                            
                    </div><!--/.row-->";
                    $count++;
                }


             ?>    
        
        </div><!--/.cartContents-->	   
        
        <div class="row">
            <div class="coltwelve"></div>
        </div>

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
        	<div class="ninecol"></div>            
            <div class="threecol last">
            	<div class="continue">
            		<a href="checkout.php">Continue to Checkout</a>
                </div>
            </div>
        </div>                

    </div><!--/.container-->

	<?php include 'php-includes/footer-include.php'; ?>
	
	</body>
</html>