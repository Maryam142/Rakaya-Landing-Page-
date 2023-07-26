<?php

include('./DB_conn.php');

session_start();
if (!isset($_SESSION['logged_in'])) {
  header('location: logIn.php');
  die();
}

$user_email = $_SESSION['user_email'];

$fetchquery = "SELECT * FROM users WHERE Email ='$user_email'";
$fetchqueryAll = "SELECT * FROM users";

$result = mysqli_query($conn, $fetchquery);
$resultall = mysqli_query($conn, $fetchqueryAll);

$row = mysqli_fetch_assoc($result);
$userID = $row['id'];

$adminerrors = array();
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
            <img src="<?php echo $row['Image'] ?>" class="rounded-pill h-12" height="40" alt="profile image">
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
        <div class="col-md-2 border-right">
          <div class="d-flex flex-column align-items-center text-center p-3 py-5">

            <img class="rounded-circle mt-5" width="150px" src="<?php echo $row['Image'] ?>" alt="profile image" class="font-weight-bold">

          <?php echo $row['Fname'], " ", $row['Lname'] ?></span><span class="text-black-50">
          <?php echo $row['Email'] ?></span><span> </span></div>
        </div>
        <div class="col-md-10 border-right text-end"><!-- right side  -->
          <!-- System Msgs -->
          <?php if (count($adminerrors) > 0) : ?>
            <div class="error">
              <?php foreach ($adminerrors as $error) : ?>
                <p> <?php echo $error; ?> </p>
              <?php endforeach ?>
            </div>
          <?php endif ?>

          <?php if (!empty($ConfirmeditMsg)) : ?>
            <div class="systemMsg w-full">
              <p><?php echo $ConfirmeditMsg ?> </p>
            </div>
          <?php endif ?>
          <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h2 class="display-6 text-center"> بيانات المستخدمين</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered text-center flex">
                                <tr class=" bg-pigi text-white">
                                  <td>الرقم التعريفي</td>
                                  <td>البريد الالكتروني</td>
                                  <td>الاسم الاول</td>
                                  <td>الاسم الثاني</td>
                                  <td>كلمة المرور</td>
                                  <td> نوع المستخدم</td>
                                  <td> تعديل</td>
                                  <td> حذف</td>

                                </tr>

                            <tr>
                              <?php 
                               while($rowUser = mysqli_fetch_assoc($resultall)){                                
                              ?> 
                              <td> <?php echo $rowUser['id'] ?> </td>
                              <td> <?php echo $rowUser['Email'] ?> </td>
                              <td> <?php echo $rowUser['Fname']." ".$rowUser['Lname'] ?></td>
                              <td> <?php echo $rowUser['Phone'] ?> </td>
                              <td> <?php echo $rowUser['pass'] ?> </td>
                              <td> <?php echo $rowUser['UserType'] ?> </td>
                              <td> <a href="#" class="bg-pigi rounded px-2 text-white"> e</a> </td>
                              <td> <a href="#" class="bg-danger px-2 rounded text-white"> d</a></td>

                            </tr>
                            <?php 
                             }
                            ?>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
          </div>
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