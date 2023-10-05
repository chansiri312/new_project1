<?php 

print_r($_POST);
include('server.php');
session_start();



 
//สร้างตัวแปร
$id = $_POST['id'];
$date = $_POST['date'];
$name_dad =  $_POST['name_dad'];
$old =  $_POST['old'];
$birthdate = $_POST['birthdate'];
$birthchild = $_POST['birthchild'];
$birthday = $_POST['birthday'];
$number = $_POST['number'];
$gender =  $_POST['gender'];
$note =  $_POST['note'];


 
//แก้ไขข้อมูล
 $sql = " UPDATE maternalreproduction SET date = '$date', name_dad = '$name_dad', old = '$old', birthdate= '$birthdate',
  birthchild ='$birthchild', birthday ='$birthday', number ='$number', gender ='$gender', note ='$note'
   WHERE id = '$id' ";
 $result = mysqli_query($conn, $sql);
 
 

//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
echo "<script type='text/javascript'>";
echo"alert('edit Success');";
echo"window.location = 'data_maternalReproduction.php'; ";
echo "</script>";
}
else {
//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
echo "<script type='text/javascript'>";
echo "alert('error!');";
echo"window.location = 'errors.php'; ";
echo"</script>";
}
