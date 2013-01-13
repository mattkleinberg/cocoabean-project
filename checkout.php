<!DOCTYPE html>
<html>
<head>
	<title>CocoaBean Cart</title>
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
<body id="checkout">
	
	<?php include 'php-includes/header-include.php'; ?>
	
		<div class="container">
        
        <div class="row">
            <div class="titlebar">
            	<h2>Checkout</h2>
            </div>
        </div>
		
        <div class="row">

                <form method="post" action="confirm.php" id="payment">
                
              	<div class="fourcol">
                    <fieldset>
                    <legend>Billing Address</legend>
                        <ul>
                            <li>Name: 
                            <input type="text" name="name" /></li>
                            
                            <li>Street Address: 
                            <input type="text" name="b_staddress" /></li>
                            
                            <li>City:
                            <input type="text" name="b_city" /></li>
                            
                            <li>State: 
                            <input type="text" name="b_state" id="b_state" /></li>
                            
                            <li>Zip Code:
                            <input type="text" name="b_zip" /></li>
                        </ul>
                    </fieldset>
                </div>
                
                <div class="fourcol">
                    <fieldset>
                        <legend>Shipping Address (if different from billing)</legend>
                        <ul>
                            <li>Name: 
                            <input type="text" name="sname" /></li>
                            
                            <li>Street Address: 
                            <input type="text" name="s_staddress" /></li>
                            
                            <li>City: 
                            <input type="text" name="s_city" /></li>
                            
                            <li>State: 
                            <input type="text" name="s_state" id="s_state" /></li>
                            
                            <li>Zip Code:
                            <input type="text" name="s_zip" /></li>
                        </ul>
                    </fieldset>
                </div>    
                    
                <div class="fourcol last">    
                <fieldset>
                    <legend>Payment</legend>
                        <ul>
                            <li>Card Number:
                            <input type="text" name="cardnum" /></li>
                            
                            <li>Expiration Date:
                            <input type="text" name="carddate" /></li>
                        </ul>	
                </fieldset>
			</div>
        </div>
            
        <div class="row">
            <div class="twelvecol last">
                <fieldset class="submit">
                    <input  type="submit" id="sumbit" name="submit" value="Submit" /> 
                </fieldset>
            </div>
        </div>
            </form>

            
		</div><!--/.container-->

	<?php include 'php-includes/footer-include.php'; ?>
	
</body>
</html>