<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="description" content="Landing page of Rakaya management consulting company, A company that provides management consulting companies to develop and present them and provide smart technical solutions to overcome administrative and technical problems and achieve their goals successfully. It also provides commercial and commercial digital services.">
  <!--Tab Tilte and Icon-->
  <title>Rakaya</title>
  <link href="img/minilogo.png" rel="icon">
  <!-- animate -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="libraris\animate.css\animate.min.css" rel="stylesheet">
  <!--icon -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;900;1000&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1500;1,600&display=swap" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- font -->
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Cairo:wght@700;800;900;1000&display=swap" rel="stylesheet">
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <link href="css\style.css" rel="stylesheet">
</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border position-relative pg-light_pigi" style="width: 11rem; height: 11rem;" role="status">
    </div>
    <img class="position-absolute top-50 start-50 translate-middle" src="img/minilogo.png" alt="Icon" height="90px" width="90px">
  </div>

  <!-- Nav Bar -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <div class="container-fluid">
          <a class="navbar-brand my-3 mt-3" href="index.html">
            <img src="img/rakaya.png" class="me-lg-2" height="40" class=" active btn-get-started animate__animated animate__fadeInUp" />
          </a>
        </div>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.html" class=" active btn-get-started animate__animated animate__fadeInUp ">الرئيسية</a>
          </li>
          <li><a href="#about" class="btn-get-started animate__animated animate__fadeInUp">عن ركايا</a></li>
          <li><a href="#services" class="btn-get-started animate__animated animate__fadeInUp">خدماتنا</a></li>
          <li><a href="#contact" class="btn-get-started animate__animated animate__fadeInUp me-2">للتواصل</a></li>
          <li class="border-right border-secondary"><a href="logIn.php" class="bg-pigi px-2 py-2 ms-2 rounded animate__animated animate__fadeInUp text-light">تسجيل دخول</a></li>
          <li class="border-right border-secondary"><a href="signUp.php" class="hover:bg-white px-2 py-2 ms-2 rounded animate__animated animate__fadeInUp">تسجيل
              جديد</a></li>
        </ul>
        <i class="bi bi-list  mobile-nav-toggle me-5 mt-1"></i>
      </nav>
    </div>
  </header>

  <!-- Hero -->
  <div>
    <div id="hero">
      <div class="texture"></div>
      <video loop muted autoplay preload="auto">
        <source src="img/vid1.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <div class="caption">
        <div>
          <h1 class="animate__animated animate__fadeInDown">ركايا</h1>
          <h2 class="animate__animated animate__fadeInUp text-3xl mb-5 text-pigi"> الوجهة الأمثل لتطوير مشروعك
            واستدامة نجاحه</h2>
          <a href="" class="btn-get-started animate__animated animate__fadeInUp">إقرأ المزيد</a>
        </div>
      </div>
    </div>
  </div>

  <!-- about -->
  <div class="" id="about">
    <div class="container py-5">
      <div class="row h-100 align-items-center py-5">
        <div class="col-lg-6" data-aos="zoom-in-right">
          <h1 class="display-6 font-light text-2xl text-ramadi text-end me-3">عن ركايا</h1>
          <h1 class=" display-5 text-pigi text-end font-bold"> من نحن ؟</h1>
          <h2 class="lead ms-2 mt-2 me-4 mb- text-cohly text-center font-light">متخصصون في تقديم الخدمات الاستشارية
            لتمكين
            المنظمات والمجتمعات من مواكبة التطور في جميع المجالات و وضع حلول إبتكارية للتغلب على التحديات والمصاعب </h2>
          <h2 class="lead ms-2 me-4 mt-2 text-boni text-center font-light"> نستخدم احدث الاستراتيجيات نحقق أهداف
            عملاءنا بذكاء</h2>
        </div>
        <div class="col-lg-6 d-none d-lg-block" data-aos="zoom-in-left">
          <img src="img/about2.jpeg" alt="" class="img-fluid border border-pigi border-top-0 border-start-0 border-bottom border-5">
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Gallary -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img\3.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img\2.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img\1.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Values-->
  <section class="page-section bg-light">
    <div class="container pb-5">
      <div class="text-center ">
        <h2 class="font-bold text-4xl section-heading text-uppercase py-5 mb-2 text-cohly">قيمنــــا</h2>
      </div>

      <div class="row text-center align-items-center">
        <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
          <div class="grow py-4">
            <i class="bi bi-gem valuesicon mb-5 shadow-sm"></i>
            <h4 class="font-bold mb-2 mt-4">النزاهـة</h4>
            <p class="text-muted"> نسعى دوما لنجاح عملاؤنا بافضل النتائج كما نسعى جاهدين لتقديم نتائج تفوق توقعاتهم</p>
          </div>
        </div>

        <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
          <div class="grow py-4">
            <i class="bi bi-reception-4 valuesicon mb-5 shadow-sm"></i>
            <h4 class="font-bold mb-2 mt-4">التمكيـن</h4>
            <p class="text-muted">نعمل مع عملائنا جنبا الى جنب لتطوير حلول تضمن استدامة نجاحها لديهم</p>
          </div>
        </div>

        <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
          <div class="grow py-4">
            <i class="bi bi-hand-thumbs-up valuesicon mb-5 shadow-sm"></i>
            <h4 class="font-bold mb-2 mt-4">التركيز على العميـل</h4>
            <p class="text-muted">نوفي بوعودنا ونتبنى دور الشريك الثقه لتمكين عملاؤنا والعمل من المصلحة</p>
          </div>
        </div>

        <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
          <div class="grow py-4">
            <i class="bi bi-award valuesicon mb-5 shadow-sm"></i>
            <h4 class="font-bold mb-2 mt-4">التميـز</h4>
            <p class="text-muted">نسعى دوما للتحسين المستمر من خلال البحث والتطوير وتقديم افضل الحلول المناسبة</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- servies -->
  <section class="page-section pt-4" style="background-color: #d2c5a5;" id="services">
    <div class="container">
      <div class="text-center">
        <h2 class="font-bold text-4xl section-heading text-light py-2 mt-5 mb-1">خدماتنـــا</h2>
        <h1 class="text-muted py-2 pb-2" data-aos-anchor-placement="center-bottom">إبدا تطوير وإدارة نشاطك التجاري معنا
          من خلال العديد من الخدمات المتنوعة التي نقدمها باحترافية</h1>
      </div>
    </div>
    <section class="container pt-3 mb-3">
      <div class="row pt-5 mt-30 flex-row-reverse">

        <div class="col-lg-4 col-sm-6 mb-30 pb-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
          <a class=" grow card" href="#">
            <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;"><i class="bi bi-1-circle-fill fa-4x head-icon"></i>
            </div>
            <div class="card-body text-center">
              <h3 class="card-title pt-1">التخطيط الاستراتيجي </h3>
              <p class="card-text text-sm">
              <ul>
                <div class="text-end">
                  <li>بناء استراتيجيات العمل •</li>
                  <li>بناء نموذج العمل •</li>
                  <li>تصميم المؤشرات الاستراتيجية •</li>
                  <li>بناء خطط تنفيذ الاستراتيجيات •</li>
                  <li>تصميم الرؤية والرسالة والقيم •</li>
                </div>
              </ul>
              </p><span class="text-sm text-uppercase font-weight-bold">المزيد&nbsp;<i class="fe-icon-arrow-right"></i></span>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6 mb-30 pb-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
          <a class=" grow card" href="#">
            <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;"><i class="bi bi-2-circle-fill fa-4x head-icon"></i></i></div>
            <div class="card-body text-center">
              <h3 class="card-title pt-1">بناء قدرات الموارد البشرية </h3>
              <p class="card-text text-sm">
              <ul>
                <div class="text-end">
                  <li>تصميم الهياكل التنظيمية •</li>
                  <li>تصميم اللوائح الداخلية •</li>
                  <li>تصميم الاجور والبدلات والحوافز •</li>
                  <li>تصميم مؤشرات اداء الموظفين •</li>
                  <li>بناء قدرات فريق العمل (TBS) •</li>
                </div>
              </ul>
              </p><span class="text-sm text-uppercase font-weight-bold">المزيد&nbsp;<i class="fe-icon-arrow-right"></i></span>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6 mb-30 pb-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
          <a class=" grow card" href="#">
            <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;"><i class="bi bi-3-circle-fill fa-4x head-icon"></i>
            </div>
            <div class="card-body text-center">
              <h3 class="card-title pt-1">التميز المؤسسي </h3>
              <p class="card-text text-sm">
              <ul>
                <div class="text-end">
                  <li>تحسين اجراءات العمل •</li>
                  <li>تطبيق وتفعيل انظمة الجودة •</li>
                  <li>تصميم مصفوفة الصلاحيات •</li>
                  <li>تطوير ادلة السياسات والإجراءات •</li>
                  <li>تحليل وتطوير انظمة سلاسل الإمداد •</li>
                </div>
              </ul>
              </p><span class="text-sm text-uppercase font-weight-bold">المزيد&nbsp;<i class="fe-icon-arrow-right"></i></span>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6 mb-30 pb-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
          <a class=" grow card" href="#">
            <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;"><i class="bi bi-4-circle-fill fa-4x head-icon"></i>
            </div>
            <div class="card-body text-center">
              <h3 class="card-title pt-1">الابداع وريادة الأعمال </h3>
              <p class="card-text text-sm">
              <ul>
                <div class="text-end">
                  <li>تصميم الهياكل التنظيمية •</li>
                  <li>تصميم اللوائح الداخلية •</li>
                  <li>تصميم الاجور والبدلات والحوافز •</li>
                  <li>ادارة حسابات التواصل الاجتماعي •</li>
                  <li>ادارة الحملات الاعلانية •</li>
                </div>
              </ul>
              </p><span class="text-sm text-uppercase font-weight-bold">المزيد&nbsp;<i class="fe-icon-arrow-right"></i></span>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6 mb-30 pb-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
          <a class=" grow card" href="#">
            <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;"><i class="bi bi-5-circle-fill fa-4x head-icon"></i>
            </div>
            <div class="card-body text-center">
              <h3 class="card-title pt-1">الخدمات الرقمية والتواصل الإجتماعي </h3>
              <p class="card-text text-sm">
              <ul>
                <div class="text-end">
                  <li>تأسيس هوية بصرية •</li>
                  <li>بناء دليل شامل للهوية البصرية •</li>
                  <li>تقديم الإستشارات للتسويق الرقمي •</li>
                  <li>إدراة حسابات التواصل الاجتماعي •</li>
                  <li>ادارة الحملات الاعلانية •</li>
                </div>
              </ul>
              </p><span class="text-sm text-uppercase font-weight-bold">المزيد&nbsp;<i class="fe-icon-arrow-right"></i></span>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6 mb-30 pb-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
          <a class=" grow card" href="#">
            <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;"><i class="bi bi-6-circle-fill fa-4x head-icon"></i>
            </div>
            <div class="card-body text-center">
              <h3 class="card-title pt-1">خدمة الامتياز التجاري (فرنشايز) </h3>
              <p class="card-text text-sm">
              <ul>
                <div class="text-end">
                  <li>تقديم الملخص القانوني للإمتياز التجاري •</li>
                  <li>الخطة الاستراتيجية •</li>
                  <li>الهوية البصرية •</li>
                  <li>تصميم المواصفات الإنشائية للمطاعم •</li>
                  <li>تقديم ملف تدريبي •</li>
                </div>
              </ul>
              </p><span class="text-sm text-uppercase font-weight-bold">المزيد&nbsp;<i class="fe-icon-arrow-right"></i></span>
            </div>
          </a>
        </div>
      </div>
    </section>
  </section>

  <!-- team -->
  <section>
    <div class="py-5 text-center  background-info" style="background-color: #ffffff;">
      <div class="container">
        <div class="row">
          <h2 class="font-bold text-4xl section-heading text-uppercase py-5 mb-2 text-cohly">فريق عمل ركايـا المبدع</h2>
        </div>

        <div class="row">
          <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000" class="col-lg-4 col-md-6 p-4">
            <img class="img-fluid d-block mb-3 mx-auto rounded-circle" alt="Card image cap" width="200" src="img\team1.jpeg">
            <h4> <b>م. عمر خان </b> </h4>
            <p class="mb-0">IT Department Manager</p>
          </div>

          <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000" class="col-lg-4 col-md-6 p-4">
            <img class="img-fluid d-block mb-3 mx-auto rounded-circle" alt="Card image cap" width="200" src="img/team.png">
            <h4> <b> م. غيداء المغربي</b> </h4>
            <p class="mb-0">App developer</p>
          </div>

          <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000" class="col-lg-4 p-4">
            <img class="img-fluid d-block mb-3 mx-auto rounded-circle" alt="Card image cap" width="200" src="img/team.png">
            <h4> <b>م. أسامة الجهني </b> </h4>
            <p class="mb-0">Full Stack developer</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Partners -->
  <section class="page-section bg-light">
    <div class="row align-items-center">
      <div class="text-center">
        <h2 class="font-bold text-4xl section-heading text-uppercase py-2 mt-5 mb-5 text-cohly">شركــاء التميز</h2>
      </div>

      <div id="carouselExampleSlidesOnly" class="carousel slide text-center mb-5" data-bs-ride="carousel" data-aos="fade-up" data-aos-duration="3000">
        <div class="container ">
          <div class="carousel-inner p-3">
            <div class="carousel-item active ">
              <div class=" mb-2 mx-5 py-4 rounded d-inline-block "> <i> <img src="img/client-logo1.png" class="d-inline-block p-3" width="200rem" height="310rem" alt="not found"></i></div>
              <div class=" mb-2 mx-5 py-4 rounded d-inline-block "> <i> <img src="img/client-logo2.png" class="d-inline-block p-3" width="200rem" height="310rem" alt="not found"></i></div>
              <div class=" mb-2 mx-5 py-4 rounded d-inline-block  "> <i><img src="img/client-logo3.png" class="d-inline-block p-3" width="200rem" height="310rem" alt="not found"></i></div>
              <div class=" mb-2 mx-5 py-4 rounded d-inline-block "> <i><img src="img/client-logo4.png" class="d-inline-block  p-3" width="200rem" height="310rem" alt="not found"></i></div>
            </div>
            <div class="carousel-item">
              <div class=" mb-2 mx-5 py-4 rounded d-inline-block"><img src="img/client-logo3.png" class="d-inline-block p-3" width="200rem" height="310rem" alt="not found"></div>
              <div class="mb-2 mx-5 py-4 rounded d-inline-block"><img src="img/client-logo2.png" class="d-inline-block  p-3" width="200rem" height="310rem" alt="not found"></div>
              <div class="mb-2 mx-5 py-4 rounded d-inline-block "><img src="img/client-logo1.png" class="d-inline-block p-3" width="200rem" height="310rem" alt="not found"></div>
              <div class="mb-2 mx-5 py-4 rounded d-inline-block "><img src="img/client-logo4.png" class="d-inline-block p-3" width="200rem" height="310rem" alt="not found"></div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <!-- contact -->
  <section class="pt-3" id="contact" style="background-color: #ffffff ;">
    <div class="text-center" data-aos="zoom-in">
      <h2 class="font-bold text-4xl section-heading text-uppercase mt-5 mb-3 text-boni">للتواصل معانـا</h2>
      <h2 class="text-center mb-1 me-2 text-ramadi">يسرنا ويسعدنا تواصلك واستقبـال رسائـلك</h2>
    </div>
    <div class="row " id="contatti">
      <div class="container mt-5">
        <div class="row" style="height:190px;" data-aos="zoom-in-right">
          <div class="col-md-6 maps ">
            <iframe class="rounded " src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14858.65854069591!2d39.71574629999999!3d21.4031057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c219f3a4451fef%3A0xdcdd5e12e717d948!2z2KPYsdi02LI!5e0!3m2!1sar!2ssa!4v1689185784981!5m2!1sar!2ssa" height="400" style="border:0" allowfullscreen></iframe>
            <div class="list-unstyled pb-4 mb-3 text-center font-light text-boni">
              <a href="https://www.google.com/maps/place/21%C2%B024'11.9%22N+39%C2%B042'55.1%22E/@21.4033161,39.7131082,17z/data=!3m1!4b1!4m4!3m3!8m2!3d21.4033161!4d39.7152969?hl=en-SA&entry=ttu" target="_blank">
                <p class="text-ramadi font-light">المملكة العربية السعودية، مكة المكرمة، الزايدي</p>
              </a>
              <a href="mailto:Admin@rakaya.co">
                <p class="text-ramadi font-light">Admin@rakaya.co</p>
              </a>
            </div>
          </div>
          <div class="col col-md-6 text-center align-items-center" data-aos="zoom-in-left">
            <div class="row text-boni px-5 pb-5 items-center justify-between">
              <form action="include/insert.php" method="POST" id="submit_form" class="space-y-4">
                <input type="text" name="name" id="name" class="form-control rounded-3 border-pigi text-end " placeholder="الاسم">
                <input type="text" name="email" id="email" class="form-control rounded-3 border-pigi text-end  " placeholder="البريد الالكتروني">
                <input type="text" name="subject" id="subject" class="form-control rounded-3 border-pigi text-end " placeholder="عنوان الرسالة">
                <textarea name="message" id="message" class="form-control rounded-3 border-pigi text-end" rows="5" placeholder="اكتب رسالتك هنا  "></textarea>
                <center> <button type="button" name="submit" id="submit" class="btn bg-pigi rounded px-3 py-2 hover:bg-boni text-light">ارسال</button>
                </center>
                <span id="error_message" class="text-danger"></span>
                <span id="success_message" class="text-success"></span>
                <div data-aos="fade-up" data-aos-duration="3000">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="bg-pigi">
    <div class="container mx-auto flex flex-col flex-col-reverse md:flex-row items-center justify-between p-5">
      <div class="flex flex-col justify-between items-center">
        <button class="btn bg-boni rounded px-5 py-2 mt-2 hover:bg-ramadi text-light" type="submit">اطلب الآن</button>
      </div>
      <div class="flex flex-col justify-between">
        <h1 class="font-bold text-4xl text-light text-right mb-1">إطلب الاستشارة </h1>
        <h2 class="font-light text-ramadi text-right mb-2">لإستشارة قيمة قد تكون النقلة النوعية لعملك التجاري</h2>
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
      ركايا | جميع الحقوق محفوظة |
      &copy; 2023
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#submit').click(function() {
        var name = $('#name').val();
        var message = $('#message').val(); 
        var subject = $('#subject').val();
        var email = $('#email').val();
        if (name == '' || message == '' || email == ''|| subject == '') {
          $('#error_message').html("الرجاء التأكد من تعبئة البيانات ");
        } else {
          $('#error_message').html('');
          $.ajax({
            url: "include/insert.php",
            method: "POST",
            data: {
              name: name,
              email: email,
              message: message,
              subject: subject
            },
            success: function(data) {
              $("form").trigger("reset");
              $('#success_message').fadeIn().html(data);
              setTimeout(function() {
                $('#success_message').fadeOut("Slow");
              }, 2000);
            }
          });
        }
      });
    });
  </script>
</body>

</html>