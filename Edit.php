<?php 
    include('./DB_conn.php');

    session_start();
    if (!isset($_SESSION['logged_in'])) {
        header('location: logIn.php');
        die();
    }

    $edit_id = $_SESSION['userId'];
    $EnewEmail = "";
    $EnewFname = "";
    $EnewLname = "";
    $EnewGender = "";
    $EnewPass = "";
    $newUserTyper = "";
    $EnewPhone = "";

if(isset($_POST['Edit'])){
    echo "We in post";
        $EnewEmail=     $_POST['EEmail'];
        $EnewFname=     $_POST['EFname'];
        $EnewLname=     $_POST['ELname'];
        $EnewGender=    $_POST['EGender'];
        $EnewPass=      $_POST['EPass'];
        $EnewUserTyper= $_POST['EUsertype']; 
        $EnewPhone=     $_POST['EPhone'];


    //if there is no error:
        $query = "UPDATE `users` SET `Email` = '$EnewEmail ',`Fname`='$EnewFname', `Lname` = '$EnewLname', `Phone` = '$EnewPhone', `Gender` = '$EnewGender', `pass`= '$EnewPass', `UserType` = '$EnewUserTyper'  WHERE `users`.`id` = '$edit_id'";
        echo $query;

        $resultofediting = mysqli_query($conn, $query);
        if ($resultofediting) {
        $ConfirmeditMsg = "تم تحديث البيانات بنجاح ";
        $_SESSION['edited']= true;

        header("location:Admin.php"); 
        } else {
        $ConfirmeditMsg = "لم يتم تحديث البيانات في قاعدة البيانات  ";
        }
    } 
?>