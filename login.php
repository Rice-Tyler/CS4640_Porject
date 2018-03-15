<?php
$emailErr = $passwordErr = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($_POST["email"])) { //uses implicit object $_POST
		$emailErr = "*Email is required <br/>";
	} else if(!strpos($_POST["email"], '@')) { //uses built-in strpos function to check if valid email address..
		$emailErr = "*Invalid email address <br/>";
	} else {
		$email = sanitize($_POST['email']); 
	}
	if (empty($_POST["password"])) {
		$passwordErr = "*Password is required";
	} else {
		$password = sanitize($_POST['password']);
	}
    // if email and password are not empty then redirect to next page 
	if (!empty($email) && !empty($password)) {
		header('Location:homepage.php');
	}
}

  //performs input sanitization to make sure the user input is clean
function sanitize($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<!doctype html>
<html>
<head>
	<meta author="Sallie : sjl5bz">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>The Movie Rater - Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="row">
				<div class="navbar-header">
					<div class="login-navbar-brand">The Movie Rater</div>
				</div>
			</div>
		</div>
	</nav>
	<div class="wrapper"> 
		<form class="form-signin" method="post" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<h2 class="form-signin-heading">Login </h2>
			<input type="text" name="email" class="form-control" placeholder="Email Address" id="email">
			<p id="para1">Invalid email address</p>
			<span class="error"><?php echo $emailErr;?></span>
			<input type="password" name="password" class="form-control" placeholder="Password" id="password">
			<p id="passwordReq">Password required</p>
			<span class="error"><?php echo $passwordErr;?></span>
			<label class="checkbox">
				<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
			</label>
			<button class="btn btn-lg btn-primary btn-block" type="submit" onclick="return validate()" id="loginbutton">Login</button>  
			<br/>
			<a id="createAccount" href="signup.php">Create account</a>
		</form>
	</div>
	<script>
		//points cursor to email input when page is loaded
		document.addEventListener('DOMContentLoaded', function() {
			document.getElementById("email").focus();
		});

		//performs client-side input validation
		function validate() {
			bool = true;
			//if email address is not valid
			if(document.getElementById("email").value.indexOf("@") < 0 || document.getElementById("email").value.indexOf(".") < 0) {
				document.getElementById("para1").style.display = "block";
				bool = false;
			}
			//if password input is empty
			if(document.getElementById("password").value === "") {
				document.getElementById("passwordReq").style.display = "block";
				bool = false;
			} else {
				document.getElementById("passwordReq").style.display = "none";
			}
			//if email or password input is empty
			if(document.getElementById("email").value === "" || document.getElementById("password").value === "") {
				bool = false;
			} 
			return bool;

		}
	</script>
</body>
</html>