<?php if (isset($_SESSION["username"])): ?>	
	<div id="myOrderContainer">
		<?php if(isset($orderDetail)) 
			foreach($orderDetail as $row){
			echo "
				<div class = 'orders'>
					<div class='orders_information'>
						<h3>$row->Rname</h3>
						<p>Meal: $row->dishName</p>
						<p>Price: $row->price</p>
					</div>
					<form action = 'https://infs3202-35966830.uqcloud.net/Main_controller/removeOrder/$row->Rname/$row->dishName' >
						<button class='btn btn-primary' style='height: 40px;' type='submit'>remove from shopping cart</button>
					</form>
				</div>
				<hr>
			";
		}?>		
	</div>
	<form action = 'https://infs3202-35966830.uqcloud.net/Main_controller/loadPDF' >
		<button class='btn btn-primary' id = "pdfButton" type='submit'>Generate payment invoice pdf</button>
	</form>

<?php else: ?>
	<p class="text-center" style="margin-top:140px;">To read more information about restaurants, please sign on first.</p>
<?php endif ?>

