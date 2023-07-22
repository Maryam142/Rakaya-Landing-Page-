<?php
session_start();
//connection
$conn = mysqli_connect('localhost','root','','rakaya');
   
//to check the connection
if(!$conn){
    echo 'error: ' . mysqli_connect_error();
 }

$email     =  "";
$password  =  "";
$Logerrors = array();




// if(isset($_POST['submit']) && isset($_POST['password'])){

//   function validate($data){
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
//   }

//   $email    =  validate($_POST['email']);
//   $password =  validate($_POST['password']);
// }


// if(empty($email)){
//   header('Location: index.php?erro= email is required');
//   exit();
// }
// else if(empty($password)){
//   header('Location: index.php?erro= email is required');
//   exit();
// }

// $sql = "SELECT * FROM users WHERE  email ='$email' AND password ='password'";

// $result = mysqli_query($conn,$sql);

// if(mysqli_num_rows($result) === 1){
//   $row = mysqli_fetch_assoc($result);
//   if($row['email'] === $email && $row['password'] === $password){
//     echo"Logged in !!!!";
//     $_SESSION['email'] = $row ['email'];
//     $_SESSION['Fname'] = $row ['Fname'];
//     header("Location: home.php");
//     exit();

//   }else{
//     header("Location: index.php?error=Incorrect User Name or Password");
//     exit();

//   }
// }else{
//   header("Location: index.php");
//   exit();
// }


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

    $stm="SELECT * FROM users WHERE email ='$email'";
    $data=mysqli_fetch_row(mysqli_query($conn, $stm));
    

    if(!$data){
      array_push($Logerrors, "لايوجد حساب بهذا البريد الالكتروني");
   }else{
         
          $password_hash=$data['password']; 
          
          if(!password_verify($password,$password_hash)){
            array_push($Logerrors, "كلمة المرور غير صحيحة");
         }else{
             $_SESSION['user']=[
                 "name"=>$data['name'],
                 "email"=>$email,
               ];
             header('location:index.html');
 
          }
    }

  }

?>
