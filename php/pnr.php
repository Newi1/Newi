<?php

session_start();
?>
<!doctype html>
<html>

<head><title>pnr.php</title>

<link rel="stylesheet" type="text/css" href="../assess/css/style.css">
<link href="https://fonts.googleapis.com/css?family=Nova+Oval" rel="stylesheet">

</head>





<body>
	      <div class="header">
			<a href="index.php/../.." > <h3> <strong>Newi</strong></h3> </a>
		  </div>
				<div class="header_logout">
					<a href="logout.php"><h2>logout</h2></a>
				</div>

    <form  method="POST">
    <input type="text" placeholder ="Enter PNR " name="pnr">
	<input type="number" placeholder="Number of baggage" name="count_of_baggage">
	<input type="text" placeholder="Total weight" name="weight_of_baggage">
	<input type="submit"  name="login" >
	</form>

<!----------------------------------------------------------------------------------------------------------->





</body>






 
<?php 


//include 'textlocal/example/sendsms.php';
require 'database.php';







//----------------------------------------------------------used below to update values of count_of_baggage and weight_of_baggage
if(((!empty($_POST['pnr']) and !empty($_POST['count_of_baggage'])) and !empty($_POST['weight_of_baggage'])))
{
	
if(isset($_POST["login"]))
{
	
	
	
	
	
	$pnr=$_POST["pnr"];
	$count_of_baggage = $_POST["count_of_baggage"];
	$weight_of_baggage = $_POST["weight_of_baggage"];
	
	
	
	
 
	
	
	$record = $conn->prepare("SELECT * FROM passenger_details WHERE pnrno = '$pnr'");
	$record->setFetchMode(PDO::FETCH_ASSOC);
	$record->execute();
	//var_dump($record);
	
	$result = $record->fetch();
	var_dump($result);
	echo "<br/>";
	
	$passenger_mobile_number = $result['passenger_mobile_no'];
	var_dump($passenger_mobile_number);
	
	
	if($result["pnrno"]==$pnr){
		
		
		 	
		$change = $conn->query("UPDATE passenger_details SET baggage_total_count = '$count_of_baggage',baggage_total_weight = '$weight_of_baggage' WHERE pnrno='$pnr'");
		$change->execute();
			
		
	
		
		
		//$_SESSION["pnr"]=$result["pnrno"];
		//header("Location: passenger_info.php");
		
   }	
}
}
   
    
  // <!----------------till this-------------------------------------------------------------------------------------------------------------------------------------------------------//
  // -->
  
	
	
	
	require '../textlocal/textlocal.php';
	
	
	
$admin_name = "mohmmedasif0401@gmail.com";
   $admin_password = "Bismilla123";
   $textlocal = new Textlocal($admin_name,$admin_password);
   
   $numbers = array($passenger_mobile_number);
   $sender = 'AAI-SMS';
   $message = 'Your baggage is successfully checked-in. Happy journey !!!  www.Newi.in   ';
   
   try {
   	$result = $textlocal->sendSms($numbers, $message, $sender);
   	print_r($result);
   } catch (Exception $e) {
   	die('Error: ' . $e->getMessage());
   }
   
	
	
	








?>




 




<!---------------------------------------------------------------------------------------------------------------------------------//

														//	intitialize baggage_total_cout and weight of the baggage

//---------------------------------------------------------------------------------------------------------------------------------//

-->

	
<!--  
//-----------------------------------------------------------------------------------------------------------------------------------//

if(isset($_POST["count_of_baggage"])){
$count_of_baggage = $_POST["count_of_baggage"];
}
else {
	echo "Count of baggage is Not Declared";
}

		
		
//-----------------------------------------------------------------------------------------------------------------------------------//
					//change the value of baggage_id to false to respected count_of_baggage
//-----------------------------------------------------------------------------------------------------------------------------------//
	-->	

<?php 

		$bid1="false";
		$bid2="false";
		$bid3="false";
		$bid4="false";
		$bid5="false";
		$not=null;
		
		
		
if($count_of_baggage==1)
{
	
	$record = $conn->prepare("UPDATE passenger_details SET baggage_id1 = '$bid1',baggage_id2 = '$not',baggage_id3 = '$not',baggage_id4 = '$not',baggage_id5 = '$not' WHERE pnrno='$pnr'");
	//$record->setFetchMode(PDO::FETCH_ASSOC);
	$record->execute();
	
	
}

elseif($count_of_baggage==2)
{
	
	$record = $conn->prepare("UPDATE passenger_details SET baggage_id1='$bid1',baggage_id2 = '$bid2',baggage_id3 = '$not',baggage_id4 = '$not',baggage_id5 = '$not' WHERE pnrno='$pnr'");
	//$record->setFetchMode(PDO::FETCH_ASSOC);
	$record->execute();
	
	
}


