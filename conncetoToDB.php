<?php
// Conect to database

$conn= mysqli_connect('localhost','root','','rakaya');
if(!$conn){
  echo "Database Connection error: " . mysqli_connect_error();
}
?>