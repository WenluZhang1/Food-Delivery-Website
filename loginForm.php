<?php
	require 'connectMySQL.php';
	session_start();
	
	if (isset($_POST["username"]) && isset($_POST["password"])) {

        if (isset($_POST["remember"])) {
            setcookie("username", $_POST["username"], time() + 60*60*24, "/");
			setcookie("password", $_POST["password"], time() + 60*60*24, "/");
            $_COOKIE["username"] = $_POST["username"];
			$_COOKIE["password"] = $_POST["password"];
        } else {
            setcookie("username", null, -1, "/");
			setcookie("password", null, -1, "/");
        }
		
		$db = new MySQLDatabase();
        $db->connect();
        $username = $_POST["username"];
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $db->query($query);
        if ($row = mysqli_fetch_array($result)) {
            if ($_POST['password'] === $row['password']) {
                $_SESSION["username"] = $_POST["username"];
                header("Location: index.php");
            } else {
                echo "<style> #passwordInvalid1{display: block;} </style>";
            } 
        } else {
            echo "<style> #usernameInvalid{display: block;} </style>";
        }
        $db->disconnect();
	}
?>

<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Login Form</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="css/styleLogin.css">
	</head>
	
	<body>
		<?php if (isset($_SESSION["registered"])): ?>
			<p id="registDone">You have registered in a new account! Try to log in now!</p>
			<?php unset($_SESSION["registered"]);?>
		<?php endif ?>
		
		<div class="sign-on-form">
			<h1>Sign On</h1>
			<form action="loginForm.php" method="POST">
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
				<a href="https://uq.edu.au/">Forgot Password?</a>
				<a href="registrationForm.php">Register a new account</a>
				<button type="submit" class="btn btn-primary">Login</button>
			</form>
		</div>
	</body>
</html>