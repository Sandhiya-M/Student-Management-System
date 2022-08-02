<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="tenA";
$link=mysqli_connect($servername,$username,$password,$db);
if ($link==false) {
  die("Error: Connection failed: " .mysqli_connect_error());
}

?>