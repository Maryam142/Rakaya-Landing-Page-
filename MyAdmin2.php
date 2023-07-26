<?php include('./DB_conn.php');

session_start();
if (!isset($_SESSION['logged_in'])) {
  header('location: logIn.php');
  die();
}
//
$user_email = $_SESSION['user_email'];




$fetchquery = "SELECT * FROM users limit 0,5 ";
$result = mysqli_query($conn, $fetchquery);
$row = mysqli_fetch_assoc($result);



?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="description"
    content="Landing page of Rakaya management consulting company, A company that provides management consulting companies to develop and present them and provide smart technical solutions to overcome administrative and technical problems and achieve their goals successfully. It also provides commercial and commercial digital services.">
  <!--Tab Tilte and Icon-->
  <title>Rakaya</title>
  <link href="img/minilogo.png" rel="icon">
  <!-- animate -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="libraris\animate.css\animate.min.css" rel="stylesheet">
  <!--icon -->
  <link
    href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;900;1000&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1500;1,600&display=swap"
    rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- font -->
 <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin> 
  <link
    href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Cairo:wght@700;800;900;1000&display=swap"
    rel="stylesheet">
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <link href="css\style.css" rel="stylesheet">
</head>

<body>


<table class="table">
<thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
    </tr>
    <tr>
        <?php
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
            <td> " . $row["id"] . "</td>
            <td> " . $row["Fname"] . "</td>
            <td> " . $row["Lname"] . "</td>
            <td> " . $row["Email"] . "</td>
            <td> " . $row["Phone"] . "</td>
            <td>
               <a href='update'>Update</a>
               <a href='delete'>Delete</a>
            </td>"; 
        }


        ?>
    </tr>
</thead>
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>

</body>
</html>