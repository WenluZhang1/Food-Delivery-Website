<?php if (isset($_SESSION["username"])): ?>
			<form id="searchDiv" action="<?php echo base_url();?>Main_controller/search" method="POST">
				<input type="text" class="form-control" id="searchBar" placeholder="Search for restaurants or cuisines" name="keyword">
				<button type="submit" class="btn btn-warning">Search</button>
			</form>
			<div id="searchResult">
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
						<img src="<?php echo base_url(); ?>images/BurgerAd.jpg" class="d-block w-100" alt="Advertisement for dish one">
					</div>
					<div class="carousel-item">
						<img src="<?php echo base_url(); ?>images/PancakeAd.jpg" class="d-block w-100" alt="Advertisement for dish two">
					</div>
					<div class="carousel-item">
						<img src="<?php echo base_url(); ?>images/SushiAd.jpg" class="d-block w-100" alt="Advertisement for dish three">
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
				<?php if(isset($restaurants)) 
					foreach($restaurants as $row){
					echo "
						<a href='Main_controller/loadRestaurant/$row->name'>
						<div class='Dishes'>
							<img src='http://localhost/$row->imagepath' alt='Advertising of this store'>
							<h3>$row->name</h3>
							<p>$row->viewRate ★ (320 Reviews)</p>
							<span class='badge badge-secondary'>$row->tags</span>
						</div>
					</a>
					";
				}?>		
			</div>
		</section>
		
		<section class="Restaurant-Container">
			<h1>Guess You Like</h1>
			<div class="RestDish">
				<a href="https://uq.edu.au/">
					<div class="Dishes">
						<img src="<?php echo base_url(); ?>images/Seafood.jpg" alt="Advertising of this store">
						<h3>Restaurant Four</h3>
						<p>4.2 ★ (416 Reviews)</p>
						<span class="badge badge-secondary">Seafood</span>
						<span class="badge badge-secondary">Thai</span>
					</div>
				</a>
				<a href="https://uq.edu.au/">
					<div class="Dishes">
						<img src="<?php echo base_url(); ?>images/ChineseFood.jpg" alt="Advertising of this store">
						<h3>Restaurant Five</h3>
						<p>4.4 ★ (72 Reviews)</p>
						<span class="badge badge-secondary">Chinese</span>
					</div>
				</a>
				<a href="https://uq.edu.au/">
					<div class="Dishes">
						<img src="<?php echo base_url(); ?>images/Vegan.jpg" alt="Advertising of this store">
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
		<script src="<?php echo base_url(); ?>js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>js/mainScript.js"></script>
	</body>	
