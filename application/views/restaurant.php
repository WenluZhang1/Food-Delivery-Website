<div id="restaurant_detail">
	<div id="detail information">
		<?php if(isset($restaurant)) 
		echo "<label>$restaurant->name</label>
			<p>$restaurant->tags</p>
			<label>Rate: $restaurant->viewRate</label>
			
		";?>
	</div>
	<img class="restaurant_img" src="<?php echo base_url(); ?>images/salad_background.jpg" alt="Restaurant image">
</div>
<hr>

<div id="dishes">
	<label>Resuaurant Meal:</label>
	<?php if(isset($dishes)) 
		foreach($dishes as $row){
		echo "
			<div class='dish_infomration'>
				<div class='dish_details'>
					<h3>$row->dishName</h3>
					<p>$row->description</p>
					<p>Price: $$row->price</p>
					<p>Calories: $row->calories cal</p>	
				</div>
				<form action = 'https://infs3202-35966830.uqcloud.net/Main_controller/addOrder/$row->Rname/$row->dishName' >
					<button class='btn btn-primary' style='height: 40px;' type='submit'>Add to shopping cart</button>
				</form>
			</div>
			<hr>
		";
	}?>
</div>

<form class="addDish_form" action="<?php echo base_url();?>Main_controller/addDish/<?php if(isset($restaurant)) echo $restaurant->name;?>" method="POST">
	<h3>Add a new dish</h3>
	<div class="form-group">
		<label>Dish Name:</label>
		<input type="text" name="dishName" class="form-control" placeholder="Your new dish name" required>
		<?php if(isset($_SESSION['InvalidDish'])) echo "<label id='dishNameInvalid'>Already have that dish</label>"; unset($_SESSION['InvalidDish']); ?>
	</div>
	<div class="form-group">
		<label>Description</label>
		<input type="text" name="dishDescription" class="form-control" placeholder="Description for the dish">
	</div>
	<div class="form-group">
		<label>Price</label>
		<input type="number" name="dishPrice" class="form-control" placeholder="Price for the dish">
	</div>
	<div class="form-group">
		<label>Calories</label>
		<input type="number" name="dishCalories" class="form-control" placeholder="Calories for the dish">
	</div>
	<button type="submit" class="btn btn-primary">Add to list</button>
</form>
<hr>
<div id="commentArea">
	<h3>Comments:</h3>
	<?php if(isset($comments)) 
		foreach($comments as $row){
		echo "
			<div class='comments'>
				<label>Author: $row->author</label>
				<p>$row->comment</p>
			</div>
		";
	}?>

	<form action="<?php echo base_url();?>Main_controller/addComment/<?php if(isset($restaurant)) echo $restaurant->name;?>" method="POST">
		<div class="form-group">
			<label>Add your comment here: </label>
			<input type="text" name="comment" class="form-control" placeholder="Please enter your comment">
		</div>
		<button type="submit" class="btn btn-primary">Add to list</button>
	</form>
</div>
