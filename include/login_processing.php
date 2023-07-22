<?php
//connection
$conn = mysqli_connect('localhost','root','','rakaya');
   
//to check the connection
if(!$conn){
    echo 'error: ' . mysqli_connect_error();
 }

session_start();

$email     =  "";
$password  =  "";
$errors = array();

if(isset($_POST['submit'])){

   $password =  filter_var($_POST['password'],  FILTER_SANITIZE_STRING);
   $email     =  filter_var($_POST['email'],     FILTER_SANITIZE_EMAIL);


   if(empty($email)){
    array_push($errors, "يجب كتابة الايميل");
   }
   if(empty($password)){
    array_push($errors, "يجب كتابة كلمة المرور");
   }

   if(count($errors) == 0){

    $stm="SELECT * FROM users WHERE email ='$email'";
    $data=mysqli_fetch_row(mysqli_query($conn, $stm));
    
    $q=$conn ->prepare($stm);
    $q->execute();
    $data=$q ->fetch();
    if(!$data){
      array_push($errors, "لايوجد حساب بهذا البريد الالكتروني");
   }else{
         
          $password_hash=$data['password']; 
          
          if(!password_verify($password,$password_hash)){
            array_push($errors, "كلمة المرور غير صحيحة");
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