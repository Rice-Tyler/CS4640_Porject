<?php
$emailErr = $passwordErr = $usernameErr = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  	 //performs error messages for invalid or empty email input
	if (empty($_POST["email"])) {
		$emailErr = "*Email is required <br/>";
	} else if(!strpos($_POST["email"], '@')) {
		$emailErr = "*Invalid email address <br/>";
	} else {
		$email = sanitize($_POST['email']); 
	}
     //performs error messages for invalid or empty password input
	if (empty($_POST["Password"])) {
		$passwordErr = "*Password is required";
	} else if (($_POST["Password"]) !== ($_POST["PasswordValidate"])) {
		$passwordErr = "*Passwords don't match";
	} else {
		$password = sanitize($_POST['Password']);
	}
     //performs error messages for invalid or empty username input
	if (empty($_POST["username"])) {
		$usernameErr = "*Username is required";
	} else {
		$username = sanitize($_POST['username']);
	}
     //if email and password are not empty then redirect to next page 
	if (!empty($email) && !empty($password) && !empty($username)) {
		header('Location:homepage.php');
	}
}
	
  //performs input sanitization to make sure the user input is clean
function sanitize($data) { //user-defined function
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
	<title>The Movie Rater - Sign up</title>
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
			<h2 class="form-signin-heading">Sign up</h2>
			<input type="text" name="email" class="form-control" placeholder="Email Address" id="email">
			<p id="incorrectEmail">Invalid Email Address</p>
			<span> <?php echo $emailErr; ?></span>
			<input type="text" name="username" class="form-control" placeholder="Username" id="username">
			<span> <?php echo $usernameErr; ?></span>
			<input type="password" name="Password" class="form-control" placeholder="Password" id="password">
			<input type="password" name="PasswordValidate" class="form-control" placeholder="Enter Password Again" id="passwordValidate">
			<p id="incorrectPassword">Passwords don't match</p>
			<p id="emptyFields" style="display: none">Please fill in all fields</p>
			<span> <?php echo $passwordErr; ?></span>
			<label class="checkbox">
				<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
			</label>
			<button class="btn btn-lg btn-primary btn-block" type="submit" onclick="return validate()" id="loginbutton">Submit</button>  
			<br/>
			<a id="createAccount" href="login.php">Have an account? Login</a>
		</form>
	</div>
	<script>
		//points cursor to email input when page is loaded
		document.addEventListener('DOMContentLoaded', function() {
			document.getElementById("email").focus();
		});

    //performs client-side input validation
    function validate() {
    	var bool = true;
    	//if any of the inputs are empty then return false
    	if(document.getElementById("email").value === "" || document.getElementById("password").value === "" || document.getElementById("username").value === "" || 
    		document.getElementById("passwordValidate").value === "") {
    		document.getElementById("emptyFields").style.display = "block";
    		return false;
    	} else {
    		document.getElementById("emptyFields").style.display = "none";
    	}
    	//if passwords don't match
    	if(document.getElementById("password").value !== document.getElementById("passwordValidate").value) {
    		document.getElementById("incorrectPassword").style.display = "block";
    		bool = false;
    	} else {
    		document.getElementById("incorrectPassword").style.display = "none";
    	}
    	//if email address is not valid (does not contain '@' or '.')
    	if(document.getElementById("email").value.indexOf("@") < 0 || document.getElementById("email").value.indexOf(".") < 0) {
    		document.getElementById("incorrectEmail").style.display = "block";
    		bool = false;
    	} else {
    		document.getElementById("incorrectEmail").style.display = "none";
    	}

    	return bool;
		}	
</script>
</body>
</html>