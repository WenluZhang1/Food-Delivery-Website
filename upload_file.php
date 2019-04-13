<?php
	require 'connectMySQL.php';
    session_start();
	$db = new MySQLDatabase();
	$db->connect();
	if((($_FILES["profileFile"]["type"] == "image/gif") || ($_FILES["profileFile"]["type"] == "image/jpeg")
	|| ($_FILES["profileFile"]["type"] == "image/pjpeg") || ($_FILES["profileFile"]["type"] == "image/png"))
	&& ($_FILES["profileFile"]["size"] < 800000)){
		if($_FILES["profileFile"]["error"] > 0){
			echo "Return Code: " . $_FILES["profileFile"]["error"] . "<br/>";
		} else{
			$path = "profile/" . $_FILES["profileFile"]["name"];
			$username = $_SESSION['username'];
			$upload_profile = "UPDATE `users` SET `profileLink` = '$path' WHERE `username` = '$username'";
			if(file_exists("profile/" . $_FILES["profileFile"]["name"])){
				$db->query($upload_profile);
				header("Location: profile.php");
			} else{
				if(move_uploaded_file($_FILES["profileFile"]["tmp_name"], $path)){
					$db->query($upload_profile);
				}
				$db->disconnect();
				header("Location: profile.php");
			}
		}
	} else{
		echo "Invalid file";
	}
?>