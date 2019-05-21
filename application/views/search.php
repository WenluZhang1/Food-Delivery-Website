<section class="Restaurant-Container" style="margin-top: 140px;">
	<label id="search_keyword"><?php if(isset($keyword)) echo $keyword ?></label>
	<div class="RestDish">
		<?php if(isset($searched_res)) 
			foreach($searched_res as $row){
			echo "
				<a href='loadRestaurant/$row->name'>
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
