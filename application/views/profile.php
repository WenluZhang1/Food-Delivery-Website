<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>My Profile</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Pacifico|Patua+One|Overpass|Dokdo|Nunito" rel="stylesheet">
	</head>
	
	<body>
		<div id="header">
			<header>
				<a href="<?php echo base_url(); ?>"><img class="logo" src="<?php echo base_url(); ?>images/FileIHOP_Restaurant_logo.png" alt="Logo for the restaurant"></a>
			</header>
			
			<nav id="menu">
				<ul>
					<li><a href="https://uq.edu.au/">Categories</a></li>
					<li><a href="https://uq.edu.au/">Delivery</a></li>
					<li><a href="<?php echo base_url(); ?>Main_controller/loadMyOrder">My Order</a></li>
					<li><a href="https://uq.edu.au/">Contact Us</a></li>
					<li><a href="locationPage.php"><img src="<?php echo base_url(); ?>images/Location-symbol.png" alt="Location icon"></a></li>
					<?php if (isset($_SESSION["username"])): ?>
						<li><a href="profile.php"><img src="<?php echo base_url(); ?>images/Account.png" alt="Account icon"></a></li>
					<?php else: ?>
						<li><a class="btn btn-outline-primary" href="<?php echo base_url(); ?>Main_controller/loadSignin" style="color: blue">Sign in</a></li>
					<?php endif ?>
				</ul>
			</nav>
		</div>
		<?php if (isset($_SESSION["username"])): ?>
		<div id="profile">
			<div id="profileUpload">
				<img id="profileImg" src="http://localhost/<?php if(isset($userInformation))echo $userInformation->profileLink;?>">
				<?php echo form_open_multipart('Main_controller/upload_file'); ?>
					<label id="profilePictureLabel">Upload your profile picture:</label>
					<input type="file" name="profileFile">
					<br/>
					<button class="btn btn-info" type="submit" name="submitProfilePicture">Upload profile picture</button>
				</form>
			</div>
			<div id="profileContainer">
				<form class="profileForm" action="modify_profile" method="POST">
					<div class="profileRow">
						<label class="detailLabel">UserName:</label><input name="usernameUpdate" class="profileInput" value="<?php if(isset($userInformation))echo $userInformation->username;?>">
						<label class="invalidUpdate" id="invalidUsernameUpdate">User name already be token</label>
					</div>
					<div class="profileRow">
						<label class="detailLabel">Phone Number:</label><input name="phoneUpdate" class="profileInput" value="<?php if(isset($userInformation))echo $userInformation->phoneNumber;?>">
					</div>
					<div class="profileRow">
						<label class="detailLabel">Email:</label><input name="emailUpdate" class="profileInput" value="<?php if(isset($userInformation))echo $userInformation->email;?>">
						<label class="invalidUpdate" id="invalidEmailUpdate">Email address already be token</label>
					</div>
					<div class="profileRow">
						<label class="detailLabel">Address:</label><input name="addressUpdate" class="profileInput" value="<?php if(isset($userInformation))echo $userInformation->address;?>">
					</div>
					<div class="profileRow">
						<label class="detailLabel">Suburb:</label><input name="suburbUpdate" class="profileInput" value="<?php if(isset($userInformation))echo $userInformation->suburb;?>">
					</div>
					<div class="profileRow">
						<label class="detailLabel">State:</label><input name="stateUpdate" class="profileInput" value="<?php if(isset($userInformation))echo $userInformation->state;?>">
					</div>
					<div class="profileRow">
						<label class="detailLabel">Postcode:</label><input name="postcodeUpdate" class="profileInput" value="<?php if(isset($userInformation))echo $userInformation->postCode;?>">
					</div>
					<button class="btn btn-primary" id="profileButton" type="submit" name="saveChanges">Update Profile Information</button>
					<label class="updateSuccessLabel" id="savedProfile">All Profile information saved now</label>
				</form>
				<form class="profileForm" action="<?php echo base_url();?>Main_controller/logout" method="GET">
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
			<a href="https://uq.edu.au/"><img src="<?php echo base_url(); ?>images/Facebook.png" alt="Picture of facebook"></a>
			<a href="https://uq.edu.au/"><img src="<?php echo base_url(); ?>images/Twitter.jpg" alt="Picture of twitter"></a>
			<a href="https://uq.edu.au/"><img src="<?php echo base_url(); ?>images/Youtube.png" alt="Picture of youtube"></a>
		</div>
	</footer>
</html>
