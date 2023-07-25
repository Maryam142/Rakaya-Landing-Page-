<?php

include ('./DB_conn.php');



session_start();
if(isset($_SESSION['user'] )){
  header('location: home.php');
  exit();
}

// cookie
if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
  $email = $_COOKIE['email']; 
  $password = $_COOKIE['password']; 
  $rememberMe="checked='checked'";
}else{
  $email      =  "";
  $password   =  "";
  $rememberMe =  "";
}
 
$Logerrors  =  array();

if(isset($_POST['submit_login'])){
 // Server-side validation
 $email    =  filter_var($_POST['email'],     FILTER_SANITIZE_EMAIL);
 $password =  filter_var($_POST['password'],  FILTER_SANITIZE_STRING);

 //set up cookie  
  if (isset($_POST['rememberMe'])){
  setcookie('email', $_POST['email'], time() +(86400 *30));
  setcookie('pass', $_POST['password'], time() + (86400 *30));
  }else{
    setcookie('email', '', time() - (86400 *30));
    setcookie('pass', '', time() - (86400 *30));
  }


// validate email///////////////////////////
  if(empty($email)){
    array_push($Logerrors, "يجب كتابة البريد الالكترونى");

   }
   elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
    array_push($Logerrors, "البريد الالكترونى غير صالح");
   }

  // validate password///////////////////////////
   if(empty($password)){
    array_push($Logerrors, "يجب كتابة كلمة المرور");
   }

if(count($Logerrors) == 0){
// From database
    $stm="SELECT * FROM users WHERE Email ='$email'";
    $data=mysqli_fetch_row(mysqli_query($conn, $stm));

//check authentication
    if(!$data){
      array_push($Logerrors, "لا  يوجد حساب مسجل بهذا البريد الالكتروني");
   }else{
          $password_db= $data[5];  
    
          if($password === $password_db){

            $_SESSION['logged_in']= true;
            $_SESSION['user_email'] = $email;

            if(isset($_POST['rememberMe'])){
             setcookie("email", $_POST['email'], time() +(86400 *30));
             setcookie('password', $_POST['password'], time() + (86400 *30));
            }
            
            header('location: home.php');
         }else{
          array_push($Logerrors, "كلمة المرور غير صحيحة"); 
          }
    }
  }
}
