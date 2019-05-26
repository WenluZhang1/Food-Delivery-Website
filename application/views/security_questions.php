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
			<h1>Security Questions</h1>
			<form action="<?php echo base_url();?>Main_controller/save_security" method="POST">
				<div class="form-group">
					<label for="exampleInputQuestionOne">What's your mother's name?</label>
					<input type="text" name="questionOne" class="form-control" placeholder="Your answer for question one" required>
				</div>
				<div class="form-group">
					<label for="exampleInputQuestionTwo">What's your father's name?</label>
					<input type="text" name="questionTwo" class="form-control" placeholder="Your answer for question two" required>
				</div>
				<a href="loadSignin">Skip</a>
				<button type="submit" class="btn btn-primary">Set</button>
			</form>
		</div>
	</body>
</html>
