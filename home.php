<?php 
session_start();

if(isset($_SESSION['email']) && isset($_SESSION['password'])){
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello <?php echo $_SESSION['Fname'];?></h1>
    <a href="index.php">logout</a>
</body>
</html>


<?php
}else{
    header("Location:index.php");
    exit();
}



?>
