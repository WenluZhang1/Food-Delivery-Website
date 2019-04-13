<?php
	require 'connectMySQL.php';
    session_start();
	
	$db = new MySQLDatabase();
	$db->connect();
		
	if(isset($_POST["user_name"])){
		$usernameNew = $_POST["user_name"];
		$check_username = "SELECT *  FROM `users` WHERE `username` = '$usernameNew'";
		$username_result = $db->query($check_username);
		if (mysqli_fetch_array($username_result)) {
			$_SESSION['usernameToken'] = "true";
			echo "1";
		} else{
			unset($_SESSION['usernameToken']);
		}
	}
	
	if(isset($_POST["user_email"])){
		$emailNew = $_POST["user_email"];	
		$check_email = "SELECT *  FROM `users` WHERE `email` = '$emailNew'";
		$email_result = $db->query($check_email);
		if (mysqli_fetch_array($email_result)) {
			$_SESSION['emailToken'] = "true";
			echo "1";
		} else{
			unset($_SESSION['emailToken']);
		}
	}
	$db->disconnect();
?>