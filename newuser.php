<?php
	session_start();
	include 'database.php';
	
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
	mysql_close();
?>