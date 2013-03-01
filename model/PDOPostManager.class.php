<?php 
require_once('PDOManager.class.php');
require_once(__DIR__.'/../controller/Post.class.php');

class PDOPostManager{

	public function addpost($nameURL, $url, $shorturl, $userId){
		try {
			$PDOManager = new PDOManager();
			$pdo = $PDOManager->newPDO();

			$postRegister = $pdo->prepare("INSERT INTO posts(nameURL, url, shorturl, user) VALUES (:nameURL, :url, :shorturl, :user)");
			$postRegister->execute(array(
				':nameURL' => $nameURL,
				':url' => $url,
				'shorturl' => $shorturl,
				':user' =>$userId
				));

		} catch (Exception $e) {
			echo 'mauvais register post';
		}

		$post = new Post($pdo->lastInsertId(), $nameURL, $url, $shorturl, $userId);
		header('Location:dashboard.php');

	}

	public function findAllPosts(){
			$PDOmanager = new PDOManager();
			$pdo = $PDOmanager->newPDO();

			$results = $pdo->query("SELECT * FROM posts");
			$results = $results->fetchAll(PDO::FETCH_BOTH);

			return $results;
		}

    public function findPostById($userId){
        $PDOManager = new PDOManager();
        $pdo = $PDOManager->newPDO();

        $results = $pdo->query("SELECT * FROM posts WHERE user='$userId'");
        $results = $results->fetchAll(PDO::FETCH_BOTH);

        return $results;

    }
}

?>