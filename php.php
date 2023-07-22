<?php


session_start();
if(isset($_SESSION['user']))
{
    header('location:index.php');
    exit();
}



if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
    $mail = $_COOKIE['email']; 
    $pass = $_COOKIE['password']; 
}else{
    $mail = "";
    $pass = "";
}

if(isset($_POST['submit'])){
 include 'conn-db.php';
   $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
   $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    
    // create cookie
   if(isset($_POST['remember'])){
    setcookie("email" , $_POST['email'], time() + (60 * 60 * 24));
    setcookie("password" , $_POST['password'], time() + (60 * 60 * 24));
   }

   //validate and insert-----------------------------------------------------

   $errors=[];
   

   // validate email
   if(empty($email)){
    $errors[]="يجب كتابة البريد الاكترونى";
   }


   // validate password
   if(empty($password)){
        $errors[]="يجب كتابة  كلمة المرور ";
   }



   // insert or errros 
   if(empty($errors))
   {
   
    $stm="SELECT * FROM user WHERE email ='$email' ";
    $q=$conn->prepare($stm);
    $q->execute();
    $data=$q->fetch();

    if(!$data){
       $errors[] = "لا يوجد حساب لهذا البريد الالكتروني";
    }else{
        
         $password_hash=$data['password']; 
         
         if(!password_verify($password,$password_hash)){
            $errors[] = "خطأ في تسجيل الدخول , فضلاً تأكد من كلمة المرور";
         }
         else{
            $_SESSION['user']=[
                "name"=>$data['name'],
                "email"=>$email,
              ];
            header('location:index.php');       //navigate tp this page if log-in successful

         }
    }
     
    
   }
}

?>