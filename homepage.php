
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>The Movie Rater - Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
		<div class="container-fluid">
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

<div class="container" style="margin-top: 20%;">
	<div class="row">
        <form action="results.html" method="get">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container"> 
                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control" name=search id=search placeholder="Search" >
                    <span class="input-group-addon">
                        <button type="submit" onclick="return validate()">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
            </div>
        </div>
        </form>
	</div>
</div>

<script>
    function validate() {
        if(document.getElementById("search").value === "") {
            return false;
        } 
    }
</script>
    
</body>
</html>