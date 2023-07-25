<?php

session_start();

include ('./DB_conn.php');
 

$firstName =  "";
$lastName  =  "";
$password  =  "";
$password2 =  "";
$email     =  "";
$phone     =  "";
$gender    =  "";
$usertype  =  "";
$image     =  "";
$errors = array();


if(isset($_POST['submit'])){

// Server-side validation
$firstName =  filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
$lastName  =  filter_var($_POST['lastName'],  FILTER_SANITIZE_STRING);
$password  =  filter_var($_POST['password'],  FILTER_SANITIZE_STRING);
$password2 =  filter_var($_POST['password2'],  FILTER_SANITIZE_STRING);
$email     =  filter_var($_POST['email'],     FILTER_SANITIZE_EMAIL);
$phone     =  filter_var($_POST['phone'],     FILTER_SANITIZE_STRING);
$gender    =  $_POST['gender'];
$usertype  =  $_POST['usertype'];

$img_name  =  $_FILES['image']['name'];
$img_size  =  $_FILES['image']['size'];
$img_type  =  $_FILES['image']['type'];
$tmp_name  =  $_FILES['image']['tmp_name'];






// Server-side validation///////////////////////////////////////////////////////
   // validate first and last name///////////////////////////
   if(empty($firstName)){
       array_push($errors, " يجب كتابة الاسم الاول");
   }elseif(strlen($firstName)>100){
       array_push($errors,"يجب ان لايكون الاسم اكبر من 100 حرف ");
   }

   
   if(empty($lastName)){
    array_push($errors, " يجب كتابة الاسم الاخير");
   }elseif(strlen($lastName)>100){
    array_push($errors, " يجب ان لايكون الاسم اكبر من 100 حرف ");
   }

   // validate email///////////////////////////
   if(empty($email)){
    array_push($errors, "يجب كتابة البريد الالكترونى");

   }elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
    array_push($errors, "البريد الالكترونى غير صالح");
   }

  // validate password////////////////////////////
  if(empty($password)){
    array_push($errors, "يجب كتابة  كلمة المرور");
  }elseif(strlen($password)<8){
   array_push($errors, "يجب ان تحتوي كلمة المرور  اكثر  من 8 حرف ");
  }

  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);

  if(!$uppercase || !$lowercase || !$number  || strlen($password) < 6) {
  array_push($errors, "يجب ان تتكون كلمة السر على الاقل من 6 ارقام تتضمن حرف كبير وحرف صغير وارقام");
  }
  //confirm password///////////////////////////
  if($password != $password2){
    array_push($errors, "يجب ان تتطابق كلمات المرور ");
  }

  // validate gender///////////////////////////
    if(empty($gender)){
      array_push($errors, "يرجى تحديد نوع الجنس");
    }
  // validate userType///////////////////////////
    if(empty($usertype)){
      array_push($errors, "يرجى تحديد نوع المستخدم");
    }

  // validate phone///////////////////////////
  if(empty($phone)){
    array_push($errors, "يرجى ادخال رقم الجوال");
  }
  if (!(preg_match('/^(\d{3})[- ]?(\d{3})[- ]?(\d{4})$/', $phone)) ){
  array_push($errors, " يرجى ادخال رقم الجوال بشكل صحيح");

  }



//prevent dublicate emails query/////////////////////////////////////////////////
$statment="SELECT email FROM users WHERE email ='$email'";
$data=mysqli_fetch_row(mysqli_query($conn, $statment));

if($data){
  array_push($errors, "هناك حساب مسجل مسبقا بهذا البريد الالكتروني");
}

//insert query/////////////////////////////////////////////////////////////////////
  if(count($errors) == 0){

  //Encrypt the password
  // $password=password_hash($password,PASSWORD_DEFAULT);

  $sql = "INSERT INTO `users`( `Email`, `Fname`, `Lname`, `Phone`, `pass`, `Gender`, `UserType` ,'Image') VALUES ('$email ','$firstName','$lastName','$phone','$password ','$gender','$usertype' ,'$image')";

  //feedback  
   if( mysqli_query($conn, $sql)){
    $_SESSION['firstName'] = $firstName;
    header('Location: signUp_success.php'); //redirect the page

   }
 }


}
   
?>