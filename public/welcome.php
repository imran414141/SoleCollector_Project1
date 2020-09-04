<?php// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div>
        <header>
      <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
        </header>
    </div>
    <ul>
<li><a href="index.php">Home</a></li>
<li><a href="create.php">Add Shoe</a></li>
<li><a href="read.php">Your Collection</a></li>
<li><a href="update.php">Update Collection</a></li>
<li><a href="delete.php">Delete Shoes</a></li>
</ul>
    
</body>
</html>