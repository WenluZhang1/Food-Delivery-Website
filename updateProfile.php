<?php
	require 'connectMySQL.php';
    session_start();
	
	$db = new MySQLDatabase();
	$db->connect();
	$username = $_SESSION['username'];
	
	$usernameUpdate = $_POST["usernameUpdate"];
	$phoneUpdate = $_POST["phoneUpdate"];
	$emailUpdate = $_POST["emailUpdate"];
	$addressUpdate = $_POST["addressUpdate"];
	$suburbUpdate = $_POST["suburbUpdate"];
	$stateUpdate = $_POST["stateUpdate"];
	$postcodeUpdate = $_POST["postcodeUpdate"];
	
	$check_username = "SELECT *  FROM `users` WHERE `username` = '$usernameUpdate'";
	$check_email = "SELECT *  FROM `users` WHERE `email` = '$emailUpdate'";
	$user_already = "SELECT * FROM `users` WHERE `username` = '$username'";
	$query = "UPDATE `users` SET `username` = '$usernameUpdate', `phoneNumber` = '$phoneUpdate', `email` = '$emailUpdate', "
		. "`address` = '$addressUpdate', `suburb` = '$suburbUpdate', `state` = '$stateUpdate',  `postCode` = '$postcodeUpdate' "
		. "WHERE `users`.`username` = '$username'";
	$username_result = $db->query($check_username);
	$email_result = $db->query($check_email);
	$already_result = $db->query($user_already);
	$already = mysqli_fetch_array($already_result);
	$update_username = mysqli_fetch_array($username_result);
	$update_email = mysqli_fetch_array($email_result);
	
	if ($update_username && ($already['username'] != $usernameUpdate)) {
		$_SESSION['usernameUpdateToken'] = "true";
	} 
	if ($update_email && ($already['email'] != $emailUpdate)){
		$_SESSION['emailUpdateToken'] = "true";
	}
	if(isset($_SESSION['usernameUpdateToken']) || isset($_SESSION['emailUpdateToken'])){
		header("Location: profile.php");
	} else{
		$result = $db->query($query);
		if($result){
			$_SESSION['username'] = $usernameUpdate;
			$_SESSION["updatedProfile"] = 'true';
			header("Location: profile.php");
		} else{
			$_SESSION["updateFail"] = 'true';
			header("Location: profile.php");
		}
	}
	$db->disconnect();
?>
