
<?php
// connect to database
$conn = mysqli_connect('localhost', 'root', '', 'rakaya');

// check the connection
if (!$conn) {
    echo 'error: ' . mysqli_connect_error();
}
    $name     =  filter_var($_POST["name"],  FILTER_SANITIZE_STRING);
    $email    =  filter_var($_POST["email"],  FILTER_SANITIZE_STRING);
    $subject     =  filter_var($_POST["subject"],  FILTER_SANITIZE_STRING);
    $message     =  filter_var($_POST["message"],  FILTER_SANITIZE_EMAIL);
    $sql = "INSERT INTO tbl_form(name, email ,message, subject) VALUES ('" . $name . "','" . $email . "', '" . $message . "','" . $subject . "')";
    if (mysqli_query($conn, $sql)) {
        echo "تم ارسال الرسالة ";
    }
?>  