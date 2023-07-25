<?php
include ('./include/signup_processing.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rakaya Sign Up</title>
  <link href="img/minilogo.png" rel="icon">
  <!-- animate -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="libraris\animate.css\animate.min.css" rel="stylesheet">
  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Cairo:wght@200;300;400;500;600;700;900;1000&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600&display=swap"
    rel="stylesheet">
  <!--icon -->
  <link href="libraris/animate.css/animate.min.css" rel="stylesheet">
  <link href="libraris/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="libraris/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="libraris/boxicons/css/boxicons.min.css" rel="stylesheet">
  <!-- Our Style -->
  <link href="css/style.css" rel="stylesheet">
  <!-- validation library -->
  <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
  <!-- our validation -->
  <script src="js/Signup_Validation.js" defer></script>
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
            <img src="img/rakaya.png" class="me-lg-2" height="40"
              class=" active btn-get-started animate__animated animate__fadeInUp" />
          </a>
        </div>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.html" class="btn-get-started animate__animated animate__fadeInUp">الرئيسية</a></li>
          <li><a href="index.html" class="btn-get-started animate__animated animate__fadeInUp">عن ركايا</a></li>
          <li><a href="index.html" class="btn-get-started animate__animated animate__fadeInUp">خدماتنا</a></li>
          <li><a href="index.html" class="btn-get-started animate__animated animate__fadeInUp">للتواصل</a></li>
          <li class="breadcrumb-item"><a href="logIn.php"
              class="bg-pigi px-3 py-2 ms-4 me-4 rounded text-light hover:bg-ramadi animate__animated animate__fadeInUp">تسجيل الدخول </a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

  <!-- Background image -->
  <section>
    <div class="p-5 bg-image"
      style="background-image: url('img/Sign_in_up.png'); height: 300px; background-attachment: fixed;">
      <div class="text-center">
        <nav aria-label="breadcrumb text-light " style="float: left;">
          <ol class="breadcrumb text-light mt-5 text-xl" style="--bs-breadcrumb-divider-color:#C4AE7C;">
            <li class="breadcrumb-item text-pigi" aria-current="page">انشاء حساب </li>
            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- card -->
    <div data-aos="fade-up" data-aos-duration="6000" class="card-body rounded-5 mx-5 mx-md-5 shadow-5-stron "
      style="margin-top: -100px; background: hsla(0, 0%, 100%, 0.9); backdrop-filter: blur(50px);">
      <div class="card-body py-5  px-3">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="font-bold text-center text-3xl text-boni">انشاء حساب </h2>
            <i>
              <p class="mb-5 font-light text-center text-xl mx-4 text-cohly"> اهلا ومرحبــا عميلنا العزيز تسرنا زيارتك
                </h2>
            </i>

            <!-- Sign-up Form -->
            <form action="signUp.php" method="POST" enctype="multipart/form-data" class="text-end me-5 ms-5 needs-validation" id="signup">
              <div class="row">
              <?php include ('./include/error.php'); ?>
                <div class="col-md-6 mb-3">
                  <div class="form-outline ">
                    <label class="form-label " for="lastName">الاسم الاخير</label>
                    <input type="text" name="lastName" id="lastName" class="form-control text-end"  value="<?php if(isset($_POST['lastName'])){echo $_POST['lastName'];} ?>" placeholder="ادخل الاسم الاخير " required/>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline ">
                    <label class="form-label " for="firstName">الاسم الاول</label>
                    <input type="text" name="firstName" id="firstName" class="form-control text-end" value="<?php if(isset($_POST['firstName'])){echo $_POST['firstName'];} ?>" placeholder="ادخل الاسم الاول " required/>
                  </div>
                </div>
              </div>
              <!-- Email input -->
              <div class="form-outline mb-4 text-end">
                <label class="form-label text-end" for="email">الإيميل</label>
                <input type="email" name="email" id="email" class="form-control text-end"  value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" placeholder="email@example.com" required/>
              </div>
              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="password">كلمة المرور</label>
                <input type="password" name="password" id="password" class="form-control  text-end" placeholder="••••••••" required/>
              </div>
              <!-- Password input2 -->
              <div class="form-outline mb-4">
                <label class="form-label" for="password2" placeholder="ادخل كلمة المرور مرة اخرى"> تاكيد كلمة
                  المرور</label>
                <input type="password" name="password2" id="password2" class="form-control  text-end" placeholder="••••••••" required />
              </div>
              <!-- Phone -->
              <div class="form-outline mb-4">
                <label class="form-label" for="phone">رقم الجوال</label>
                <input type="tel" id="phone" name="phone" class="form-control text-end" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];} ?>" placeholder="05ْX-XXX-XXXX" required  /> 
                <!-- pattern="[0-9]{3}[0-9]{3}[0-9]{4}" -->
                <div id="result"> </div>
              </div>
              <!-- Gender -->
              <div class="form-outline mb-2">
                <label>الجنس</label>
              </div>
              <div class="form-check-inline ">
                <label class="form-check-label" for="gender">أنثى</label>
                <input class="form-check-input" type="radio" name="gender" value="female" id="gender">
              </div>
              <div class="form-check-inline mb-4">
                <label class="form-check-label" for="gender">ذكر</label>
                <input class="form-check-input" type="radio" name="gender" value="male" id="gender">
              </div>
              <div id="msg"></div>
              <!-- select user type -->
              <div class="form-outline mb-4 text-end">
                <label class="form-label text-end">نوع المستخدم </label>
                <select name="usertype" id="usertype" class="form-select text-end mb-2" aria-label="Default select example">
                <option value="" >- اختر -</option>
                  <option value="Consultant" >استشاري</option>
                  <option value="Developer">مطور</option>
                  <option value="Client">عميل</option>
                  <option value="Intern">متدرب</option>
                </select>
              </div>
              <div class="form-outline mb-4 text-end">
              <label class="form-label" >ارفع صورة شخصية </label>
              </div>
              <div class="form-outline mb-4 text-center">
              <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
              </div>
              <!-- Submit button -->
              <div class="text-center">
              <button name="submit" class="w-full btn bg-pigi mb-1 rounded px-4 py-2 hover:bg-cohly text-center text-light" type="submit" style="background-color: #C4AE7C;">
                  انشئ الحساب</button>
              <div>
                  <i> لديك حساب بالفعل؟ <a href="logIn.html" class="link-underline-dark link-opacity-75 text-boni"> اضغط
                      هنا
                    </a> 
                  </i>
                <?php if (!(empty($success)) ): ?>

                    <div class="success">
                            <p> <?php echo $success; ?> </p>
                    </div>
                <?php endif ?>
                </div>
              </div>
            </form>
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
          <a class="btn bg-pigi btn-social mx-2 rounded-circle" href="tel:+966570077055" target="_blank"
            aria-label="Phone"><i class="bi bi-telephone-fill" style="color: #ffffff;"></i></a>
          <a class="btn bg-pigi btn-social mx-2 rounded-circle" href="mailto:Admin@rakaya.co" target="_blank"
            aria-label=" Email"><i class="bi bi-envelope-fill" style="color: #ffffff;"></i></a>
          <a class="btn bg-pigi btn-social mx-2 rounded-circle" href="https://www.linkedin.com/company/rakaya/"
            target="_blank" aria-label="LinkedIn"><i class="bi bi-linkedin" style="color: #ffffff;"></i></a>
          <a class="btn bg-pigi btn-social mx-2 rounded-circle" href="https://twitter.com/rakayaco" target="_blank"
            aria-label="Twitter"><i class="bi bi-twitter" style="color: #ffffff;"></i></a>
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
      <input type="text" name="" placeholder="البريد الإلكتروني" id=""class="mb-2 flex-1 py-2 px-6 rounded text-end">
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
      ركايا | جميع الحقوق محفوظة |
      &copy; 2023
      <a class="text-white" href="#"></a>
    </div>
</footer>

  <!-- scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
    crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init();</script>
  <script src="js/main.js"></script>
  <script src="js/spinner.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            pigi: '#C4AE7C', cohly: '#2C3640', ramadi: '#3E3E41', boni: '#816D4A', light_pigi: '#EEE8DA', Too_light_rmadi: '#F4F4F4'
          }
        }
      }
    }
  </script>
</body>

</html>