<?php
session_start();
?>
<!DOCTYPE html>
<html>


<head>
<title>
logout
</title>
<link rel="stylesheet" type="text/css" href="../assess/css/style.css">
<link href="https://fonts.googleapis.com/css?family=Nova+Oval" rel="stylesheet">

</head>
<body>



<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

header("Location: ../index.php ");

?>

</body>
</html>
  
  
  
  