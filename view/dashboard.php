<?php 

require_once(__DIR__.'/../controller/User.class.php');
require_once(__DIR__."/../model/PDOPostManager.class.php");
session_start();
if(isset($_SESSION['email'])){
	$user = $_SESSION['email'];
	$userId = $_SESSION['utilisateur']->getId();
}else{
	header('Location:login.php');
}
$pdo = new PDOPostManager();
$posts = $pdo->findPostById($user);
?>

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
						<li><a href="#"><?php echo $user; ?></a></li>
						<a href='deconnect.php' class="btn btn-danger pull-right">Log out</a>			
					</ul>
				</a>
			</div>
		</div>
	</div>
<div class="dashboard">

	<div class="container">

		<h3 class="text-center">SupLink - Another Url Shortener</h3>
		<form method="POST" class="form-inline">
			<input type="text" name="nameURL" class="input-small" placeholder="Name" required/>
			<input type="text" name="url" class="input-small" placeholder="Url" required/>
			<button type="submit" class="btn">Generate</button>
		</form>



		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Original URL</th>
					<th>Shortened URL</th>
					<th>Clicks</th>
					<th>Date created</th>
				</tr>
			</thead>

			<tbody>
				
				<?php foreach( $posts as $post){
					echo '<tr><td>' . $post["nameURL"] . '</td>';
					echo '<td>' . $post["url"] . '</td>';
					echo '<td>' . $post["shorturl"] . '</td></tr>';
				}?>
				
			</tbody>
		</table>

	</div>

</div>
	






</body>
</html>

<?php

$id=rand(10000,99999);  
$shorturl=base_convert($id,20,36);
$shorturl = 'http://suplink.com/' . $shorturl;

if (isset($_POST["nameURL"]) && isset($_POST["url"])){
	$nameURL = $_POST["nameURL"];
	$url = $_POST["url"];

	$postManager = new PDOPostManager();
	$postManager->addPost($nameURL, $url, $shorturl);
}


?>