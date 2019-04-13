<?php
    session_start();
	require 'connectMySQL.php';
	if (isset($_GET["logout"])) {
        session_destroy();
        header("Location: index.php");
    }
	$db = new MySQLDatabase();
	$db->connect();
	$username = $_SESSION['username'];
	$get_all = "SELECT *  FROM `users` WHERE `username` = '$username'";
	$user_profile = $db->query($get_all);
	if ($row = mysqli_fetch_array($user_profile)) {
		$link = $row['profileLink'];
		$phone = $row['phoneNumber'];
		$email = $row['email'];
		$address = $row['address'];
		$suburb = $row['suburb'];
		$state = $row['state'];
		$postcode = $row['postCode'];
	}
	$db->disconnect();
	
	if(isset($_SESSION['usernameUpdateToken']) && !isset($_SESSION['emailUpdateToken'])){
		echo "<style> #invalidUsernameUpdate{display: inline;} </style>";
		unset($_SESSION['usernameUpdateToken']);
	} else if(isset($_SESSION['emailUpdateToken']) && !isset($_SESSION['usernameUpdateToken'])){
		echo "<style> #invalidEmailUpdate{display: inline;} </style>";
		unset($_SESSION['emailUpdateToken']);
	} else if(isset($_SESSION['usernameUpdateToken']) && isset($_SESSION['emailUpdateToken'])){
		echo "<style> #invalidUsernameUpdate, #invalidEmailUpdate{display: inline;} </style>";
		unset($_SESSION['usernameUpdateToken']);
		unset($_SESSION['emailUpdateToken']);
		
	}
	
	if(isset($_SESSION['updatedProfile'])){
		echo "<style> #savedProfile{display: inline;} </style>";
		unset($_SESSION['updatedProfile']);
	}
	if(isset($_SESSION['updateFail'])){
		echo "Update Failed";
		unset($_SESSION['updateFail']);
	}
?>

<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>My Profile</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Pacifico|Patua+One|Overpass|Dokdo|Nunito" rel="stylesheet">
	</head>
	
	<body>
		<div id="header">
			<header>
				<a href="index.php"><img class="logo" src="images/FileIHOP_Restaurant_logo.png" alt="Logo for the restaurant"></a>
			</header>
			
			<nav id="menu">
				<ul>
					<li><a href="https://uq.edu.au/">Categories</a></li>
					<li><a href="https://uq.edu.au/">Delivery</a></li>
					<li><a href="https://uq.edu.au/">My Order</a></li>
					<li><a href="https://uq.edu.au/">Contact Us</a></li>
					<li><a href="locationPage.php"><img src="images/Location-symbol.png" alt="Location icon"></a></li>
					<?php if (isset($_SESSION["username"])): ?>
						<li><a href="profile.php"><img src="images/Account.png" alt="Account icon"></a></li>
					<?php else: ?>
						<li><a class="btn btn-outline-primary" href="loginForm.php" style="color: blue">Sign in</a></li>
					<?php endif ?>
				</ul>
			</nav>
		</div>
		<?php if (isset($_SESSION["username"])): ?>
		<div id="profile">
			<div id="profileUpload">
				<?php echo '<img id="profileImg" src="' . $link . '">'; ?>
				<form action="upload_file.php" method="POST" enctype="multipart/form-data">
					<label id="profilePictureLabel">Upload your profile picture:</label>
					<input type="file" name="profileFile">
					<br/>
					<button class="btn btn-info" type="submit" name="submitProfilePicture">Upload profile picture</button>
				</form>
			</div>
			<div id="profileContainer">
				<form class="profileForm" action="updateProfile.php" method="POST">
					<div class="profileRow">
						<label class="detailLabel">UserName:</label><input name="usernameUpdate" class="profileInput" value="<?php echo $username;?>">
						<label class="invalidUpdate" id="invalidUsernameUpdate">User name already be token</label>
						<span class="invalidUpdate" id="invalidUsernameUpdate"></span>
					</div>
					<div class="profileRow">
						<label class="detailLabel">Phone Number:</label><input name="phoneUpdate" class="profileInput" value="<?php echo $phone;?>">
					</div>
					<div class="profileRow">
						<label class="detailLabel">Email:</label><input name="emailUpdate" class="profileInput" value="<?php echo $email;?>">
						<label class="invalidUpdate" id="invalidEmailUpdate">Email address already be token</label>
					</div>
					<div class="profileRow">
						<label class="detailLabel">Address:</label><input name="addressUpdate" class="profileInput" value="<?php echo $address;?>">
					</div>
					<div class="profileRow">
						<label class="detailLabel">Suburb:</label><input name="suburbUpdate" class="profileInput" value="<?php echo $suburb;?>">
					</div>
					<div class="profileRow">
						<label class="detailLabel">State:</label><input name="stateUpdate" class="profileInput" value="<?php echo $state;?>">
					</div>
					<div class="profileRow">
						<label class="detailLabel">Postcode:</label><input name="postcodeUpdate" class="profileInput" value="<?php echo $postcode;?>">
					</div>
					<button class="btn btn-primary" id="profileButton" type="submit" name="saveChanges">Update Profile Information</button>
					<label class="updateSuccessLabel" id="savedProfile">All Profile information saved now</label>
				</form>
				<form class="profileForm" action="profile.php" method="GET">
					<button class="btn btn-primary" type="submit" name="logout">Log Out</button>
				</form>
			</div>
		</div>
		<?php else: ?>
			<p class="textLoginMargin">Please Sign in First</p>
		<?php endif ?>
	</body>
	
	<footer>
		<div>
			<h2>Join Us</h2>
			<ul>
				<li><a href="https://uq.edu.au/">Restaurant Partner</a></li>
				<li><a href="https://uq.edu.au/">Delivery Partner</a></li>
				<li><a href="https://uq.edu.au/">About Us</a></li>
			</ul>
		</div>
		<div>
			<h2>Service Hotline</h2>
			<p>123-456-7890<br>098-765-4321</p>
		</div>
		<div>
			<a href="https://uq.edu.au/"><img src="images/Facebook.png" alt="Picture of facebook"></a>
			<a href="https://uq.edu.au/"><img src="images/Twitter.jpg" alt="Picture of twitter"></a>
			<a href="https://uq.edu.au/"><img src="images/Youtube.png" alt="Picture of youtube"></a>
		</div>
	</footer>
</html>