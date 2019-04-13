<?php
    session_start();
?>

<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Food Booking</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Pacifico|Patua+One|Overpass" rel="stylesheet">
	</head>
	
	<body>
		<div id="header">
			<header>
				<a href="index.php"><img class="logo" src="images/FileIHOP_Restaurant_logo.png" alt="Logo for the restaurant">
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
			<div id="searchDiv">
				<input type="text" class="form-control" id="searchBar" placeholder="Search for restaurants or cuisines">
				<button type="button" class="btn btn-warning">Search</button>
			</div>
		<?php else: ?>
			<style type="text/css">
				#carouselExampleControls{
					margin-top: 140px;
				}
			</style>
		<?php endif ?>
		<div id="container">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="images/BurgerAd.jpg" class="d-block w-100" alt="Advertisement for dish one">
					</div>
					<div class="carousel-item">
						<img src="images/PancakeAd.jpg" class="d-block w-100" alt="Advertisement for dish two">
					</div>
					<div class="carousel-item">
						<img src="images/SushiAd.jpg" class="d-block w-100" alt="Advertisement for dish three">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		
		<?php if (isset($_SESSION["username"])): ?>
		<section class="Restaurant-Container">
			<h1>Popular Restaurants</h1>
			<div class="RestDish">
				<a href="https://uq.edu.au/">
					<div class="Dishes">
						<img src="images/Salad.jpg" alt="Advertising of this store">
						<h3>Restaurant One</h3>
						<p>4.6 ★ (320 Reviews)</p>
						<span class="badge badge-secondary">American</span>
						<span class="badge badge-secondary">Salad</span>
					</div>
				</a>
				<a href="https://uq.edu.au/">
					<div class="Dishes">
						<img src="images/IndianFood.jpg" alt="Advertising of this store">
						<h3>Restaurant Two</h3>
						<p>4.2 ★ (48 Reviews)</p>
						<span class="badge badge-secondary">Indian</span>
						<span class="badge badge-secondary">Healthy</span>
					</div>
				</a>
				<a href="https://uq.edu.au/">
					<div class="Dishes">
						<img src="images/FastFood.jpg" alt="Advertising of this store">
						<h3>Restaurant Three</h3>
						<p>3.9 ★ (16 Reviews)</p>
						<span class="badge badge-secondary">Fast Food</span>
					</div>
				</a>
			</div>
		</section>
		
		<section class="Restaurant-Container">
			<h1>Guess You Like</h1>
			<div class="RestDish">
				<a href="https://uq.edu.au/">
					<div class="Dishes">
						<img src="images/Seafood.jpg" alt="Advertising of this store">
						<h3>Restaurant Four</h3>
						<p>4.2 ★ (416 Reviews)</p>
						<span class="badge badge-secondary">Seafood</span>
						<span class="badge badge-secondary">Thai</span>
					</div>
				</a>
				<a href="https://uq.edu.au/">
					<div class="Dishes">
						<img src="images/ChineseFood.jpg" alt="Advertising of this store">
						<h3>Restaurant Five</h3>
						<p>4.4 ★ (72 Reviews)</p>
						<span class="badge badge-secondary">Chinese</span>
					</div>
				</a>
				<a href="https://uq.edu.au/">
					<div class="Dishes">
						<img src="images/Vegan.jpg" alt="Advertising of this store">
						<h3>Restaurant Six</h3>
						<p>3.8 ★ (69 Reviews)</p>
						<span class="badge badge-secondary">Vegan</span>
						<span class="badge badge-secondary">Healthy</span>
					</div>
				</a>
			</div>
		</section>
		<?php else: ?>
            <p class="text-center">To read more information about restaurants, please sign on first.</p>
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

<!-- References:
	https://commons.wikimedia.org/wiki/File:IHOP_Restaurant_logo.svg
	https://commons.wikimedia.org/wiki/File:Location-alt-512.png
	https://zh.wikipedia.org/wiki/File:Ic_account_circle_48px.svg
	https://commons.wikimedia.org/wiki/File:Magnifying_glass_icon.svg
	https://pixabay.com/photos/seafood-platter-crustaceans-food-1232389/
	https://www.pexels.com/photo/chinese-food-365136/
	https://pixabay.com/photos/curry-vegetables-vegetarian-cook-1819752/
	https://pixabay.com/photos/salad-fresh-veggies-vegetables-791891/
	https://commons.wikimedia.org/wiki/File:Indian-Food-wikicont.jpg
	https://pixabay.com/photos/pizza-baking-fast-food-lunch-u-2000595/
	https://www.foodbeast.com/news/shelf-stable-pancake-batter/
	http://www.sushinagoya.com/newsletter_dec_13.htm
	http://ffastfoodblog.blogspot.com/2012/10/advertisements.html
	https://pixabay.com/vectors/blank-profile-picture-mystery-man-973460/
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
--> 