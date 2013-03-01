<?php 

require_once('PDOManager.class.php');
require_once(__DIR__.'/../controller/User.class.php');
session_start();

class PDOUSerManager{
	
	//enregistre un user en base de donnée
	function register($email, $password){
		try {
			$PDOManager = new PDOManager();
			$pdo = $PDOManager->newPDO();

			$userRegister = $pdo->prepare('INSERT INTO users(email, password) VALUES (:email, :password)');
			$userRegister->execute(array(
				':email' => $email,
				':password' => $password
				));

		} catch (Exception $e) 
		{
			echo "error register";
		}

		$user = new User($pdo->lastInsertId(), $email, $password);
		$_SESSION['email'] = $user->getEmail();
		

		header('Location:dashboard.php');
	}

	//recupere un compte
	function authenticate($email, $password){
		
		try { 
			$PDOManager = new PDOManager();
			$pdo = $PDOManager->newPDO();		
			
			$sql = $pdo->query("SELECT * FROM users WHERE email = '$email'  AND password = '$password'");
			$sql = $sql->fetch(PDO::FETCH_ASSOC);

			$user = new User($sql["id"], $sql["email"], $sql["password"]);
			return $user;

		} catch (Exception $e) {
			echo 'Access Denied';
		}	
		header('Location:dashboard.php');
		
	}

}

?>