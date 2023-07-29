<?php
include('./DB_conn.php');

session_start();
if (!isset($_SESSION['logged_in'])) {
  header('location: logIn.php');
  die();
}

$user_email = $_SESSION['user_email'];

$fetchquery = "SELECT * FROM users WHERE Email ='$user_email'";
$result = mysqli_query($conn, $fetchquery);
$row = mysqli_fetch_assoc($result);
$userID = $row['id'];

$homeerrors = array();
$EFname     =  "";
$ELname     =  "";
$Eemail     =  "";
$Ephone     =  "";
$Egender    =  "";
$Eusertype  =  "";
$Epassword2 =  "";
$Epassword2 =  "";
$image     =  "";


// initialize the form's varibales 
if (isset($_POST['edit']) ||  isset($_POST['delete'])) {
  $EFname     =  filter_var($_POST['Efname'],  FILTER_SANITIZE_STRING);
  $ELname     =  filter_var($_POST['Elname'],  FILTER_SANITIZE_STRING);
  $Eemail     =  filter_var($_POST['Eemail'],  FILTER_SANITIZE_EMAIL);
  $Ephone     =  filter_var($_POST['Ephone'],  FILTER_SANITIZE_STRING);
  $Egender    =  $_POST['Egender'];
  $Eusertype  =  $_POST['Eusertype'];
  $Epassword     =  filter_var($_POST['Epassword'],  FILTER_SANITIZE_STRING);
  $Epassword2     =  filter_var($_POST['Epassword2'],  FILTER_SANITIZE_STRING);
}
// edit the profile
if (isset($_POST['edit'])) {
  if (empty($EFname)) {
    array_push($homeerrors,     " يجب كتابة الاسم الاول");
  } elseif (strlen($EFname) > 100) {
    array_push($homeerrors, " يجب ان لايكون الاسم الاول اكبر من 100 حرف ");
  }
  if (empty($ELname)) {
    array_push($homeerrors,     " يجب تعبئة الاسم الاخير");
  } elseif (strlen($ELname) > 100) {
    array_push($errhomeerrorsors, " يجب ان لايكون الاسم الاخير اكبر من 100 حرف ");
  }
  if (empty($Eemail)) {
    array_push($homeerrors, " يجب تعبئة البريد الالكتروبي");
  } elseif (filter_var($Eemail, FILTER_VALIDATE_EMAIL) == false) {
    array_push($homeerrors, "البريد الالكترونى غير صالح");
  }
  if (empty($Ephone)) {
    array_push($homeerrors,     " يجب تعبئة رقم الهاتف ");
  } elseif (!(preg_match('/^(\d{3})[- ]?(\d{3})[- ]?(\d{4})$/', $Ephone))) {
    array_push($homeerrors, " يرجى ادخال رقم الجوال بشكل صحيح");
  }
  if (empty($Eusertype)) {
    array_push($homeerrors, " يجب اختيار نوع المستخدم");
  }
  if (empty($Egender)) {
    array_push($homeerrors, " يجب تحديد الجنس ");
  }
  if (empty($Epassword)) {
    array_push($homeerrors, "يجب كتابة  كلمة المرور");
  } elseif (strlen($Epassword) < 8) {
    array_push($homeerrors, "يجب ان تحتوي كلمة المرور  اكثر  من 8 حرف ");
  }

  $uppercase = preg_match('@[A-Z]@', $Epassword);
  $lowercase = preg_match('@[a-z]@', $Epassword);
  $number    = preg_match('@[0-9]@', $Epassword);

  if (!$uppercase || !$lowercase || !$number  || strlen($Epassword) < 6) {
    array_push($homeerrors, "يجب ان تتكون كلمة السر على الاقل من 6 ارقام تتضمن حرف كبير وحرف صغير وارقام");
  }
  //confirm password///////////////////////////
  if ($Epassword != $Epassword2) {
    array_push($homeerrors, "يجب ان تتطابق كلمات المرور ");
  }

  $image_name      =  $_FILES['Eimage']['name'];
  $image_size      =  $_FILES['Eimage']['size'];
  $image_type      =  $_FILES['Eimage']['type'];
  $image_tmp_name  =  $_FILES['Eimage']['tmp_name'];
  $image_error     =  $_FILES['Eimage']['error'];
  $image_folder    =  'img/' . $image_name;

  //Image Validation //////////////////////////////////////////////
  $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);

  $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

  if ($image_size > 2000000) {
    array_push($homeerrors, "يرجى اختيار صورة بحجم أصغر ");
  } else {
    $image_ex_lc = strtolower($image_extension);
    $allowed_exs = array("jpg", "jpeg", "png");

    if (in_array($image_ex_lc, $allowed_exs)) {
      $image_upload_path = 'img/' . uniqid() . '.' . $image_ex_lc;
    }

    if (!in_array($image_extension, $allowed_extensions)) {
      array_push($homeerrors, "هذا الامتداد غير مسموح");
    }


    if (count($homeerrors) == 0) {
      move_uploaded_file($image_tmp_name, $image_upload_path);
      $query = "UPDATE `users` SET `Email` = '$Eemail ',`Fname`='$EFname', `Lname` = '$ELname', `Phone` = '$Ephone', `Gender` = '$Egender', `pass`= '$Epassword2', `UserType` = '$Eusertype',`Image` = '$image_upload_path'  WHERE `users`.`id` = '$userID'";
      $resultofediting = mysqli_query($conn, $query);
      if ($resultofediting) {
        $ConfirmeditMsg = "تم تحديث بياناتك بنجاح ";
      } else {
        $ConfirmeditMsg = "لم يتم تحديث بياناتك في قاعدة البيانات لدينا ";
      }
    }
  }
}
// delete the profile
if (isset($_POST['delete'])) {
  if (count($homeerrors) == 0) {
    $query =  "DELETE FROM users WHERE `users`.`id` = $userID";
    $resultofediting = mysqli_query($conn, $query);
    if ($resultofediting) {
      $ConfirmeditMsg = "تم حذف الحساب ";
      session_unset();
      header('location: index.html');
      die();
    }
  }
}

// view image profile
if (!empty($row['Image'])) {
  $imgsrc = "<img scr='img/" . $row['Image'] . "' class='rounded-circle mt-5' width='150px'>";
} else {
  $imgsrc = "img/user_profile.png";
}

?>