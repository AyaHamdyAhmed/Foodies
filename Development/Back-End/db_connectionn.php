<?php

$host="localhost";
$username="root";
$password="";
$db="Foodies";
$con = mysqli_connect($host,$username,$password,$db);
if ($con->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
  echo "Connected successfully";

 ?>