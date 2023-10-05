<?php

print_r($_POST);
include('server.php');
session_start();




//สร้างตัวแปร
$id = $_POST['id'];
$date = $_POST['date'];
$stall = $_POST['stall'];
$name_vaccine = $_POST['name_vaccine'];
$num_goat = $_POST['num_goat'];
$name_mediacal = $_POST['name_mediacal'];
$num_gost1 = $_POST['num_gost1'];
$examination = $_POST['examination'];
$operator = $_POST['operator'];
$controller = $_POST['controller'];



//แก้ไขข้อมูล
$sql = "UPDATE vaccine SET date = '$date', stall = '$stall', name_vaccine = '$name_vaccine', num_goat = '$num_goat',
  name_mediacal ='$name_mediacal', num_gost1 ='$num_gost1', examination ='$examination ', operator ='$operator', 
  controller ='$controller'
   WHERE id = '$id' ";
$result = mysqli_query($conn, $sql);



//ถ้าสำเร็จให้ขึ้นอะไร
if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('edit Success');";
    echo "window.location = 'data_vaccine.php'; ";
    echo "</script>";
} else {
    //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
    echo "<script type='text/javascript'>";
    echo "alert('error!');";
    echo "window.location = 'errors.php'; ";
    echo "</script>";
}
