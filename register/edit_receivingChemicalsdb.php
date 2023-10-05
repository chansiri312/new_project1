<?php 

print_r($_POST);
include('server.php');
session_start();



 
//สร้างตัวแปร
$id = $_POST['id'];
$date = $_POST['date'];
$name_medical = $_POST['name_medical'];
$name_chemical =  $_POST['name_chemical'];
$buy_medical =  $_POST['buy_medical'];
$use_medical = $_POST['use_medical'];
$buy_chemical = $_POST['buy_chemical'];
$use_chemical = $_POST['use_chemical'];
$note =  $_POST['note'];


 
//แก้ไขข้อมูล
 $sql = " UPDATE receivingchemicals SET date = '$date' , name_medical = '$name_medical', name_chemical = '$name_chemical', buy_medical = '$buy_medical'
 , use_medical = '$use_medical', buy_chemical ='$buy_chemical', use_chemical = '$use_chemical' , note ='$note'
   WHERE id = '$id' ";
 $result = mysqli_query($conn, $sql);
 
 

//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
echo "<script type='text/javascript'>";
echo"alert('edit Success');";
echo"window.location = 'data_receivingChemicals.php'; ";
echo "</script>";
}
else {
//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
echo "<script type='text/javascript'>";
echo "alert('error!');";
echo"window.location = 'errors.php'; ";
echo"</script>";
}
