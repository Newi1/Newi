<?php




$server="localhost";
$user="root";
$password="";
$database="newi";


try{
	//$db = mysqli("localhost",$user,$password,$database);
	$conn= new PDO("mysql:host=$server:3306;dbname=$database;",$user,$password);
	
}catch (PDOException $e){
	die("connection failed".$e->getMessage());
	
}


?>