elseif($count_of_baggage==3)
{
	
	$record = $conn->prepare("UPDATE passenger_details SET baggage_id1='$bid1',baggage_id2 = '$bid2',baggage_id3 = '$bid3',baggage_id4 = '$not',baggage_id5 = '$not' WHERE pnrno='$pnr'");
	//$record->setFetchMode(PDO::FETCH_ASSOC);
	$record->execute();
	
	
}


elseif($count_of_baggage==4)
{
	
	$record = $conn->prepare("UPDATE passenger_details SET baggage_id1='$bid1',baggage_id2 = '$bid2',baggage_id3 = '$bid3',baggage_id4 = '$bid4',baggage_id5 = '$not'WHERE pnrno='$pnr'");
	//$record->setFetchMode(PDO::FETCH_ASSOC);
	$record->execute();
	
	
}
elseif($count_of_baggage==5)
{
	
	$record = $conn->prepare("UPDATE passenger_details SET baggage_id1='$bid1',baggage_id2 = '$bid2',baggage_id3 = '$bid3',baggage_id4 = '$bid4',baggage_id5 = '$bid5' WHERE pnrno='$pnr'");
	//$record->setFetchMode(PDO::FETCH_ASSOC);
	$record->execute();
	
	
}



	



?>

<?php if($count_of_baggage == 1):?>
<img  src="https://api.qrserver.com/v1/create-qr-code/?data='<?php echo 'pnr:'.$pnr.',baggage_id:1'; ?>'&amp;size=100x100" alt='QR-SCODE' title=''   />
	
 
<?php  elseif($count_of_baggage==2):?>
 <img  src="https://api.qrserver.com/v1/create-qr-code/?data='<?php echo 'pnr:'.$pnr.',baggage_id:1';?>'&amp;size=100x100" alt="QR-SCODE" title="" <?php echo "				"?>  />
 <img  src="https://api.qrserver.com/v1/create-qr-code/?data='<?php echo 'pnr:'.$pnr.',baggage_id:2';?>'&amp;size=100x100" alt="QR-SCODE" title=""  <?php echo "				"?> />
 <?php elseif ($count_of_baggage==3):?>
  <img  src="https://api.qrserver.com/v1/create-qr-code/?data='<?php echo 'pnr:'.$pnr.',baggage_id:1';?>'&amp;size=100x100" alt="QR-SCODE" title=""   <?php echo "				"?>/>
   <img  src="https://api.qrserver.com/v1/create-qr-code/?data='<?php echo 'pnr:'.$pnr.',baggage_id:2';?>'&amp;size=100x100" alt="QR-SCODE" title=""   <?php echo "				"?>/>
    <img  src="https://api.qrserver.com/v1/create-qr-code/?data='<?php echo  'pnr:'.$pnr.',baggage_id:3';?>'&amp;size=100x100" alt="QR-SCODE" title=""   <?php echo "				"?>/>
     <?php elseif ($count_of_baggage==4):?>
<img  src="https://api.qrserver.com/v1/create-qr-code/?data='<?php echo 'pnr'.$pnr.',baggage_id:1';?>'&amp;size=100x100" alt="QR-SCODE" title=""  <?php echo "				"?>/>
<img  src="https://api.qrserver.com/v1/create-qr-code/?data='<?php echo 'pnr:'.$pnr.',baggage_id:2';?>'&amp;size=100x100" alt="QR-SCODE" title="" <?php echo "				"?>/>
<img  src="https://api.qrserver.com/v1/create-qr-code/?data='<?php echo 'pnr:'.$pnr.',baggage_id:3';?>'&amp;size=100x100" alt="QR-SCODE" title=""  <?php echo "				"?>/>
<img  src="https://api.qrserver.com/v1/create-qr-code/?data='<?php echo 'pnr:'.$pnr.',baggage_id:4';?>'&amp;size=100x100" alt="QR-SCODE" title=""  <?php echo "				"?>/>
 <?php elseif ($count_of_baggage==5):?>
 <img  src="https://api.qrserver.com/v1/create-qr-code/?data='<?php echo 'pnr:'.$pnr.',baggage_id:1';?>'&amp;size=100x100" alt="QR-SCODE" title="" <?php echo "				"?> />
 <img  src="https://api.qrserver.com/v1/create-qr-code/?data='<?php echo 'pnr:'.$pnr.',baggage_id:2';?>'&amp;size=100x100" alt="QR-SCODE" title="" <?php echo "				"?> />
 <img  src="https://api.qrserver.com/v1/create-qr-code/?data='<?php echo 'pnr:'.$pnr.',baggage_id:3';?>'&amp;size=100x100" alt="QR-SCODE" title=""  <?php echo "				"?>/>
 <img  src="https://api.qrserver.com/v1/create-qr-code/?data='<?php echo 'pnr:'.$pnr.',baggage_id:4';?>'&amp;size=100x100" alt="QR-SCODE" title="" <?php echo "				"?> />
 <img  src="https://api.qrserver.com/v1/create-qr-code/?data='<?php echo 'pnr:'.$pnr.',baggage_id:5';?>'&amp;size=100x100" alt="QR-SCODE" title=""   <?php echo "				"?>/>

<?php endif;?>

</html>