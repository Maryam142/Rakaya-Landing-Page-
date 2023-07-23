<?php 

session_start();
if(!isset($_SESSION['logged_in'])){
    header('location: logIn.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rakaya Home</title>
</head>
<body>
    <h1>Hello  </h1>
   
   
    <a href="logout.php">logout</a>
</body>
</html>


<
