<html>
<head>
	<title>SupLink</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="stylees/style.css" rel="stylesheet" media="screen">
	
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

	<div class="navbar navbar navbar-static-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">				
					<a class="brand" href="#">SupLink</a>
					<ul class="nav pull-right">
						<a href='home.php' class="btn btn-success">Sign Up</a>
						<a href='login.php' class="btn btn-primary">Sign in</a>					
					</ul>
				</a>
			</div>
		</div>
	</div>

	<div class="container">
		<div id="containerForm">
			
			<form method="post" name="signup" id="signup" action="../controllers/register_check.php">
				<input type="email" class="mail" name="email" placeholder="E-mail"   required />	<br /><br />
				<input type="password"  class="password" name="password" placeholder="Password" required /> <br /><br />
				<input type="submit" class="btn btn-large btn-primary" name="inscription" value="Sign in" />
			</form>

		</div>
	</div>

</body>
</html>