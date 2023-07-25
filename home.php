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

  if (count($homeerrors) == 0) {
    $query = "UPDATE `users` SET `Email` = '$Eemail ',`Fname`='$EFname', `Lname` = '$ELname', `Phone` = '$Ephone', `Gender` = '$Egender', `pass`= '$Epassword2', `UserType` = '$Eusertype',`Image` = '$image_name'  WHERE `users`.`id` = '$userID'";
    $resultofediting = mysqli_query($conn, $query);
    if ($resultofediting) {
      $ConfirmeditMsg = "تم تحديث بياناتك بنجاح ";
    } else {
      $ConfirmeditMsg = "لم يتم تحديث بياناتك في قاعدة البيانات لدينا ";
    }
  }
}
// delete the profile
if (isset($_POST['delete'])) {
  if (count($homeerrors) == 0) {
    $query =  "DELETE FROM users WHERE `users`.`id` = $userid";
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
if(!empty($row['Image'])){
  $imgsrc= "<img scr='img/".$row['Image']."' class='rounded-circle mt-5' width='150px'>";
  }else{
    $imgsrc="img/user_profile.png";
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rakaya home</title>
  <link href="img/minilogo.png" rel="icon">
  <!-- animate -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="libraris\animate.css\animate.min.css" rel="stylesheet">
  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Cairo:wght@200;300;400;500;600;700;900;1000&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
  <!--icon -->
  <link href="libraris/animate.css/animate.min.css" rel="stylesheet">
  <link href="libraris/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="libraris/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="libraris/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <!-- Spinner Start -->
  <!-- <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border position-relative pg-light_pigi" style="width: 6rem; height: 6rem;" role="status"></div>
    <img class="position-absolute top-50 start-50 translate-middle" src="img/minilogo.png" alt="Icon" height="60px"
      width="60px">
   </div> -->
  <!-- Spinner End -->


  <!-- Navbar -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <div class="container-fluid">
          <a class="navbar-brand my-3 mt-3" href="index.html">
            <img src="img/rakaya.png" class="me-lg-2" height="40" class=" active btn-get-started animate__animated animate__fadeInUp" />
          </a>
        </div>
      </div>
      <nav>
        <ul class="d-flex me-2" style="line-height: 0; align-items: center; justify-content: space-between; padding: 10px 0 10px 30px;">
          <li class="flex">
            <a href="logout.php" class="bg-pigi px-2 mx-2 py-3 ms-2 flex rounded animate__animated animate__fadeInUp text-light">
              تسجيل الخروج</a>
          </li>
          <li class="flex ">
            <img src="<?php echo $imgsrc ?>" class="rounded-pill h-12" height="40" alt="profile image">
          </li>
        </ul>
      </nav>
    </div>
  </header>



  <section>
    <!-- Background image -->
    <div class="p-5 bg-image" style="background-image: url('img/Sign_in_up.png'); height: 300px; background-attachment: fixed;">
      <div class="text-center">
        <nav aria-label="breadcrumb text-light " style="float: left;">
          <ol class="breadcrumb text-light mt-5 text-xl" style="--bs-breadcrumb-divider-color:#C4AE7C;">
            <li class="breadcrumb-item text-pigi" aria-current="page"> الملف الشخصي </li>
            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- content -->
    <div class="container rounded bg-white mb-5 py-5" style="margin-top: -100px;">
      <div class=" justify-content-between align-items-center mb-1">
        <h4 class="text-center text-bold text-3xl"> <span class="text-pigi"><?php echo $row['Fname'] ?> </span> اهلًا ومرحبًا</h4>
      </div>
      <div class="row flex-row-reverse">
        <div class="col-md-4 border-right">
          <div class="d-flex flex-column align-items-center text-center p-3 py-5">

          <img class="rounded-circle mt-5" width="150px" src="<?php echo $imgsrc ?>" alt="profile image" class="font-weight-bold">

          <?php echo $row['Fname'], " ", $row['Lname'] ?></span><span class="text-black-50">
          <?php echo $row['Email'] ?></span><span> </span></div>
        <form action="home.php" method="POST" enctype="multipart/form-data">
          <div class="form mb-4 text-end">
              <input type="file" name="Eimage" class="box" accept="img/jpg, img/jpeg, img/png">
              </div>
        </div>
        <div class="col-md-7 border-right text-end">
          <div class="p-3 py-3 text-end">
            <form action="home.php" method="POST" class="border border-ramadi rounded p-5">
              <div class="row">
                <div class="col-md-6"><label class="labels">الاسم الأول </label><input type="text" name="Efname" class="form-control text-end" placeholder="الاسم الأول " value="<?php echo $row['Fname'] ?>"></div>
                <div class="col-md-6"><label class="labels">الأسم الأخير </label><input type="text" name="Elname" class="form-control text-end" placeholder="الاسم الأخير" value="<?php echo $row['Lname'] ?>"></div>
              </div>
              <div class="row mt-3 space-y-3">
                <div class="col-md-12 "><label class="labels">رقم الجوال </label><input type="text" name="Ephone" class="form-control text-end" placeholder="رقم الجوال" value="<?php echo $row['Phone'] ?>"></div>
                <div class="col-md-12 "><label class="labels">البريد الالكتروني</label><input type="text" name="Eemail" class="form-control text-end" placeholder="البريد الالكتروني" value="<?php echo $row['Email'] ?>"></div>
                <div class="col-md-12 "><label class="labels"> الجنس</label><input type="text" name="Egender" class="form-control text-end" placeholder="" value="<?php echo $row['Gender'] ?>"></div>
                <div class="col-md-12 "><label class="labels"> نوع المستخدم</label><input type="text" name="Eusertype" class="form-control text-end" placeholder=" " value="<?php echo $row['UserType'] ?>"></div>
                <!-- Password input -->
                <div class="col-md-12 "><label class="form-label" for="Epassword">كلمة المرور</label>
                  <input type="password" name="Epassword" id="Epassword" class="form-control  text-end" placeholder="••••••••" required value="<?php echo $row['pass'] ?>" />
                </div>
                <!-- Password input2 -->
                <div class="col-md-12 "><label class="form-label" for="Epassword2" placeholder="ادخل كلمة المرور مرة اخرى"> تاكيد كلمةالمرور</label>
                  <input type="password" name="Epassword2" id="Epassword2" class="form-control  text-end" placeholder="••••••••" required value="<?php echo $row['pass'] ?>" />
                </div>
                <!-- <div class="col-md-12 mt-5 "><label class="labels">العنوان الأول</label><input type="text" class="form-control text-end" placeholder="العنوان الأول" value=""></div>
              <div class="col-md-12 "><label class="labels">العنوان الثاني </label><input type="text" class="form-control text-end" placeholder="العنوان الثاني " value=""></div>
              <div class="col-md-12 "><label class="labels">الرمز البريدي</label><input type="text" class="form-control text-end" placeholder="الرمز البريدي " value=""></div>
              <div class="col-md-12 "><label class="labels">المنطقة</label><input type="text" class="form-control text-end" placeholder="المنطقة" value=""></div> -->
              </div>
          </div>
          <div class="row mt-3 align-items-center text-end ">
            <div class="col-md-6 text-center"><button type="submit" name="delete" class="btn bg-pigi mb-1 rounded px-2 py-2 hover:bg-cohly text-center text-light" style="background-color: #a94442;" onclick="confirmDeleteAccount()">حذف الحساب</button></div>
            <div class="col-md-6 text-center"><button type="submit" name="edit" class="btn bg-pigi mb-1 rounded px-4 py-2 hover:bg-cohly text-center text-light" style="background-color: #816D4A">تعديل</button></div>
          </div>
          </form>

          <!-- System Msgs -->
          <?php if (count($homeerrors) > 0) : ?>

            <div class="error">
              <?php foreach ($homeerrors as $error) : ?>
                <p> <?php echo $error; ?> </p>
              <?php endforeach ?>
            </div>
          <?php endif ?>

          <?php if (!empty($ConfirmeditMsg)) : ?>
            <div class="systemMsg w-full">
              <p><?php echo $ConfirmeditMsg ?> </p>
            </div>
          <?php endif ?>
        </div>

      </div>
    </div>
  </section>

  <!-- Footer-->
  <footer class=" bg-ramadi fixed-bottom position-relative">
    <div class="container mx-auto flex flex-col flex-col-reverse md:flex-row text-light px-5 py-10 items-center justify-between space-y-3">

      <div class="flex flex-col items-center justify-between space-y-2">
        <img src="img/minilogo.png" alt="logo" style="height: 7rem; width: 6.5rem;">
        <div>
          <a class="btn bg-pigi btn-social mx-2 rounded-circle" href="tel:+966570077055" target="_blank" aria-label="Phone"><i class="bi bi-telephone-fill" style="color: #ffffff;"></i></a>
          <a class="btn bg-pigi btn-social mx-2 rounded-circle" href="mailto:Admin@rakaya.co" target="_blank" aria-label=" Email"><i class="bi bi-envelope-fill" style="color: #ffffff;"></i></a>
          <a class="btn bg-pigi btn-social mx-2 rounded-circle" href="https://www.linkedin.com/company/rakaya/" target="_blank" aria-label="LinkedIn"><i class="bi bi-linkedin" style="color: #ffffff;"></i></a>
          <a class="btn bg-pigi btn-social mx-2 rounded-circle" href="https://twitter.com/rakayaco" target="_blank" aria-label="Twitter"><i class="bi bi-twitter" style="color: #ffffff;"></i></a>
        </div>
      </div>
      <div class="flex justify-around space-x-32">
        <div class="flex flex-col space-y-2">
          <a href="index.html">الرئيسية</a>
          <a href="#about">عن ركايا</a>
        </div>
        <div class="flex flex-col space-y-2">
          <a href="#services">خدماتنا</a>
          <a href="#contact">للتواصل</a>
        </div>
      </div>
      <div class="flex flex-col justify-between items-center">
        <form action="">
          <div class="single">
            <div class="input-group">
              <input type="text" name="" placeholder="البريد الإلكتروني" id="" class="mb-2 flex-1 py-2 px-6 rounded text-end">
              <span class="input-group-btn">
                <button class="ml-2 btn bg-pigi rounded px-6 py-2 hover:bg-cohly text-light" type="submit" name="Subscribe">الاشتراك</button>
              </span>
            </div>
          </div>
        </form>
        <div class="hidden md:block text-right">اشترك لدينا ليصلك كل جديد</div>
      </div>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color:#333335; color:white;">
      ركايا | جميع الحقوق محفوظة |g&copy; 2023
      <a class="text-white" href="#"></a>
    </div>
  </footer>


  <!-- back to top btn -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center active"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="js/main.js"></script>
  <script src="js/spinner.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            white: '#ffffff',
            pigi: '#C4AE7C',
            cohly: '#2C3640',
            ramadi: '#3E3E41',
            boni: '#816D4A',
            light_pigi: '#EEE8DA',
            Too_light_rmadi: '#F4F4F4'
          }
        }
      }
    }
  </script>

</body>

</html>