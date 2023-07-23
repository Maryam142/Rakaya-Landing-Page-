<?php 

session_start();
if(!isset($_SESSION['logged_in'])){
    header('location: logIn.php');
    die();
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
          <a class="navbar-brand" href="index.html">
            <img src="img/rakaya.png" class="me-lg-2" height="40" class=" active btn-get-started animate__animated animate__fadeInUp" />
          </a>
        </div>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.html" class="btn-get-started animate__animated animate__fadeInUp">الرئيسية</a></li>
          <li><a href="index.html" class="btn-get-started animate__animated animate__fadeInUp">مشاريعك</a></li>
          <li><a href="index.html" class="btn-get-started animate__animated animate__fadeInUp">نص وصف</a></li>
          <li><a href="index.html" class="btn-get-started animate__animated animate__fadeInUp">نص وصف</a></li>
          <li class="breadcrumb-item"><a href="logout.php" style="background-color: #C4AE7C ;" class="px-3 py-2 ms-4 me-4 rounded text-light hover:bg-ramadi animate__animated animate__fadeInUp">تسجيل الخروج</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>


</body>
</html>


<
