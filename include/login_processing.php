<?php
session_start();
//connection
$conn = mysqli_connect('localhost','root','','rakaya');
   
//to check the connection
if(!$conn){
    echo 'error: ' . mysqli_connect_error();
}


// cookie
if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
  $email = $_COOKIE['email']; 
  $password = $_COOKIE['password']; 
  
}else{
  $email     =  "";
  $password  =  "";
  // error
  $Logerrors = array();
}



// Server-side validation
$email    =  filter_var($_POST['email'],     FILTER_SANITIZE_EMAIL);
$password =  filter_var($_POST['password'],  FILTER_SANITIZE_STRING);
  

// validate email///////////////////////////
  if(empty($email)){
    array_push($Logerrors, "يجب كتابة البريد الالكترونى");

   }elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
    array_push($Logerrors, "البريد الالكترونى غير صالح");
   }
// validate password///////////////////////////
   if(empty($password)){
    array_push($Logerrors, "يجب كتابة كلمة المرور");
   }

   if(count($Logerrors) == 0){

// From database
    $stm="SELECT * FROM users WHERE email ='$email' && pass =$password ";
    $data=mysqli_fetch_row(mysqli_query($conn, $stm));
    
//check authentication
    if(!$data){
      array_push($Logerrors, "لايوجد حساب بهذا البريد الالكتروني");
   }else{
         
          $password_hash=$data['password']; 
          
          if(!password_verify($password,$password_hash)){
            array_push($Logerrors, "كلمة المرور غير صحيحة");
         }else{

            if (isset($_POST['rememberMe'])){
            //set up cookie 
            setcookie("email", $_POST['email'], time() +(86400 *30));
            setcookie('password', $_POST['pass'], time() + (86400 *30));
            }

            $_SESSION['user']=[
              "name"=>$data['name'],
              "email"=>$email,
            ];
             header('location:index.html');
 
          }
    }

  }
