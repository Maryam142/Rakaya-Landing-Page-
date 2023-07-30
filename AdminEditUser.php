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


/////Edit a User using php//////////////////////////////////////////////////////////////////////////
    $Fname	= "";
    $Lname	= "";
    $email= "";
    $phone= "";
    $password= "";
    $gender= "";
    $userType= "";

    $edit_id = "";
    $EnewEmail = "";
    $EnewFname = "";
    $EnewLname = "";
    $EnewGender = "";
    $EnewPass = "";
    $newUserTyper = "";
    $EnewPhone = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
     if(!isset($_GET['EditId'])){
        header("location:Admin.php");
        exit;
     }else{
        



        if(isset($_POST['EditUser'])){
        $EnewEmail=$_POST['EEmail'];
        $EnewFname=$_POST['EFname'];
        $EnewLname=$_POST['ELname'];
        $EnewGender=$_POST['EGender'];
        $EnewPass=$_POST['EPass'];
        $EnewUserTyper=$_POST['EUserTyper'];
        $EnewPhone=$_POST['EPhone'];

    // Server-side validation///////////////////////////////////////////////////////

    //if there is no error:
        $query = "UPDATE `users` SET `Email` = '$EnewEmail ',`Fname`='$EnewFname', `Lname` = '$EnewLname', `Phone` = '$EnewPhone', `Gender` = '$EnewGender', `pass`= '$EnewPass', `UserType` = '$EnewUserTyper'  WHERE `users`.`id` = '$edit_id'";
        $resultofediting = mysqli_query($conn, $query);
        if ($resultofediting) {
        $ConfirmeditMsg = "تم تحديث البيانات بنجاح ";
        } else {
        $ConfirmeditMsg = "لم يتم تحديث البيانات في قاعدة البيانات  ";
        }
    }
   
 }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Edit a User</title>
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
<div class="container rounded bg-white mb-5 py-5 " style="margin-top: -100px;">
    <!-- Insertion a new user -->
    <div>
        <h5 class="text-3xl text-center mt-1 my-3">تعديل بيانات المستخدم</h5>
    </div>
    <form action="AdminEditUser.php" method="POST" class="flex flex-col pe-1 space-y-2 mx-5 text-end">
        <input hidden name="edit_id" value="<?php echo $edit_id;?>">
        <input class="border rounded py-1 mx-0 text-end" type="text" name="EEmail" placeholder="البريد الالكتروني" value="<?php echo $email;?>">
        <input class="border rounded py-1 mx-0 text-end" type="text" name="EFname" placeholder="الاسم الاول  " value="<?php echo $Fname;?>">
        <input class="border rounded py-1 mx-0 text-end" type="text" name="ELname" placeholder="الاسم الثاني  " value="<?php echo $Lname;?>">
        <input class="border rounded py-1 mx-0 text-end" type="text" name="EPhone" placeholder="رقم الهاتف  " value="<?php echo $phone;?>">
        <input class="border rounded py-1 mx-0 text-end" type="text" name="EPass" placeholder="كلمة المرور  " value="<?php echo $password;?>">
        <input class="border rounded py-1 mx-0 text-end" type="text" name="EUsertype" placeholder="نوع المستخدم  " value="<?php echo $userType;?>">
        <input class="border rounded py-1 mx-0 text-end" type="text" name="EGender" placeholder="الجنس  " value="<?php echo $gender;?>">
        <div> <button type="submit" name="EditUser" style="background-color: #C4AE7C;" class="btn bg-pigi w-full px-4 py-2 hover:bg-cohly text-center text-light">تعديل</button></div>
    </form>
  </div>
    </section>

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
