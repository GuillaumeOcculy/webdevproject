<?php 
require_once(__DIR__."/../model/PDOPostManager.class.php");
require_once('PDOManager.class.php');

$PDOPostManager = new PDOPostManager();

$de= $_GET["decode"];  
$PDOManager = new PDOManager();
$pdo = $PDOManager->newPDO();

$result = $pdo->query("SELECT * FROM posts where shorturl='$de'");

while($row = $result->fetch(PDO::FETCH_ASSOC))  
{  
	$res=$row['url'];  
	header("location:".$res);  
}  

?>