<?php
//require '../php/pnr.php';
$dataBaseUser = 'pma';
$dataBaseUserPassword = '';
$dataBasePath = 'localhost';
$dataBaseName = 'newi';

$invalidUserCode = 201;
$successCode = 200;
$unableToConnectToDataBaseCode = 202;
$inputNotPresent = 203;

header ( 'Content-Type: application/json' );

/**
 * Default json
 *
 * By default error msg is put
 */
$response = array (
		"authority_number" => "",
		"customer_number" => "",
		"message" => "Invalid User",
		"code" => "201" 
);

$errorMessage = "Unable to connect to database";

//if (! ($connection = @mysql_connect ( $dataBasePath, $dataBaseUser, $dataBaseUserPassword )) || ! (@mysql_select_db ( $dataBaseName ))) {
try{
	//$db = mysqli("localhost",$user,$password,$database);
	$conn= new PDO("mysql:host=$dataBasePath:3306;dbname=$dataBaseName;",$dataBaseUser,$dataBaseUserPassword);


/**
	 * If database connection fails , put appropriate
	 *
	 * msg and error code
	 */
	
	//$response ['message'] = 'Unable to commuinicate with database';
	//$response ['code'] = $unableToConnectToDataBaseCode;
	//echo json_encode ( $response );
	//exit ();

if (isset ( $_POST ['userName'] ) && isset ( $_POST ['passWord'] ) && isset ( $_POST ['pnr'] ) && isset ( $_POST ['bagId'] )) {
	
	$userName = $_POST ['userName'];
	$password = $_POST ['passWord'];
	$pnr = $_POST ['pnr'];
	$bagId = $_POST ['bagId'];
	
	if (! empty ( $userName ) && ! empty ( $password ) && ! empty ( $pnr ) && ! empty ( $bagId )) {
		
		/*
		 * convert given password to md5 hash
		 * [if this feature is not required then use $password]
		 */
		
		// $md5Hash=md5($password);
		//$query = "SELECT * FROM `airport_employee` WHERE emailid='$userName' AND password='$password' ";
		
		$record = $conn->prepare("SELECT * FROM airport_employee WHERE emailid = '$userName' and password = '$password'");
		$record->setFetchMode(PDO::FETCH_ASSOC);
		$record->execute();
		//var_dump($record);
		
		$result = $record->fetch();
		//$result = mysql_query ( $query );
		
		//if ($result && (mysql_num_rows ( $result ) == 1)) {
			
		if(($result["emailid"]==$email)  and ($result["password"]==$password))
		{
			$response ['message'] = 'Valid User';
			$response ['code'] = $successCode;
			/**
			 * fetch mobile numbers of customer and authority number
			 * Now : i will hardcode my number
			 */
			
			/**
			 * Use $pnr and $bagId to get PNR and BagId
			 */
			//$query = "SELECT * FROM `passenger_details` WHERE pnrno='$pnr'";
			
			//$result = mysql_query ( $query );
			
			
			$record = $conn->prepare("SELECT * FROM passenger_details WHERE pnrno = '$pnr' ");
			$record->setFetchMode(PDO::FETCH_ASSOC);
			$record->execute();
			//var_dump($record);
			
			$result = $record->fetch();
			
			//if ($result && (mysql_num_rows ( $result ) == 1)) {
			
				if ($pnr == $result ['pnrno']) {
					$mobnum_of_passenger = $result ['passenger_mobile_no'];
					$baggage_total_count = $result ['baggage_total_count'];
					
					switch ("$baggage_total_count") {
						case "0" :
							$final_passenger_number = $mobnum_of_passenger;
							break;
						case "1" :
							$result ['baggage_id1'] = "true";
							break;
						case "2" :
							$result ['baggage_id1'] = "true";
							$result ['baggage_id2'] = "true";
							break;
						case "3" :
							$result ['baggage_id1'] = "true";
							$result ['baggage_id2'] = "true";
							$result ['baggage_id3'] = "true";
							break;
						case "3" :
							$result ['baggage_id1'] = "true";
							$result ['baggage_id2'] = "true";
							$result ['baggage_id3'] = "true";
							break;
						case "4" :
							$result ['baggage_id1'] = "true";
							$result ['baggage_id2'] = "true";
							$result ['baggage_id3'] = "true";
							$result ['baggage_id4'] = "true";
							break;
						
						case "5" :
							$result ['baggage_id1'] = "true";
							$result ['baggage_id2'] = "true";
							$result ['baggage_id3'] = "true";
							$result ['baggage_id4'] = "true";
							$result ['baggage_id5'] = "true";
							break;
						default :
							echo "invalid value";
							break;
					}
					
					if ($bagId == 1 and $result ['baggage_id1'] == "true") {
						$final_passenger_number = $result ['passenger_mobile_no'];
					} 
					elseif ($bagId == 2 and $result ['baggage_id1'] == "true" and $result ['baggage_id2'] == "true") {
						$final_passenger_number = $result ['passenger_mobile_no'];
					} elseif ($bagId == 3 and $result ['baggage_id1'] == "true" and $result ['baggage_id2'] == "true" and $result ['baggage_id3']) {
						$final_passenger_number = $result ['passenger_mobile_no'];
					} elseif ($bagId == 4 and $result ['baggage_id1'] == "true" and $result ['baggage_id2'] == "true" and $result ['baggage_id3'] == "true" and $result ['baggage_id4'] == "true") 
					{
						$final_passenger_number = $result ['passenger_mobile_no'];
					} 
					elseif ($bagId == 5 and $result ['baggage_id1'] == "true" and $result ['baggage_id2'] == "true" and $result ['baggage_id3'] == "true" and $result ['baggage_id4'] == "true" and $result ['baggage_id5'] == "true") 
					{
						$final_passenger_number = $result ['passenger_mobile_no'];
					} else {
						//$query = "SELECT * FROM `passenger_details` WHERE emailid = '$pnr' ";
						
						//$result = mysql_query ( $query );
						
						$record = $conn->prepare("SELECT * FROM airport_employee WHERE emailid = '$userName' ");
						$record->setFetchMode(PDO::FETCH_ASSOC);
						$record->execute();
						//var_dump($record);
						
						$result = $record->fetch();
						
						
						
						$final_authorized_person = $result ['phonenumber'];
					}
				}
			
			
			$response ['authority_number'] = "$final_passenger_number";
			$response ['customer_number'] = "$final_authorized_person";
			
			echo json_encode ( $response );
		} else {
			$response ['message'] = 'Invalid User';
			$response ['code'] = $invalidUserCode;
			echo json_encode ( $response );
		}
		
		
	}
	
	
	
	
	else {
		$response ['message'] = 'Input is empty';
		$response ['code'] = $inputNotPresent;
		echo json_encode ( $response );
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