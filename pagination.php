<?php
include('./DB_conn.php');

session_start();
if (!isset($_SESSION['logged_in'])) {
    header('location: logIn.php');
    die();
}


$record_per_page = 5;
$page='';
$output='';

if(isset($_POST["page"])){
    $page = $_POST["page"];
}else{
    $page = 1;
}
$start_from = ($page -1)*$record_per_page;
$query= "SELECT * FROM users LIMIT  $start_from , $record_per_page";
$result = mysqli_query($conn, $query);
$output.="
<table class='table table-bordered text-center flex>
<tr class=' bg-pigi text-white'>
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
";
while ($row = mysqli_fetch_assoc($result)) {
$output.="
<tr> 
<form action='Admin.php' method='POST'> 
 <td>" . $row['id'] . "</td>
 <td>  <input  type='text' name='EnewEmail' placeholder=". $row['Email'] ."></td>
 <td>  <input  type='text' name='EnewFname'maxlength='5' placeholder=". $row['Fname'] . "></td>
 <td>  <input  type='text' name='EnewPhone' placeholder=". $row['Phone'] ."></td>
 <td>  <input  type='text' name='EnewPass' placeholder=". $row['pass'] ."></td>
 <td>  <input  type='text' name='EnewUserTyper' placeholder=". $row['UserType'] ."></td>
 <td>  <input  type='text' name='EnewGender' placeholder=". $row['Gender'] ."></td>
 <td><a href='AdminEditUser.php?EditId=". $row['id'] ."' class='btn bg-pigi py-1 px-2 rounded text-white'> <i class='bi bi-pencil-square'></i></a></td>
<td><a href='Admin.php?deleteid=". $row['id'] ."' class='btn bg-danger py-1 px-2 rounded text-white'> <i class='bi bi-trash3-fill'></i></a></td>
</form>
</tr>
";
}
$output.='</table> <br /> <div align="center">';
$page_query= "SELECT * FROM users";
$page_result = mysqli_query($conn, $page_query);
$total_records= mysqli_num_rows($page_result);
$total_pages = ceil($total_records/$record_per_page);

for($i=1; $i<=$total_pages; $i++){
 $output.="
   <span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id'".$i."'>".$i."</span>";   
}

echo $output;
?>