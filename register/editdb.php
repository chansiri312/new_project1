<?php 

print_r($_POST);
include('server.php');
session_start();



 
//สร้างตัวแปร

$GoatNumber =  $_POST['GoatNumber'];
$Gender =  $_POST['Gender'];
$MilkGoatBreed = $_POST['MilkGoatBreed'];
$birthday = $_POST['birthday'];
$Weight = $_POST['Weight'];
$Father = $_POST['Father'];
$Mother =  $_POST['Mother'];
$birthday_milk =  $_POST['birthday_milk'];
$Weight_milk = $_POST['Weight_milk'];
$Note =  $_POST['Note'];
$con_name = $_POST['con_name'];
$id = $_POST['id'];

 
//แก้ไขข้อมูล
 $sql = "UPDATE datamanagement SET number = '$GoatNumber', gender = '$Gender',breed = '$MilkGoatBreed',birthday='$birthday', weight='$Weight', 
   father ='$Father',mother ='$Mother',birthday_milk ='$birthday_milk',weight_milk ='$Weight_milk',note ='$Note' 
   WHERE id = '$id' ";
 $result = mysqli_query($conn, $sql);
 
 

//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
echo "<script type='text/javascript'>";
echo"alert('edit Success');";
echo"window.location = 'data_Management.php'; ";
echo "</script>";
}
else {
//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
echo "<script type='text/javascript'>";
echo "alert('error!');";
echo"window.location = 'errors.php'; ";
echo"</script>";
}
