<?php
include('./DB_conn.php');

session_start();
if (!isset($_SESSION['logged_in'])) {
    header('location: logIn.php');
    die();
}

////retrive Admin Info only///////////////////////////////////////////////////////////
$admin_email = $_SESSION['user_email'];
$fetchquery = "SELECT * FROM users WHERE Email ='$admin_email'";
//return one row of admin info
$AdminResult = mysqli_query($conn, $fetchquery);
$AdminRow = mysqli_fetch_assoc($AdminResult);
$userID = $AdminRow['id'];
$adminerrors = array();


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


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a new User</title>

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

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
</head>

<body>
    <!-- Navbar -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <div class="container-fluid">
                    <a class="navbar-brand my-3 mt-3" href="index.html">
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
                        <a href="Admin.php">
                            <img src="<?php echo $AdminRow['Image'] ?>" class="rounded-pill h-12" height="40" alt="profile image">
                        </a>
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
        <div class="container rounded bg-white mb-5 py-5 " style="margin-top: -100px;">
            <!-- Insertion a new user -->
            <div>
                <h5 class="text-3xl text-center mt-1 my-3"> اضافة مستخدم جديد</h5>
            </div>
            <form action="AdminAddUser.php" method="POST" class="flex flex-col pe-1 space-y-2 mx-5 text-end">
                <input class="border py-1 mx-0 text-end" type="text" name="newEmail" placeholder="البريد الالكتروني">
                <input class="border py-1 mx-0 text-end" type="text" name="newFname" placeholder="الاسم الاول ">
                <input class="border py-1 mx-0 text-end" type="text" name="newLname" placeholder="الاسم الثاني">
                <input class="border py-1 mx-0 text-end" type="text" name="newPhone" placeholder="رقم الهاتف">
                <input class="border py-1 mx-0 text-end" type="text" name="newPass" placeholder="كلمة المرور">
                <input class="border py-1 mx-0 text-end" type="text" name="newUsertype" placeholder="نوع المستخدم">
                <input class="border py-1 mx-0 text-end" type="text" name="newGender" placeholder="الجنس">
                <div> <button type="submit" name="insertNewUser" class="btn bg-pigi px-4 py-2 hover:bg-cohly text-center text-light" style="background-color: #C4AE7C;">اضافة</button></div>
            </form>

            <?php if (count($INSERTerrors) > 0) : ?>
                <div class="error">
                    <?php foreach ($INSERTerrors as $error) : ?>
                        <p> <?php echo $error; ?> </p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>

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