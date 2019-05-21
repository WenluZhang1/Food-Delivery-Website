<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Registration Form</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/styleLogin.css">
	</head>
	
	<body>
		<?php if (isset($_SESSION['registrateFailed'])): ?>
			<p id="registDone">Registration failed. The detail information you entered not satisfy requirements. Please double check the red messages</p>
			<?php unset($_SESSION['registrateFailed']);?>
		<?php endif ?>

		<div class="register-form">
			<form action="<?php echo base_url();?>Main_controller/registration" method="POST">
				<h1>Registration Form</h1>
				<div class="form-row">
					<div class="form-group col-md-6">
					    <label for="inputUsername4">UserName</label>
					    <input type="text" name="username" class="form-control" id="inputUsername4" placeholder="UserName" required>
						<span class="invalidAjax" id="usernameToken"></span>
					</div>
					<div class="form-group col-md-6">
					    <label for="inputPassword4">Password</label>
					    <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password" required>
					    <div class="progress">
						   <div class="progress-bar" id="passwordStrength" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
					    </div>
						<span class="invalidAjax" id="passwordInvalid"></span>
					</div>
					<div class="form-group col-md-6">
					    <label for="inputPhone4">Phone Number</label>
					    <input type="tel" name="phone" class="form-control" id="inputPhone4" placeholder="Phone Number" required>
					    <label class="invalid" id="PhoneInvalid">Phone number should be 10 digits</label>
					</div>
					<div class="form-group col-md-6">
					    <label for="inputEmail4">Email Address</label>
					    <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email Address" required>
						<span class="invalidAjax" id="emailToken"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="inputAddress2">Address</label>
					<input type="text" name="address" class="form-control" id="inputAddress2" placeholder="123 Main St">
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputSuburb">Suburb</label>
						<input type="text" name="suburb" class="form-control" id="inputSuburb">
					</div>
					<div class="form-group col-md-4">
						<label for="inputState">State</label>
						<select id="inputState" name="state" class="form-control">
						<option selected>Choose your state</option>
						<option>New South Wales</option>
						<option>Queensland</option>
						<option>South Australia</option>
						<option>Tasmania</option>
						<option>Victoria</option>
						<option>Western Australia</option>
					  </select>
					</div>
					<div class="form-group col-md-2">
					  <label for="inputCountry">Postcode</label>
					  <input type="number" name="postcode" class="form-control" id="Postcode">
					  <label class="invalid" id="PostcodeInvalid">Postcode should be 4 digits</label>
					</div>
				</div>
				<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="gridCheck" required>
						<label class="form-check-label" for="gridCheck">
							I agree with all terms and conditions
						</label>
					</div>
				</div>
				<button type="submit" class="btn btn-primary" id="registerButton">Sign up</button>
			</form>
		</div>
		<script src="<?php echo base_url(); ?>js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>js/javaScript.js"></script>
	</body>
</html>
