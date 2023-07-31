<?php
include('./DB_conn.php');

session_start();
if (!isset($_SESSION['logged_in'])) {
    header('location: logIn.php');
    die();
}

if ($_SESSION['edited']) {
    echo "<script> alert('the user account is updated successfully!'); </script>";
    $_SESSION['edited'] = false;
}

////retrive Admin Info only/////////////////////////////////////////////////////////////////////////
$admin_email = $_SESSION['user_email'];
$fetchquery = "SELECT * FROM users WHERE Email ='$admin_email'";
//return one row of admin info
$AdminResult = mysqli_query($conn, $fetchquery);
$AdminRow = mysqli_fetch_assoc($AdminResult);
$userID = $AdminRow['id'];
$adminerrors = array();

////retrive All users Info only/////////////////////////////////////////////////////////////////////
$fetchqueryAll = "SELECT * FROM users";
//return all rows of users' info
$resultall = mysqli_query($conn, $fetchqueryAll);

/////Delete a User using php////////////////////////////////////////////////////////////////////////
if (isset($_GET['deleteid'])) {

    $id = $_GET['deleteid'];
    $Dquery = "DELETE FROM `users` WHERE `users`.`id` = '$id'";
    $delete = mysqli_query($conn, $Dquery);

    if ($delete) {
        echo "<script> alert('delete the user account successfully!'); </script>";
    }
}


/////Insert new User////////////////////////////////////////////////////////////////////////////////
$newFname     =  "";
$newLname     =  "";
$newPass      =  "";
$newEmail     =  "";
$newPhone     =  "";
$newGender    =  "";
$newUsertype  =  "";
$INSERTerrors =  "";
$INSERTerrors = array();

if (isset($_POST['insertNewUser'])) {
    $newFname =  filter_var($_POST['newFname'], FILTER_SANITIZE_STRING);
    $newLname  =  filter_var($_POST['newLname'],  FILTER_SANITIZE_STRING);
    $newPass  =  filter_var($_POST['newPass'],  FILTER_SANITIZE_STRING);
    $newEmail     =  filter_var($_POST['newEmail'],     FILTER_SANITIZE_EMAIL);
    $newPhone     =  filter_var($_POST['newPhone'],     FILTER_SANITIZE_STRING);
    $newGender    =  $_POST['newGender'];
    $newUsertype  =  $_POST['newUsertype'];

    // Server-side validation///////////////////////////////////////////////////////
    // validate first and last name///////////////////////////
    if (empty($newFname)) {
        array_push($INSERTerrors, " يجب كتابة الاسم الاول");
    } elseif (strlen($newFname) > 100) {
        array_push($INSERTerrors, "يجب ان لايكون الاسم اكبر من 100 حرف ");
    }

    if (empty($newLname)) {
        array_push($INSERTerrors, " يجب كتابة الاسم الاخير");
    } elseif (strlen($newLname) > 100) {
        array_push($INSERTerrors, " يجب ان لايكون الاسم اكبر من 100 حرف ");
    }

    // validate email///////////////////////////
    if (empty($newEmail)) {
        array_push($INSERTerrors, "يجب كتابة البريد الالكترونى");
    } elseif (filter_var($newEmail, FILTER_VALIDATE_EMAIL) == false) {
        array_push($INSERTerrors, "البريد الالكترونى غير صالح");
    }

    // validate password////////////////////////////
    if (empty($newPass)) {
        array_push($INSERTerrors, "يجب كتابة  كلمة المرور");
    } elseif (strlen($newPass) < 8) {
        array_push($INSERTerrors, "يجب ان تحتوي كلمة المرور  اكثر  من 8 حرف ");
    }

    $uppercase = preg_match('@[A-Z]@', $newPass);
    $lowercase = preg_match('@[a-z]@', $newPass);
    $number    = preg_match('@[0-9]@', $newPass);

    if (!$uppercase || !$lowercase || !$number  || strlen($newPass) < 6) {
        array_push($INSERTerrors, "يجب ان تتكون كلمة السر على الاقل من 6 ارقام تتضمن حرف كبير وحرف صغير وارقام");
    }

    // validate gender///////////////////////////
    if (empty($newGender)) {
        array_push($INSERTerrors, "يرجى تحديد نوع الجنس");
    }
    // validate userType///////////////////////////
    if (empty($newUsertype)) {
        array_push($INSERTerrors, "يرجى تحديد نوع المستخدم");
    }

    // validate phone///////////////////////////
    if (empty($newPhone)) {
        array_push($INSERTerrors, "يرجى ادخال رقم الجوال");
    }
    if (!(preg_match('/^(\d{3})[- ]?(\d{3})[- ]?(\d{4})$/', $newPhone))) {
        array_push($INSERTerrors, " يرجى ادخال رقم الجوال بشكل صحيح");
    }
    //prevent dublicate emails query/////////////////////////////////////////////////
    $statment = "SELECT email FROM users WHERE email ='$newEmail'";
    $data = mysqli_fetch_row(mysqli_query($conn, $statment));

    if ($data) {
        array_push($INSERTerrors, "هناك حساب مسجل مسبقا بهذا البريد الالكتروني");
    }



    //if no insert erorrs
    if (count($INSERTerrors) == 0) {
        $sql = "INSERT INTO users ( Email, Fname, Lname, Phone, pass, Gender, UserType,Image) VALUES ('$newEmail ','$newFname','$newLname','$newPhone','$newPass ','$newGender','$newUsertype','')";
        if (mysqli_query($conn, $sql)) {
            echo "<script> alert('a new user is inserted successfully!')</script>";
        }
    }
}


