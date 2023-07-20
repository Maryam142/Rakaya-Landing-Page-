<?php


   //connection
   $conn = mysqli_connect('localhost','root','','rakaya');
   
   //to check the connection
   if(!$conn){
       echo 'error: ' . mysqli_connect_error();
   }
   

$firstName =  "";
$lastName  =  "";
$password  =  "";
$email     =  "";
$phone     =  "";
$Gender    =  "";
$UserType  =  "";

if(isset($_POST['submit'])){

// Server-side validation
$firstName =  filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
$lastName  =  filter_var($_POST['lastName'],  FILTER_SANITIZE_STRING);
$password  =  filter_var($_POST['password'],  FILTER_SANITIZE_STRING);
$email     =  filter_var($_POST['email'],     FILTER_SANITIZE_EMAIL);
$phone     =  filter_var($_POST['phone'],     FILTER_SANITIZE_STRING);
$Gender    =  filter_var($_POST['gender'],    FILTER_SANITIZE_STRING);
$UserType  =  filter_var($_POST['usertype'],  FILTER_SANITIZE_STRING);

//insert query
  $sql = "INSERT INTO users(Email, Fname, Lname, Phone, pass, Gender, UserType) 
    VALUES ('$email','$firstName', '$lastName', '$phone','$password', '$Gender', '$UserType')";

  //feedback  
  if( mysqli_query($conn, $sql)){
    header('Location: signUp.php');
  }else{
    echo 'fail!!!, Error:' . mysqli_error($conn);
  }
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
}
   
?>