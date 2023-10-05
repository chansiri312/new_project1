<?php

print_r($_POST);
include('server.php');
session_start();




//สร้างตัวแปร
$id = $_POST['id'];
$gen= $_POST['gen'];
$name = $_POST['name'];
$old = $_POST['old'];
$educational = $_POST['educational'];
$date_job = $_POST['date_job'];
$name_train = $_POST['name_train'];
$date_train = $_POST['date_train'];
$time_train = $_POST['time_train'];
$location_train = $_POST['location_train'];
$assessor = $_POST['assessor'];



//แก้ไขข้อมูล
$sql = "UPDATE workman SET gen = '$gen', name = '$name', old = '$old', educational = '$educational',
  date_job ='$date_job', name_train ='$name_train', date_train ='$date_train', time_train ='$time_train', 
  location_train ='$location_train', assessor ='$assessor'
   WHERE id = '$id' ";
$result = mysqli_query($conn, $sql);



//ถ้าสำเร็จให้ขึ้นอะไร
if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('edit Success');";
    echo "window.location = 'data_workman.php'; ";
    echo "</script>";
} else {
    //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
    echo "<script type='text/javascript'>";
    echo "alert('error!');";
    echo "window.location = 'errors.php'; ";
    echo "</script>";
}
