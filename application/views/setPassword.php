<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Login Form</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/styleLogin.css">
	</head>
	
	<body>		
		<div class="sign-on-form">
			<h1>Set Password</h1>
			<form action="<?php echo base_url();?>Main_controller/set_new_password" method="POST">
				<div class="form-group">
					<label for="exampleInputUsername">Your New Password is:</label>
					<input type="text" name="setNewPassword" class="form-control" placeholder="Your new password here" required>
				</div>
				<button type="submit" class="btn btn-primary">Save</button>
			</form>
		</div>
	</body>
</html>
