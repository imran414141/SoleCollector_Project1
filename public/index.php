
<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  
 include "templates/header.php"; ?>



<img src="assets/img/background.png" class="mainimg" alt="Shoes">




<?php include "templates/footer.php";
}
else
{
	header("Location: login.php");
	exit();
}
 ?>