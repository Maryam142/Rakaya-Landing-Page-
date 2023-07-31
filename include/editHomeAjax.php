<?php
include('./DB_conn.php');

session_start();
if (!isset($_SESSION['logged_in'])) {
    header('location: logIn.php');
    die();
}



$EFname     =  filter_var($_POST['Efname'],  FILTER_SANITIZE_STRING);
$ELname     =  filter_var($_POST['Elname'],  FILTER_SANITIZE_STRING);
$email     =  filter_var($_POST['Eemail'],  FILTER_SANITIZE_EMAIL);
$Ephone     =  filter_var($_POST['Ephone'],  FILTER_SANITIZE_STRING);
$password     =  filter_var($_POST['Epassword'],  FILTER_SANITIZE_STRING);
$password2     =  filter_var($_POST['Epassword2'],  FILTER_SANITIZE_STRING);


$query = "UPDATE users SET Email = '$email ',Fname ='$Fname', Lname = '$Lname', Phone = '$phone', pass= '$password2' WHERE  id = '$userID'";
$resultofediting = mysqli_query($conn, $query);
if ($resultofediting) {
    echo 'success';
} else {
    echo  'failer';
}
