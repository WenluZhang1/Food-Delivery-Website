<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Food Booking</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Pacifico|Patua+One|Overpass" rel="stylesheet">
	</head>
	
	<body>
		<div id="header">
			<header>
				<a href="<?php echo base_url(); ?>"><img class="logo" src="<?php echo base_url(); ?>images/FileIHOP_Restaurant_logo.png" alt="Logo for the restaurant">
			</header>
			
			<nav id="menu">
				<ul>
					<li><a href="https://uq.edu.au/">Categories</a></li>
					<li><a href="https://uq.edu.au/">Delivery</a></li>
					<li><a id="MyOrderLink" href="<?php echo base_url(); ?>Main_controller/loadMyOrder">My Order</a></li>
					<li><a href="https://uq.edu.au/">Contact Us</a></li>
					<li><a href="locationPage.php"><img src="<?php echo base_url(); ?>images/Location-symbol.png" alt="Location icon"></a></li>
					<?php if (isset($_SESSION["username"])): ?>
						<li><a href="<?php echo base_url(); ?>Main_controller/loadProfile"><img src="<?php echo base_url(); ?>images/Account.png" alt="Account icon"></a></li>
					<?php else: ?>
						<li><a class="btn btn-outline-primary" href="<?php echo base_url(); ?>Main_controller/loadSignin" style="color: blue">Sign in</a></li>
					<?php endif ?>
				</ul>
			</nav>
		</div>
