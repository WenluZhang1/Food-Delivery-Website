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
			<h1>Please Answer Your Security Question First</h1>
			<form action="<?php echo base_url();?>Main_controller/check_security" method="POST">
				<div class="form-group">
					<label for="exampleInputUsername">Username: </label>
					<input type="text" name="usernameForgot" class="form-control" placeholder="Your username here" required>
					<label class="invalid" id="usernameInvalidForgot">Username is not registered in</label>
				</div>
				<div class="form-group">
					<label for="exampleInputQuestionOne">What is your mother name?</label>
					<input type="text" name="questionOneForgot" class="form-control" placeholder="Your answer for question one" required>
					<label class="invalid" id="questionOneInvalid">The answer is not correct!</label>
				</div>
				<div class="form-group">
					<label for="exampleInputQuestionTwo">What is your father name?</label>
					<input type="text" name="questionTwoForgot" class="form-control" placeholder="Your answer for question two" required>
					<label class="invalid" id="questionTwoInvalid">The answer is not correct!</label>
				</div>
				<button type="submit" class="btn btn-primary">Next Step</button>
			</form>
		</div>
	</body>
</html>
