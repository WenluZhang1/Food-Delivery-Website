<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Login Form</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/styleLogin.css">
	</head>
	
	<body>
		<?php if (isset($_SESSION["registered"])): ?>
			<p id="registDone">You have registered in a new account! Vertify your email and try to log in now!</p>
			<?php unset($_SESSION["registered"]);?>
		<?php elseif (isset($_SESSION['unvertify'])): ?>
			<p id="registDone">Please vertify your email first before login</p>
			<?php unset($_SESSION['unvertify']);?>
		<?php endif ?>
		
		<div class="sign-on-form">
			<h1>Sign On</h1>
			<form action="<?php echo base_url();?>Main_controller/login" method="POST">
				<div class="form-group">
					<label for="exampleInputUsername">UserName</label>
					<input type="text" name="username" class="form-control" id="exampleInputUsername" placeholder="Enter username"
					value="<?php if (isset($_COOKIE["username"])): echo $_COOKIE["username"]; endif ?>" required>
					<label class="invalid" id="usernameInvalid">Username is not registered in</label>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" 
					value="<?php if (isset($_COOKIE["password"])): echo $_COOKIE["password"]; endif ?>" required>
					<label class="invalid" id="passwordInvalid">The password should be 8-16 characters include lowercase and uppercase letters and numbers.</label>
					<label class="invalid" id="passwordInvalid1">Incorrect Password!</label>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" <?php if (isset($_COOKIE["username"])): echo "checked"; endif ?> name="remember" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Remember my account</label>
				</div>
				<a href="loadForgotPassword">Forgot Password?</a>
				<a href="loadRegistration">Register a new account</a>
				<button type="submit" class="btn btn-primary">Login</button>
			</form>
		</div>
	</body>
</html>
