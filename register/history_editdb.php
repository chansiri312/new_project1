<?php 

print_r($_POST);
include('server.php');
session_start();



 
//สร้างตัวแปร

$id =  $_POST['id'];
$number =  $_POST['number'];
$num_milk = $_POST['num_milk'];
$num_date_history = $_POST['num_date_history'];
$milk = $_POST['milk'];
$note = $_POST['note'];
$con_name =  $_POST['con_name'];

 
//แก้ไขข้อมูล
 $sql = " UPDATE historydata SET number = '$number', num_milk = '$num_milk', num_date_history = '$num_date_history', milk='$milk', note='$note'
   WHERE id = '$id' ";
 $result = mysqli_query($conn, $sql);
 
 

//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
echo "<script type='text/javascript'>";
echo"alert('edit Success');";
echo"window.location = 'data_historyData.php'; ";
echo "</script>";
}
else {
//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
echo "<script type='text/javascript'>";
echo "alert('error!');";
echo"window.location = 'errors.php'; ";
echo"</script>";
}
