<?php
include('./DB_conn.php');

session_start();
if (!isset($_SESSION['logged_in'])) {
    header('location: logIn.php');
    die();
}

$user_email = $_SESSION['user_email'];

$fetchquery = "SELECT * FROM users WHERE Email ='$user_email'";
$result = mysqli_query($conn, $fetchquery);
$row = mysqli_fetch_assoc($result);
$userID = $row['id'];


$EFname     =  filter_var($_POST['Efname'],  FILTER_SANITIZE_STRING);
$ELname     =  filter_var($_POST['Elname'],  FILTER_SANITIZE_STRING);
$Eemail     =  filter_var($_POST['Eemail'],  FILTER_SANITIZE_EMAIL);
$Ephone     =  filter_var($_POST['Ephone'],  FILTER_SANITIZE_STRING);
$Epassword     =  filter_var($_POST['Epassword'],  FILTER_SANITIZE_STRING);
$Epassword2     =  filter_var($_POST['Epassword2'],  FILTER_SANITIZE_STRING);


$query = "UPDATE users SET Email = '$Eemail ',Fname ='$EFname', Lname = '$ELname', Phone = '$Ephone', pass= '$Epassword2' WHERE  id = '$userID'";
$resultofediting = mysqli_query($conn, $query);
if ($resultofediting) {
    echo 'success';
} else {
    echo  'failer';
}
