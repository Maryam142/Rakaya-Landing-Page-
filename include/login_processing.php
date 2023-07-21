<?php
session_start();
if(isset($_POST['submit'])){
    $conn = mysqli_connect('localhost','root','','rakaya');
   
   //to check the connection
   if(!$conn){
       echo 'error: ' . mysqli_connect_error();
   }
   $password =  filter_var($_POST['password'],  FILTER_SANITIZE_STRING);
   $email     =  filter_var($_POST['email'],     FILTER_SANITIZE_EMAIL);

   $errors=[];

   //email
   if(empty($email)){
    $errors[]="يجب كتابة الايميل";
   }

   if(empty($password)){
    $errors[]="يجب كتابة كلمة المرور ";
   }

   if(empty($errors)){

    $stm="SELECT * FROM users WHERE email ='$email'";
    $q=$conn ->prepare($stm);
    $q->execute();
    $data=$q ->fetch();
    if(!$data){
        $errors[] = "خطأ فى تسجيل الدخول";
     }else{
         
          $password_hash=$data['password']; 
          
          if(!password_verify($password,$password_hash)){
             $errors[] = "خطأ فى تسجيل الدخول";
          }else{
             $_SESSION['user']=[
                 "name"=>$data['name'],
                 "email"=>$email,
               ];
             header('location:index.html');
 
          }
     }

   }

}
?>