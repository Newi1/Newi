<?php
$dataBaseUser = 'pma';
$dataBaseUserPassword = '';
$dataBasePath = 'localhost';
$dataBaseName = 'newi';

$invalidUserCode=201;
$successCode=200;
$unableToConnectToDataBaseCode=202;
$inputNotPresent=203;

header ( 'Content-Type: application/json' );

/**
 *  Default json 
 *  
 *  By default error msg is put 
 */
$response=array("message"=>"Invalid User", "code"=>"201");

$errorMessage = "Unable to connect to database";

try{
	//$db = mysqli("localhost",$user,$password,$database);
	$conn= new PDO("mysql:host=$dataBasePath:3306;dbname=$dataBaseName;",$dataBaseUser,$dataBaseUserPassword);
	
	
	if (isset ( $_POST ['userName'] ) && isset ( $_POST ['passWord']) ) {
		
		
		
		$userName = $_POST ['userName'];
		$password = $_POST ['passWord'];
		
		if (! empty ( $userName ) && ! empty ( $password )) {
			
			
			
			
			$record = $conn->prepare("SELECT * FROM airport_employee WHERE emailid = '$email' and password = '$password'");
			$record->setFetchMode(PDO::FETCH_ASSOC);
			$record->execute();
			//var_dump($record);
			
			$result = $record->fetch();
			//var_dump($result);
			
			if(($result["emailid"]==$email)  and ($result["password"]==$password))
			{
				
				$response['message']='Valid User';
				$response['code']=$successCode;
				echo json_encode($response);
				
				
				
			}
			else
			{
				$response['message']='Invalid User';
				$response['code']=$invalidUserCode;
				echo json_encode($response);
			}
			
			
			
		}
		else {
			$response['message']='User name and password is empty';
			$response['code']=$inputNotPresent;
			echo json_encode($response);
		}
	}
	
	
}catch (PDOException $e){
	die("connection failed".$e->getMessage());
	/**
	 *  If database connection fails , put appropriate
	 *
	 *  msg and error code
	 *
	 */
	
	$response['message']='Unable to commuinicate with database';
	$response['code']=$unableToConnectToDataBaseCode;
	echo json_encode($response);
	exit();
	
}
	

?>