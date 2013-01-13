<?php
	include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>CocoaBean Search</title>
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
		@import url("css/jquery.fancybox.css") screen;
	</style>
		
	<!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
	<script type="text/javascript" src="js/css3-mediaqueries.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<script type="text/javascript" src="js/products.js"></script>
    
	<script type="text/javascript" src="js/google-analytics.js"></script>
</head>
<body id="search">

	<?php include 'php-includes/header-include.php'; ?>

	<div class="content">
		<div class="container">
        
        <div class="row">
            <div class="twelvecol last"> 
                <div class="titlebar">
                    <h2> Search Results </h2>
                </div>
            </div>
        </div>
        
        	<div class="row">
            <?php 

		        $productCount = 1;
				$searchTerm = $_POST['searchArea'];
				if (isset($_SESSION['thanks']))	{
					echo $_SESSION['thanks'];
					unset($_SESSION['thanks']);
				}
				
								
				$query = mysql_query("SELECT * FROM product WHERE productName LIKE '%$searchTerm%'")or die($query."<br/><br/>".mysql_error());
																														
				// While there are more results in the result set, loop through them and get select info out.
				// every four products, add class=last				

				while ($results = mysql_fetch_array($query))
				{	

					if ($productCount%4 == 0)
					{
						// product is a factor of 4, add class=last
						echo "<div class='threecol last'>";						
					}
					else
					{
						// product is not a factor of 4, don't add class=last
						echo "<div class='threecol'>";
					}

						echo "	
						<div class='product num-".$results['id']."'>                	
		                	<a href='#lBox-".$results['id']."' class='item'><div class='crop'><img src='".$results['productImg']."' alt='".$results['productName']."'></img></div></a>
		                	<h3><a href='#lBox-".$results['id']."' class='item'>".$results['productName']."</a></h3>
		                	<p>$".$results['price']."</p>
		                	<span class='buy-button' id='id_".$results['id']."'>Add to Cart</span>
		                    <p>".$results['sDesc']."</p>
		                    <p> Rating: <span class='rating-".$results['rating']."'>".$results['rating']."</span></p>
		                </div><!--/.product-->
	            	</div><!--/.threecol-->
					";
					$initialRating = $results['rating'];
					// Query database for this product's reviews
					$curr_id = $results['id'];
					$searchReviews = mysql_query("SELECT * FROM reviews WHERE prod_id='$curr_id'") or die(mysql_error());
					
					// Write lightbox div with reviews for each product
					echo '
						<div style="display: none;">
							<div class="lBox" id="lBox-'.$results['id'].'">
							
							<div class="row">
								<div class="fourcol">
									<h3>'.$results['productName'].'</h3>
									<img src="'.$results['productImg'].'" alt="" />
								</div>
								<div class="sixcol last">
									<p>'.$results['lDesc'].'</p><br /><br />
									<p class="price">$'.$results['price'].'
									<a class="buy-button" id="id_'.$results['id'].'">Add to Cart</a></p><br /><br />
									<h4>Submit Review</h4>
									';
									if (isset($_SESSION['user']))	{
	
									// Review Form loaded into product lightboxes for logged in users.
									// Blame Sherry if this is super cray cray.
							
									// Check if user is !logged in
									
									$theuser = $_SESSION['user'];
									$productID = $results['id'];
								
									// Check if this user has already reviewed this product
									$reviewQuery = mysql_query("SELECT id FROM reviews WHERE user_id='$theuser' AND prod_id='$productID'");
									$reviewed = mysql_num_rows($reviewQuery);
									
									// Otherwise, they're logged in and haven't reviewed, so show them the form:
									if ($reviewed == 0)	{
								
									
										echo '
										<div class="row">

										<form action="" method="post" id="review-form">
											<input type="hidden" id="productID" value="'.$curr_id.'" name="productID" style="display: none" />
											<input type="hidden" id="theuser" value="'.$_SESSION['user'].'" name="theuser" style="display: none;" />
														
														<img class="rating" src="img/rating/norating.png" alt="no rating" ></img>
														<img class="rating" src="img/rating/norating.png" alt="no rating" ></img>
														<img class="rating" src="img/rating/norating.png" alt="no rating" ></img>
														<img class="rating" src="img/rating/norating.png" alt="no rating" ></img>
														<img class="rating" src="img/rating/norating.png" alt="no rating" ></img><br />
										
														<input type="radio" name="rating" id="rating" value="1" />
														<input type="radio" name="rating" id="rating" value="2" />
														<input type="radio" name="rating" id="rating" value="3" />
														<input type="radio" name="rating" id="rating" value="4" />
														<input type="radio" name="rating" id="rating" value="5" /><br />
														
												<textarea maxlength="255" placeholder="Write a review." name="review-text" id="review-text"></textarea>
											
											<input class="review-submit" id="rev-submit submit-'.$curr_id.'" type="submit" value="Submit" name="leave-review-'.$curr_id.'" />
										</form>
										</div>';
									}
									
									else	{
										echo '<p>You have already reviewed this item.</p>';
									}
								}
								
								else {
									echo '<p>Log in to leave a review.</p>';
								}
								// Submit form
								if (isset($_SESSION['user']) && isset($_POST['leave-review-'.$curr_id]))	{
									// Check if fields are empty
									if (!(empty($_POST['productID'])) && !(empty($_POST['theuser'])) && !(empty($_POST['rating'])))	{
										$productID = $_POST['productID'];
										$productID = stripslashes($productID);
										$productID = mysql_real_escape_string($productID);
										
										$theuser = $_POST['theuser'];
										$theuser = stripslashes($theuser);
										$theuser = mysql_real_escape_string($theuser);
										
										$reviewText = $_POST['review-text'];
										$reviewText = stripslashes($reviewText);
										$reviewText = mysql_real_escape_string($reviewText);
										
										$therating = $_POST['rating'];
										$therating = stripslashes($therating);
										$therating = mysql_real_escape_string($therating);
										
										// Make sure no funny business is going on with the rating.
										if ($therating < 0 && $therating > 5)	{
											echo '<p>Error.</p>';
										}
										// Otherwise, we're good!  Add this to the DB~
										else	{
										
											$addReview = "INSERT INTO reviews (prod_id, user_id, review_text, rating) VALUES ('$productID','$theuser','$reviewText','$therating')";
											$addQuery = mysql_query($addReview) or die(mysql_error());
											
											// And calculate the new overall rating for that product!
											if ($initialRating == 0)	{
												$updateRating = "UPDATE product SET rating='$therating' WHERE id='$productID'";
												$addUpdatedRating = mysql_query($updateRating) or die(mysql_error());
											}
											else	{
												$getReviews = "SELECT * FROM reviews WHERE prod_id='$productID'";
												$getReviewsQuery = mysql_query($getReviews) or die(mysql_error());
												
												$r_count = 1; // number of reviews
												$currr = 0; // total score
												
												// Figure out what the rating should be, giving each rating equal weight.
												while($theReview = mysql_fetch_array($getReviewsQuery))	{
													$r_count++;
													$currr += $theReview['rating'];
												}
												
												$currr = ($therating + $currr)/$r_count; //get final overall rating
												$updateRating = "UPDATE product SET rating='$currr' WHERE id='$productID'";
												$getReviewsQuery = mysql_query($getReviews) or die(mysql_error());
											}
											
											$thanks = "<p>Thank you for your review.</p>";
											$_SESSION['thanks' ] = $thanks;
											
										}	
									}
									else	{
										echo '<p>You left some fields blank.</p>';
									}
								}
														
											
															
															// If the rating isn't 0, then we know reviews have been left (minimum rating is 1)
															if ($initialRating != 0)	
															{
																$getReviews = "SELECT * FROM reviews WHERE prod_id='$productID'";
																$getReviewsQuery = mysql_query($getReviews) or die(mysql_error());
																while($reviews = mysql_fetch_array($getReviewsQuery))	
																{
																	
																	echo '
																		<div class="review">
																			<p class="rating-'.$reviews['rating'].'">'.$reviews['rating'].'</p>
																			<p>'.$reviews['review_text'].'</p>
																			<p>by '.$reviews['user_id'].'</p>
																		</div>
																	';
																
																} //end while
															} //end if
															
															
															
															// If there are no reviews for this product:
															else if ($initialRating == null || $initialRating == 0)
															{
																
															}
															
echo '		</div><!--/.lBox-->
													</div>';
							
												$productCount++;
															echo '</div>
															
														</div>';
												}		
		    ?>    
		</div>
	</div>

	<?php include 'php-includes/footer-include.php'; ?>
	
</body>
</html>