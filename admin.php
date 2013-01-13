<!DOCTYPE html>
<html>
<head>
	<title>CocoaBean Admin</title>
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
<body id="admin">

	<?php include 'php-includes/header-include.php'; ?>

    <div class="container">
        <form  method="post" action="#"  id="admin"> 
			<?php 
				if(isset($_SESSION['user'])){
					$_SESSION['user'] = $username;
					$userLevel = mysql_query("SELECT level FROM users WHERE username='$username'");
					$temp = mysql_fetch_array($userLevel);
					print_r($temp['level']);
					if(!$temp['level'] >= 2){
						header('location: index.php');
					}else{
						header('location: crud.php');
					}
				}else{
					header('location: index.php');
				}
			?>
        </form>
    </div>

	<?php include 'php-includes/footer-include.php'; ?>
	
</body>
</html>
