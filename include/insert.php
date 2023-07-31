
<?php
//insert.php  

// connect to database
$conn = mysqli_connect('localhost', 'root', '', 'rakaya');

// check the connection
if (!$conn) {
    echo 'error: ' . mysqli_connect_error();
}

if (isset($_POST["name"])) {
    //   $name = mysqli_real_escape_string($connect, $_POST["name"]);
    //   $email = mysqli_real_escape_string($connect, $_POST["email"]);  
    //   $message = mysqli_real_escape_string($connect, $_POST["message"]);  
    $name     =  filter_var($_POST["name"],  FILTER_SANITIZE_STRING);
    $email    =  filter_var($_POST["email"],  FILTER_SANITIZE_STRING);
    $message     =  filter_var($_POST["message"],  FILTER_SANITIZE_EMAIL);
    $sql = "INSERT INTO tbl_form(name, email , message) VALUES ('" . $name . "','" . $email . "', '" . $message . "')";
    if (mysqli_query($conn, $sql)) {
        echo "تم ارسال الرسالة ";
    }
}
?>  