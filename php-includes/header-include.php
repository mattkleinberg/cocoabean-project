<?php
	session_start();
	require("database.php");
	
	if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
		if(isset($_SESSION['user'])){
			$username = $_SESSION['user'];
			$cartQuery = mysql_query("SELECT cart FROM users WHERE username='$username'");
			$newCount = mysql_num_rows($cartQuery);
			if($newCount == 1){
				$newCart = mysql_fetch_array($cartQuery);
				$json = $newCart[0];
				if(!empty($json)){
					$userCart = json_decode($json, true);
					$_SESSION['cart'] = $userCart;
				}else{
					$cart = array();
					$_SESSION['cart'] = $cart;
				}
			}
		}else{
			$cart = array();
			$_SESSION['cart'] = $cart;
		}
	}
	// print_r($_SESSION['cart']);
?>
<header>
	<div class="row">

    	<div class="logo">
            <div class="twocol last">
                <img src="img/logo.png" alt="logo"></img>
            </div>
        </div>
 
    	<div class="moved">   
            
            <div class="threecol">
                <h1 class="logo"><a href="index.php">Cocoa Bean</a></h1>
            </div>
    
            <div class="check">
            	<div class="threecol">            	
                    <form method="post" action="search.php" id="searchform"> 
                        <input type="search" id="searchbox" name="searchArea"/> 
                        <input type="submit" id="search" value="Search" />
                    </form>
                </div>
            </div>
                        
            <div class="cart">
                    
            	<?php
					// if user already exists, switch login form for logout form in header-include.
					if(isset($_SESSION['user']))
					{
						echo '<span>Welcome: '.$_SESSION['user'].'</span>';
						$username = $_SESSION['user'];
						$userQuery = mysql_query("SELECT level FROM users WHERE username='$username'");
						$userLevel = mysql_fetch_array($userQuery);
						if ($userLevel >= 1)	{
							echo '&nbsp; <span><a href="crud.php">Admin Panel</a></span>';
						}
						
						echo '&nbsp;<span><a href="logout.php">Logout</a></span>';
						
						
					}
					else
					{
						// if user does not already exist, check for valid login credentials.
						if(isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password']))
						{
							$username = $_POST['username'];
							$username = stripslashes($username);
							$username = mysql_real_escape_string($username);
							$password = $_POST['password'];
							$password = stripslashes($password);
							$password = mysql_real_escape_string($password);
							$password = md5($password);
							
							if(isset($_POST['login']) && !empty($username) && !empty($password))
							{
								$userQuery = mysql_query("SELECT username FROM users WHERE username='$username' AND password='$password'");
								
								$count = mysql_num_rows($userQuery);

								if($count == 1)
								{
									$_SESSION['user'] = $username;
									header('location: index.php');
									/*$userLevel = mysql_query("SELECT level FROM users WHERE username='$username'");
									$temp = mysql_fetch_array($userLevel);
									
									if ($temp[0] == 2){
										header('location: admin.php');	
									}else{		
										header('location: index.php');
									}*/
								}
								else
								{
									echo "Incorrect Username or Password";
								}
							}

						}

						echo 
						'<form action="" method="post">
							<div class="onecol">
								<input id="login-username" placeholder="Username" type="text" name="username" />
							</div>
							<div class="onecol">
								<input id="login-password" placeholder="Password" type="password" name="password" />
							</div>
							<div class="onecol">
								<input id="login-submit" type="submit" value="Submit" name="login" />
							</div>
							<div class="onecol last">
								<a id="login-signup" href="signup.php">Sign up</a>
							</div>
						</form>';
					} // /else

				?>
                                  
			</div><!--/.cart-->
        </div><!--/.moved-->
	</div><!--/.row-->
        		    
    <div class="row">
		<nav>
			<ul>
				<li class="onecol"><a href="index.php">Home</a></li>
				<li class="onecol"><a href="products.php?category=Cake">Cakes</a></li>
				<li class="onecol"><a href="products.php?category=Cheesecake">Cheesecake</a></li>
				<li class="onecol"><a href="products.php?category=Drinks">Drinks</a></li>
				<li class="onecol"><a href="products.php?category=Fruit">Fruit</a></li>
				<li class="onecol"><a href="products.php?category=Specialty">Specialty</a></li>
				<li class="onecol"><a href="contact.php">Contact</a></li>
	        </ul>	
		</nav>
 
        <div id="cart-contents">
        	<div class="onecol"></div> 			
	    	<div class="twocol">
                <a href="cart.php" class="cartNum"><?php echo 'Your cart has: '.count($_SESSION['cart']).' item(s) in it.'; ?></a><br/>			
			</div>
            <div class="onecol">
                <a href="checkout.php" id="cart-checkout">Checkout</a><br/>
            </div>
        </div>
        	
        <div class="onecol last">
			<img src="img/cart.png" alt="cart"></img>
		</div>
    
	    <div class="row">
	    	<div class="twelve last line"></div>
	   	</div>		

   </div><!--/.row-->

</header>
