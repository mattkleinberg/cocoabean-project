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
<body id="confirm">
	
	<?php include 'php-includes/header-include.php'; ?>
	
		<div class="container">
        
            <div class="row">
                <div class="titlebar">
                    <h2>Thank You For Your Order</h2>
                </div>
            </div>
            
                
            <div class="row">
                <div class="threecol"> 
                     <h3> Payment Reciept </h3>           
                </div>
                
    			<div class="fivecol">
                
                    <table>
                        <tr>
                            <td>Recieved:</td>
                            <td>November 9th 2012 - 10:43am ET </td>               
                        </tr>   
                        
                        <tr>
                            <td>Amount:</td>
                            <td>$39.46</td>
                       </tr>
                       <tr>
                            <td>Card Information:</td>
                            <td>Master Card ENDING *3256</td>
                        </tr>
                        <tr>
                            <td>Billing Information:</td>
                            <td>4000 Central Blvd. Orlando, FL 32816</td>
                        </tr>
                    </table>
                    
                </div>
                                
                <div class="fourcol last">
                  	<p>To return to the home page <a href="index.php" /> Click Here </a></p>  
                </div>
                   
            </div>
           
		</div><!--/.container-->

	<?php include 'php-includes/footer-include.php'; ?>
	
</body>
</html>