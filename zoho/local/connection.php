<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "contacts";

$connection = mysqli_connect($server, $username, $password, $database);
if(mysqli_connect_errno()){
  echo "Connection Failed".mysqli_connect_error();
  exit;
}
else{
 // echo "\n The Database is Successfully Connected \n";
}
?>