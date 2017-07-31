<?php 
session_start();
?>


<?php 




require 'database.php';




if(!empty($_POST["email"]) and !empty($_POST["password"]))
{
if(isset($_POST["login"]))
{
	
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		$email= $_POST["email"];
		$password = $_POST["password"];
	}
	
	
	
	
	$record = $conn->prepare("SELECT * FROM airport_employee WHERE emailid = '$email' and password = '$password'");
			$record->setFetchMode(PDO::FETCH_ASSOC);
			$record->execute();
			//var_dump($record);
			
			$result = $record->fetch();
		//var_dump($result);

			if(($result["emailid"]==$email)  and ($result["password"]==$password))
			{
 				$_SESSION["email"]=$result["emailid"];
				header("Location: pnr.php");
				die();
				
				
			}	
			else{
				echo "invalid username or password";
				
				
			}
		

}
}
?> 



<!Doctype html>
<html>

<head>
<title>Login</title>


<link rel="stylesheet" type="text/css" href="../assess/css/style.css">
<link href="https://fonts.googleapis.com/css?family=Nova+Oval" rel="stylesheet">



</head>

<body>



	<div class="header" >
		<a href="index.php/../.." > <h3> <strong>Newi</strong></h3> </a>
		
	</div>

	<h1>Login</h1>
	
	
	<form  method="POST">
	<input type="email" placeholder="Enter your email" name="email" >
	<input type="password" placeholder="password" name="password" >
	<input type="submit" value="Log in" name="login" >
	</form>
	

</body>



</html>


