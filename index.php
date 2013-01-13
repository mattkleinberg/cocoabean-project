<!DOCTYPE html>
<html>
<head>
	<title>CocoaBean Home</title>
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
        @import url("css/responsiveslides.css") screen;
        @import url("css/demo.css") screen;
	</style>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

	<!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
	<script type="text/javascript" src="js/css3-mediaqueries.js"></script>
    
	<script type="text/javascript" src="js/google-analytics.js"></script>

    <!--JS for img slider-->
    <script type="text/javascript" src="js/responsiveslides.min.js"></script>
    <script type="text/javascript" src="js/responsiveimgslide.js"></script>



  
</head>
<body id="home">
	
	<?php include "php-includes/header-include.php"; ?>
	
	<div class="container">
            <div class="row">
                <div class="twelvecol last">
                    <div class="titlebar">
                        <h2><span class="price">Featured Hot Item</span></h2>
                    </div>
                    <!--Image Slider-->
                    <div class="callbacks_container">
                      <ul class="rslides" id="slider3">
                        <li>
                            <img src="img/featured/drink1.jpg" alt="" />
                            <p class="caption">Delicious Pumpkin Chocolate Latte.</p>
                        </li>
                        <li>
                            <img src="img/featured/cupcake.jpg" alt="" />
                            <p class="caption">Chocoholic Cupcakes</p>
                        </li>
                        <li>
                          <img src="img/featured/cheesecake003.jpg" alt="" />
                          <p class="caption">Chocolate Molten Lava Cheesecake</p>
                        </li>
                        <li>
                          <img src="img/featured/cake2.jpg" alt="" />
                          <p class="caption">Mini White Chocolate Tuxedo Cheesecakes</p>
                        </li>
                      </ul>
                    </div>
                    <!--End image slider-->
                </div>		
            </div>
            
            <div class="row">
                <div class="twelvecol last"> 
                    <div class="titlebar">
                        <h2> A Little About Our Company </h2>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="sevencol">
                    <p>Dive into your favorite gourmet treat, Chocolate!  At Cocoa Bean, we hand craft all of our recipes.  We make all of your chocolate dreams come true, all in one stop.<br /> For our specialty chocolates, we start with the finest of ingredients.  We have whites, milks, and dark chocolates, all of which are from Belgium.  Some of which are solid pieces of decadence.  Others are filled with the finest of truffles.  All of which are delicious! <br />The cupcakes and cakes are surely a treat.  They are all chocolate and range in flavors as well, including: white chocolate, traditional chocolate, German chocolate, and even red velvet (yes, it is a chocolate based cake… we just blew your mind, we know).  All of which are decadent and soft cakes.  Dried out dull cakes are a subject of the past with Cocoa Bean.<br />Now onto our cheesecakes, which are transcendent!  First of all, who does not enjoy cheesecakes?  Well, ours are something to marvel at.  They include a variety of flavors with marbling of even more chocolate.  It’s like chocolate on chocolate on cheese action. So delicious! <br />Chocolate covered treats are a perfect treat for the certain someone special in your life.  This category includes the typical, but not typical in flavor, chocolate covered strawberries.  What a treat!  Other chocolate covered candies include more fruits like oranges and bananas (just in case you are worried about that girlish figure of yours).  <br />Our chocolate drinks include, of course, hot chocolate.  But they are more than your typical hot chocolate that you get out of that gas station instant cocoa machine.  Ours are thick and perfect to snuggle up in front of a warm fire in the winter.  But we also offer iced chocolate drinks for those hotter summer months as well!<br />Surely you will find all of our categories of chocolate amazing.   We even make ourselves hungry talking about them all!</p>
                </div>
                <div class="fivecol last">
                    <img src="img/shop.jpg" class="shop" alt="The Shop" />
                </div>
            </div>
        </div>
    </div>

	<?php include 'php-includes/footer-include.php'; ?>
	
</body>
</html>