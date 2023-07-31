
<?php
//insert.php  

// connect to database
$conn = mysqli_connect('localhost', 'root', '', 'rakaya');

// check the connection
if (!$conn) {
    echo 'error: ' . mysqli_connect_error();
}
// include('./DB_conn.php');

if (isset($_POST["name"])) { 
    $name     =  filter_var($_POST["name"],  FILTER_SANITIZE_STRING);
    $email    =  filter_var($_POST["email"],  FILTER_SANITIZE_STRING);
    $message     =  filter_var($_POST["message"],  FILTER_SANITIZE_EMAIL);
    $sql = "INSERT INTO tbl_form(name, email , message) VALUES ('" . $name . "','" . $email . "', '" . $message . "')";
    if (mysqli_query($conn, $sql)) {
        echo "تم ارسال الرسالة ";
    }

    $recipient = $email;

    $email_content ="Name: $name\n";
    $email_content ="Email: $email\n\n";
    $email_content ="Message: \n$message\n";

    $email_haeders = "Form: $name <$email>";


    mail($recipient,'', $email_content, $email_haeders);
}
?>  