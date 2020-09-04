  
<?php
// check whether user is logged in, redirect to login if not.
require "user-check.php";
?>

<!DOCTYPE html>
<html lang="en">

<header>


  <nav class="nav-header-main">
    <a class="header-logo" href="index.php">

    </a>

        <div class="topnav">

<ul>
<li><a href="create.php">Add Shoe</a></li>
<li><a href="read.php">Your Collection</a></li>
<li><a href="update.php">Update Collection</a></li>
<li><a href="delete.php">Delete Shoes</a></li>
</ul>

</div>

  </nav>

<title>Sole Collector</title>
<meta charset="utf-8">

<link rel="stylesheet" href="assets/css/style.css">
</header>

<body>


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

    
</body>
</html>