<!DOCTYPE html>
<head>
	<meta author="Rice Tyler : rht6nf">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
	<style>
		
	</style>
</head>

<body style="color: yellow">
	<nav class="navbar navbar-dark" id="bootstrap" >
		<div class="container-fluid" style="background-color: black">
			<div class="row">
				<div class="navbar-header">
					<div class="navbar-brand"> <a href="homepage.php" style="color:gold; text-decoration:none;">The Movie Rater</a></div>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="homepage.php">Home</a></li>
					<li><a href="Template.html">Search</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<?php
		$nameErr = $titleErr = $textErr = $ratingErr = "";  
		$name = $title = $text = $rating = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["name"])) {
				$nameErr = "Name is required";
			} else {
				$name = parse($_POST["name"]);
			}

			if (empty($_POST["title"])) {
				$titleErr = "Title is required";
			} else {
				$title = parse($_POST["title"]);
			}

			if (empty($_POST["text"])) {
				$textErr = "Review text is required";
			} else {
				$text = parse($_POST["text"]);
			}

			if (empty($_POST["rating"])) {
				$ratingErr = "Rating is required";
			} else {
				$rating = parse($_POST["rating"]);
				if (!preg_match("/[\d]*[.][\d]*/", $rating)) {
					$ratingErr = "Must be a number with a decimal";
					$rating = "";
				}

				$rating = floatval($rating);
				if ($rating < 0 | $rating > 5) {
					$ratingErr = "Must be Between 0.0 and 5.0";
					$rating = "";
				}
			}
		}

		function parse($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		?>
		<div class="card card-outline-primary mb-3 text-center">
		  <div class="card-block">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				Name: <input type="text" name="name" id="review-form" style="background-color: black; color:gold; border-radius:3px; border-color:gold;" placeholder="Name" value="<?php echo($name);?>">
				<span class="error">* <?php echo $nameErr;?></span>
				<br><br>
				Title: <input type="text" name="title" id="review-form" style="background-color: black; color:gold; border-radius:3px; border-color:gold;" placeholder="Title" value="<?php echo $title;?>">
				<span class="error">* <?php echo($titleErr);?> </span>
				<br><br>
				Text: <textarea name="text" id="review-form" style="color:gold; " placeholder="Review Text" rows="10" cols="40"><?php echo $text;?></textarea>
				<span class="error">* <?php echo $textErr;?></span>
				<br><br>
				Rating: <input type="text" name="rating" style="background-color: black; color:gold; border-radius:3px; border-color:gold;" id="review-form" placeholder="Rating (0.0-5.0)" value="<?php echo $rating;?>">
				<span class="error">* <?php echo( $ratingErr);?></span>

				<br><br>
				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
	</div>

		<?php
	echo "<h2>Your Input:</h2>";
	echo $name;
	echo "<br>";
	echo $title;
	echo "<br>";
	echo $text;
	echo "<br>";
	echo $rating;
	echo "<br>";
	?>



</body>
</html>

