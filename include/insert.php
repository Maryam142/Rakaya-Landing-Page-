
<?php
//insert.php  

// connect to database
$conn = mysqli_connect('localhost', 'root', '', 'rakaya');

// check the connection
if (!$conn) {
    echo 'error: ' . mysqli_connect_error();
}

if (isset($_POST["name"])) {
    $name     =  filter_var($_POST["name"],  FILTER_SANITIZE_STRING);
    $email    =  filter_var($_POST["email"],  FILTER_SANITIZE_STRING);
    $message     =  filter_var($_POST["message"],  FILTER_SANITIZE_EMAIL);
    $sql = "INSERT INTO tbl_form(name, email , message) VALUES ('" . $name . "','" . $email . "', '" . $message . "')";
    if (mysqli_query($conn, $sql)) {
        echo "تم ارسال الرسالة ";

        $mail->setFrom($email, $name);
        $mail->addAddress('rakayateam2@gmail.com');
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->send();
    }
}
?>  