<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $connect = new PDO("mysql:host=$servername;dbname=alcontin_database", $username, $password);
  // set the PDO error mode to exception
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>