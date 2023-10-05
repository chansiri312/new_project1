<?php

print_r($_POST);
include('server.php');
session_start();




//สร้างตัวแปร
$id = $_POST['id'];
$date = $_POST['date'];
$number = $_POST['number'];
$health = $_POST['health'];
$gender = $_POST['gender'];
$treatment = $_POST['treatment'];
$treat = $_POST['treat'];
$note = $_POST['note'];



//แก้ไขข้อมูล
$sql = "UPDATE treatment SET date = '$date', number = '$number', health = '$health', gender = '$gender',
  treatment ='$treatment', treat ='$treat', note ='$note'
   WHERE id = '$id' ";
$result = mysqli_query($conn, $sql);



//ถ้าสำเร็จให้ขึ้นอะไร
if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('edit Success');";
    echo "window.location = 'data_treatment.php'; ";
    echo "</script>";
} else {
    //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
    echo "<script type='text/javascript'>";
    echo "alert('error!');";
    echo "window.location = 'errors.php'; ";
    echo "</script>";
}
