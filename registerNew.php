<?php
	require 'connectMySQL.php';
    session_start();
	
	$usernameNew = $_POST["username"];
	$passwordNew = $_POST["password"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$suburb = $_POST["suburb"];
	$state = $_POST["state"];
	$postcode = $_POST["postcode"];
	
	
	$db = new MySQLDatabase();
	$db->connect();
	
	$query = "INSERT INTO `users` (`username`, `phoneNumber`, `email`, `password`, `address`, `suburb`, `state`, `postCode`) VALUES\n"
    . "('$usernameNew', '$phone', '$email', '$passwordNew', '$address', '$suburb', '$state' , $postcode)";
	if(!isset($_SESSION['usernameToken']) && !isset($_SESSION['emailToken'])){
		$result = $db->query($query);
		if($result){
			$_SESSION["registered"] = 'true';
			header("Location: loginForm.php");
		} else{
			$_SESSION["registFail"] = 'true';
			header("Location: registrationForm.php");
		}
	}
	$db->disconnect();
?>