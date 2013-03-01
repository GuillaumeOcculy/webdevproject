<html>
<head>
	<title>SupLink</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="../view/stylees/style.css" rel="stylesheet" media="screen">
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
						<a href='login.php' class="btn btn-primary pull-right">Sign in</a>					
					</ul>
				</a>
			</div>
		</div>
	</div>
	
	<div class="container">
		<h3>Welcome to SupLink</h3>
		<div id="containerForm">


			<form method="post" name="signup" id="signup">
				<input type="email" class="mail" name="email" placeholder="Email"   required />	<br /><br />
				<input type="password"  class="password" name="password" placeholder="Password" required /> <br /><br />
				<input type="password"  class="password" name="confirmPassword" placeholder="Confirm Password" required/> <br /><br />
				<input type="submit" class="btn btn-large btn-success" name="inscription" value="Create an account" />
			</form>

		</div>
	</div>

	

</body>
</html>

<?php 
require_once(__DIR__."/../model/PDOUserManager.class.php");

//si la session est deja ouverte =>dashboard
if (isset($_SESSION['email'])) {	
	header('Location:dashboard.php');
}

if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirmPassword"])) {
	if ($_POST["password"] == $_POST["confirmPassword"])
	{	
		$email = $_POST["email"];
		$password = $_POST["password"];

		$userManager = new PDOUserManager();
		$userManager->register($email, $password);
	}
	else{
		echo "mot de passe differents";
	}		
}


?>