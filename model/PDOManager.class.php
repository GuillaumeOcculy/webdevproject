<?php
	class PDOManager{
		public function newPDO(){
			$pdo = new PDO("mysql:host=localhost;dbname=suplink", "root", "");
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}
	}
?>