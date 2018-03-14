<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="color: blue">

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
			}
		}

		function parse($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		?>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			Name: <input type="text" name="name" value=" <?php echo($name);?> ">
			<span class="error">* <?php echo $nameErr;?></span>
			<br><br>
			Title: <input type="text" name="title" value="<?php echo $title;?>">
			<span class="error">* <?php echo($titleErr);?> </span>
			<br><br>
			Text: <textarea name="text" rows="10" cols="40"><?php echo $text;?></textarea>
			<span class="error">* <?php echo $textErr;?></span>
			<br><br>
			Rating: <input type="text" name="rating" value="<?php echo $rating;?>">
			<span class="error">* <?php echo( $ratingErr);?></span>

			<br><br>
			<input type="submit" name="submit" value="Submit">
		</form>

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

