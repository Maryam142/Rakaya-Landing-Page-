<?php
// include('./DB_conn.php');
// connect to database
$conn = mysqli_connect('localhost', 'root', '', 'rakaya');

// check the connection
if (!$conn) {
    echo 'error: ' . mysqli_connect_error();
}

session_start();
if (!isset($_SESSION['logged_in'])) {
    header('location: logIn.php');
}
$user_email = $_SESSION['user_email'];

$fetchquery = "SELECT * FROM users WHERE Email ='$user_email'";
$result = mysqli_query($conn, $fetchquery);
$row = mysqli_fetch_assoc($result);

$id= $row['id'];

if (isset($_POST["ELname"])) {

    $EFname    =  filter_var($_POST["EFname"],  FILTER_SANITIZE_STRING);
    $ELname    =  filter_var($_POST["ELname"],  FILTER_SANITIZE_STRING);
    $Eemail    =  filter_var($_POST["Eemail"],  FILTER_SANITIZE_EMAIL);

    $query = "UPDATE `users` SET `Email` = '$Eemail', `Fname` = '$EFname', `Lname` = '$ELname' WHERE `users`.`id` = $id";
    if (mysqli_query($conn, $query)) {
        // echo "تم ارسال الرسالة ";
    }else{echo "errrooorrrrrrr!";}
}
 



// $EFname     =  filter_var($_POST['Efname'],  FILTER_SANITIZE_STRING);
// $ELname     =  filter_var($_POST['Elname'],  FILTER_SANITIZE_STRING);
// $email     =  filter_var($_POST['Eemail'],  FILTER_SANITIZE_EMAIL);
// $Ephone     =  filter_var($_POST['Ephone'],  FILTER_SANITIZE_STRING);
// $password     =  filter_var($_POST['Epassword'],  FILTER_SANITIZE_STRING);
// $password2     =  filter_var($_POST['Epassword2'],  FILTER_SANITIZE_STRING);


// $query = "UPDATE users SET Email = '$email ',Fname ='$Fname', Lname = '$Lname', Phone = '$phone', pass= '$password2' WHERE  id = '$userID'";
// $resultofediting = mysqli_query($conn, $query);
// if ($resultofediting) {
//     echo 'success';
// } else {
//     echo  'failer';
// }
?> 