///// Pagenation////////////////////////////////////////////////////////////////////////////////////
//to move from pages
if (isset($_GET['page'])) {
    //more pages
    $currentPage = $_GET['page'];
} else {
    //page now 
    $currentPage = 1;
}

//pages numbers 
$prevPage = $currentPage - 1;
$nextPage = $currentPage + 1;

//the start page
$perPage = 5;
$start = ($currentPage - 1) * $perPage;

$fetchquery = "SELECT  SQL_CALC_FOUND_ROWS * FROM users limit  $start , $perPage";
$result = mysqli_query($conn, $fetchquery);
$row = mysqli_fetch_assoc($result);


//Conut total db rows 
$connpdo = new PDO("mysql:host=localhost;dbname=rakaya", "root", "");
$sql = "SELECT * FROM users";
$statement = $connpdo->query($sql);
$number_of_rows = $statement->rowCount();
$lastPage = ceil($number_of_rows / $perPage);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Rakaya Admin</title>
    <link href="img/minilogo.png" rel="icon">
    <!-- animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="libraris\animate.css\animate.min.css" rel="stylesheet">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Cairo:wght@200;300;400;500;600;700;900;1000&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
                    <a class="navbar-brand my-3 mt-3" href="index.php">
                        <img src="img/rakaya.png" class="me-lg-2" height="40" class=" active btn-get-started animate_animated animate_fadeInUp" />
                    </a>
                </div>
            </div>
            <nav>
                <ul class="d-flex me-2" style="line-height: 0; align-items: center; justify-content: space-between; padding: 10px 0 10px 30px;">
                    <li class="flex">
                        <a href="logout.php" class="bg-pigi px-2 mx-2 py-3 ms-2 flex rounded animate_animated animate_fadeInUp text-light">
                            تسجيل الخروج</a>
                    </li>
                    <li class="flex ">
                        <img src="<?php echo $AdminRow['Image'] ?>" class="rounded-pill h-12" height="40" alt="profile image">
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
        <div class="container-fluid rounded bg-white mb-5 py-5 " style="margin-top: -100px;">
            <div class=" justify-content-between align-items-center mb-1">
                <h4 class="text-center text-bold text-3xl"> <span class="text-pigi"><?php echo $AdminRow['Fname'] ?> </span> اهلًا ومرحبًا</h4>
            </div>
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                <img class="rounded-circle mt-5" width="150px" src="<?php echo $AdminRow['Image'] ?>" alt="profile image" class="font-weight-bold">

                <?php echo $AdminRow['Fname'], " ", $AdminRow['Lname'] ?></span><span class="text-black-50">
                    <?php echo $AdminRow['Email'] ?></span><span> </span>
            </div>
            <!-- System Msgs -->
            <?php if (count($adminerrors) > 0) : ?>
                <div class="error">
                    <?php foreach ($adminerrors as $error) : ?>
                        <p> <?php echo $error; ?> </p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>

            <?php if (!empty($ConfirmeditMsg)) : ?>
                <div class="systemMsg">
                    <p><?php echo $ConfirmeditMsg ?> </p>
                </div>
            <?php endif ?>
            <div class="container">
                <div class="row mt-5">
                    <div class="col">
                        <div class="card mt-5" style="width: fit-content;">
                            <div class="card-header">
                                <h2 class="display-6 text-center"> بيانات المستخدمين</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered text-center flex">
                                    <tr class=" bg-pigi text-white">
                                        <td>الرقم التعريفي</td>
                                        <td>البريد الالكتروني</td>
                                        <td>الاسم الاول</td>
                                        <!-- <td>الاسم الثاني</td> -->
                                        <td>رقم الهاتف</td>
                                        <td>كلمة المرور</td>
                                        <td> نوع المستخدم</td>
                                        <td> الجنس</td>
                                        <td> تعديل</td>
                                        <td> حذف</td>

                                    </tr>

                                    <?php
                                    $rowsNum = mysqli_num_rows($resultall);
                                    if ($rowsNum > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr> 
                                                <form action='Admin.php' method='POST'> 
                                                    <td>" . $row['id'] . "</td>
                                                    <td>  <input  type='text' name='EnewEmail' placeholder=" . $row['Email'] . "></td>
                                                    <td>  <input  type='text' name='EnewFname'maxlength='5' placeholder=" . $row['Fname'] . "></td>
                                                    <td>  <input  type='text' name='EnewPhone' placeholder=" . $row['Phone'] . "></td>
                                                    <td>  <input  type='text' name='EnewPass' placeholder=" . $row['pass'] . "></td>
                                                    <td>  <input  type='text' name='EnewUserTyper' placeholder=" . $row['UserType'] . "></td>
                                                    <td>  <input  type='text' name='EnewGender' placeholder=" . $row['Gender'] . "></td>
                                                    <td><a href='AdminEditUser.php?EditId=" . $row['id'] . "' class='btn bg-pigi py-1 px-2 rounded text-white'> <i class='bi bi-pencil-square'></i></a></td>
                                                    <td><a href='Admin.php?deleteid=" . $row['id'] . "' class='btn bg-danger py-1 px-2 rounded text-white'> <i class='bi bi-trash3-fill'></i></a></td>
                                                </form>
                                                </tr>";
                                        }
                                    }
                                    ?>
                                </table>
                                <div>
                                    <a href="AdminAddUser.php" class="btn bg-pigi px-4 py-2 hover:bg-cohly text-center text-light" role="button">اضافة مستخدم جديد</a>
                                </div>

                            </div>
                        </div>

                        <!-- Pagenation -->
                        <div class="">
                            <nav class="" aria-label="Page navigation example">
                                <ul class="pagination ">
                                    <li class="page-item">

                                        <?php

                                        if ($currentPage == 1) {

                                            echo '<a class="page-link" style="color: #816D4A" href="#" aria-label="Previous">
                                             <span aria-hidden="true">&laquo;</span>
                                             <span class="sr-only">Previous</span></a>';
                                        } else {

                                            echo '<a class="page-link" style="color: #C4AE7C" href="?page=' . $prevPage . '" aria-label="Previous">
                                                 <span aria-hidden="true">&laquo;</span>
                                                 <span class="sr-only">Previous</span></a>';
                                        }
                                        ?>

                                    </li>
                                    <!-- <li class="page-item" ><a class="page-link" style="color: #C4AE7C" href="#">1</a></li>
                                         <li class="page-item"><a class="page-link" style="color: #C4AE7C" href="#">2</a></li>
                                         <li class="page-item"><a class="page-link" style="color: #C4AE7C" href="#">3</a></li>
                                    <li class="page-item"> -->

                                    <?php
                                    if ($currentPage == $lastPage) {

                                        echo '<a class="page-link" style="color: #816D4A" href="#" aria-label="Next">
                                                  <span aria-hidden="true">&raquo;</span>
                                                  <span class="sr-only">Next</span>
                                                 </a>';
                                    } else {

                                        echo '<a class="page-link" style="color: #C4AE7C" href="?page=' . $nextPage . '" aria-label="Next">
                                                  <span aria-hidden="true">&raquo;</span>
                                                  <span class="sr-only">Next</span>
                                                </a>';
                                    }
                                    ?>

                                    </li>
                                </ul>
                            </nav>
                        </div>
                        </table>
                        <!-- Insertion a new user -->
                        <div>
                            <h5 class="text-3xl text-center mt-1 my-3"> اضافة مستخدم جديد</h5>
                        </div>
                        <form action="Admin.php" method="POST" class="flex flex-row pe-1">
                            <input class="border py-1 mx-0 text-center" type="text" name="newEmail" placeholder="البريد الالكتروني">
                            <input class="border py-1 mx-0 text-center" type="text" name="newFname" placeholder="الاسم الاول ">
                            <input class="border py-1 mx-0 text-center" type="text" name="newLname" placeholder="الاسم الثاني">
                            <input class="border py-1 mx-0 text-center" type="text" name="newPhone" placeholder="رقم الهاتف">
                            <input class="border py-1 mx-0 text-center" type="text" name="newPass" placeholder="كلمة المرور">
                            <input class="border py-1 mx-0 text-center" type="text" name="newUsertype" placeholder="نوع المستخدم">
                            <input class="border py-1 mx-0 text-center" type="text" name="newGender" placeholder="الجنس">
                            <div> <button type="submit" name="insertNewUser" class="btn bg-pigi px-4 py-2 hover:bg-cohly text-center text-light">اضافة</button></div>
                        </form>

                        <?php if (count($INSERTerrors) > 0) : ?>
                            <div class="error">
                                <?php foreach ($INSERTerrors as $error) : ?>
                                    <p> <?php echo $error; ?> </p>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- </div> -->
            <!-- </div> -->
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
            ركايا | جميع الحقوق محفوظة |&copy; 2023
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