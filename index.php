	<?php 
		session_start(); 
		
		?>
	
	
	
	
<!Doctype html>


<html>
<head>	<title>Welcome to Newi</title>
	<link rel="stylesheet" type="text/css" href="assess/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Nova+Oval" rel="stylesheet">
</head>


<body>

		<div class="header">
				<a href= "index.php" > <h3> <strong> Newi </strong></h3></a>
		</div>
		
		<?php if(isset($_SESSION["email"])): ?>
				<br/>You Are Logged-in ....<br/><br/>
				<a href="php/logout.php">Log-out?</a>	|
				<a href="php/pnr.php">Enter passengers PNR</a>
		<?php else: ?>
				 <h1>Please login</h1>
				 <a href="php/login.php"><em>Login</em></a>
				 
				 
	   <?php endif; ?>
</body>
</html>





