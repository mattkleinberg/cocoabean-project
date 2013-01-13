<?php
	session_start();
	include 'database.php';
	
	$username = $_POST['username'];
	$username = stripslashes($username);
	$username = mysql_real_escape_string($username);
	$password = $_POST['password'];
	$password = stripslashes($password);
	$password = mysql_real_escape_string($password);
	$password = md5($password);
	
	if(isset($_POST['login']) && !empty($username) && !empty($password)){
		$userQuery = mysql_query("SELECT username FROM users WHERE username='$username' AND password='$password'");
		
		$count = mysql_num_rows($userQuery);
		if($count == 1){
			$_SESSION['user'] = $username;
			header('location: index.php');
		}else{
			echo "Incorrect Username or Password";
		}
	}
	mysql_close();
?>