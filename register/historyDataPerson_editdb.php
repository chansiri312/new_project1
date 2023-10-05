<?php 

print_r($_POST);
include('server.php');
session_start();



 
//สร้างตัวแปร

$id =  $_POST['id'];
$date = $_POST['date'];
$number =  $_POST['number'];
$milk_morning = $_POST['milk_morning'];
$milk_evening = $_POST['milk_evening'];
$note = $_POST['note'];

 
//แก้ไขข้อมูล
 $sql = " UPDATE historydataperson SET date = '$date', number = '$number', milk_morning = '$milk_morning', milk_evening = '$milk_evening',
  tatal_milk='$milk_morning'+'$milk_evening', note='$note'
   WHERE id = '$id' ";
 $result = mysqli_query($conn, $sql);
 
 

//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
echo "<script type='text/javascript'>";
echo"alert('edit Success');";
echo"window.location = 'data_historyDataPerson.php'; ";
echo "</script>";
}
else {
//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
echo "<script type='text/javascript'>";
echo "alert('error!');";
echo"window.location = 'errors.php'; ";
echo"</script>";
}
