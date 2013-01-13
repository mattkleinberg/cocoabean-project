<?php
	include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>CocoaBean Sign Up</title>
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
<body id="search">

	<?php include 'php-includes/header-include.php'; ?>

	<div class="content">
		<div class="container">
        
        <div class="row">
            <div class="twelvecol last"> 
                <div class="titlebar">
                    <h2> Sign Up </h2>
                </div>
            </div>
        </div>
		<?php
			if(isset($_POST['signUpLogin']) && !empty($_POST['signUpUsername']) && !empty($_POST['signUpPassword']) && !empty($_POST['signUpRepassword'])){
				$username = $_POST['signUpUsername'];
				$username = stripslashes($username);
				$username = mysql_real_escape_string($username);
				$password = $_POST['signUpPassword'];
				$password = stripslashes($password);
				$password = mysql_real_escape_string($password);
				$repassword = $_POST['signUpRepassword'];
				$repassword = stripslashes($repassword);
				$repassword = mysql_real_escape_string($repassword);
				
				if(isset($_POST['signUpLogin']) && !empty($username) && !empty($password) && !empty($repassword) && $password == $repassword){
					$userQuery = mysql_query("SELECT username FROM users WHERE username='$username'");
					$count = mysql_num_rows($userQuery);
					if($count ==1){
						echo 'That username is already taken.';
					}else{
						$password_encrypt = md5($password);
						$addUser = "INSERT INTO users (username, password) VALUES ('".$username."','".$password_encrypt."')";
						$addQuery = mysql_query($addUser);
						$_SESSION['user'] = $username;
						header('location: index.php');
					}
				}else{
					echo 'error';
				}
			}
		?>
        	<div class="row">
            <div class="fourcol">
            </div>
            <div class="fourcol">
			<form action="" method="post">
				<input placeholder="Username" type="text" name="signUpUsername" /><br />	
				<input placeholder="Password" type="password" name="signUpPassword" /><br />
				<input placeholder="Re-Password" type="password" name="signUpRepassword" /><br />
				<input type="submit" value="Submit" name="signUpLogin" />
			</form>
            </div>
            <div class="fourcol last">
            </div>
            </div>
		</div>
	</div>

	<?php include 'php-includes/footer-include.php'; ?>
	
</body>
</html>
