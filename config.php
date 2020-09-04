<?php


$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "shoecollection";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

/* Attempt to connect to MySQL database (part of registration) */
try{
    $pdo_connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>



