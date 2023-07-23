<?php

// connect to database
$conn = mysqli_connect('localhost','root','','rakaya');
// check the connection
if(!$conn){
    echo 'error: ' . mysqli_connect_error();
}

$Reset_errors =  array();
$SysMsg="";
$resetEmail="";
if(isset($_POST['reset'])){
 // Server-side validation//////////////////////////////////////////////////////////////////////
    $resetEmail =  filter_var($_POST['resetEmail'], FILTER_SANITIZE_EMAIL);

    // validate email//
    if(empty($resetEmail)){
        array_push($Reset_errors, "يجب كتابة البريد الالكترونى");
    }elseif(filter_var($resetEmail,FILTER_VALIDATE_EMAIL)==false){
        array_push($Reset_errors, "البريد الالكترونى غير صالح");
    }


    if(count($Reset_errors) == 0){
    //Reset Processing/////////////////////////////////////////////////////////////////////////////////

    //check authentication email from database
    $stm="SELECT * FROM users WHERE Email ='$resetEmail'";
    $data=mysqli_fetch_row(mysqli_query($conn, $stm));
    if(!$data){
    array_push($Reset_errors, "لا  يوجد حساب مسجل بهذا البريد الالكتروني");
    }else{
    require_once 'mail.php';
    //Send email to user
    $mail->setFrom('rakayateam2@gmail.com', 'Rakaya Team 2');
    $mail->addAddress($resetEmail);
    $mail->Subject ='اعادة تعيين كلمة المرور';
    $mail->Body    ='اهلا عميلنا العزيز <br> ' . '<a href="http://localhost/Rakaya-Landing-Page-/reset2.php?email= '.$_POST['resetEmail'].'"> اضغط هنا</a> لإعادة تعيين كلمة المرور الخاصة بك';
    $mail->send();
    $SysMsg= "تم ارسال رابط اعادة تعيين كلمة المرور على بريدك الالكتروني";
    // header('Location: reset.php'); //prevent send reset email for every page refresh
    }
    }

}

$Reset2_errors =  array();
$SysMsg2="";

if(isset($_POST['reset2'])){
    $newPassword  = filter_var($_POST['resetpass1'],  FILTER_SANITIZE_STRING);
    $newPassword2 = filter_var($_POST['resetpass2'],  FILTER_SANITIZE_STRING);

    if(empty($newPassword)){
        array_push($Reset2_errors, "يجب كتابة  كلمة المرور");
      }elseif(strlen($newPassword)<8){
       array_push($Reset2_errors, "يجب ان تحتوي كلمة المرور  اكثر  من 8 حرف ");
      }
      $uppercase = preg_match('@[A-Z]@', $newPassword);
      $lowercase = preg_match('@[a-z]@', $newPassword);
      $number    = preg_match('@[0-9]@', $newPassword);
    
      if(!$uppercase || !$lowercase || !$number  || strlen($newPassword) < 6) {
      array_push($Reset2_errors, "يجب ان تتكون كلمة السر على الاقل من 6 ارقام تتضمن حرف كبير وحرف صغير وارقام");
      }
      //confirm password///////////////////////////
      if($newPassword != $newPassword2){
        array_push($Reset2_errors, "يجب ان تتطابق كلمات المرور ");
      }

    if(count($Reset2_errors) == 0){

    $username = "root";
    $password = "";
    $database = new PDO("mysql:host=localhost; dbname=rakaya;",$username,$password);
    $updatePassword = $database->prepare("UPDATE users SET pass = :password WHERE Email = :email");
    $updatePassword->bindParam("password",$_POST['resetpass2']);
    $updatePassword->bindParam("email",$_POST['resetEmail']);
  
    if($updatePassword->execute()){
        $SysMsg2= 'تم إعادة تعيين كلمة المرور بنجاح';
     }else{
        $SysMsg2= 'فشل إعادة تعيين كلمة المرور بنجاح';
     }
    }
  
  }  
?>