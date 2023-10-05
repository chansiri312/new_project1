<?php 

print_r($_POST);
include('server.php');
session_start();



 
//สร้างตัวแปร

$id =  $_POST['id'];
$birthday =  $_POST['birthday'];
$Entrances = $_POST['Entrances'];
$Exits = $_POST['Exits'];
$Loss = $_POST['Loss'];
$Happen = $_POST['Happen'];
$Milking =  $_POST['Milking'];
$Sick =  $_POST['Sick'];
$con_name =  $_POST['con_name'];

 
//แก้ไขข้อมูล
 $sql = " UPDATE farmaccount SET birthday = '$birthday', entrances = '$Entrances',exits = '$Exits',loss='$Loss', happen='$Happen', 
   milking ='$Milking',sick ='$Sick',total ='$Entrances'+'$Exits'+'$Loss'+'$Happen'+'$Milking'+'$Sick' 
   WHERE id = '$id' ";
 $result = mysqli_query($conn, $sql);
 
 

//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
echo "<script type='text/javascript'>";
echo"alert('edit Success');";
echo"window.location = 'data_farmAccount.php'; ";
echo "</script>";
}
else {
//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
echo "<script type='text/javascript'>";
echo "alert('error!');";
echo"window.location = 'errors.php'; ";
echo"</script>";
}
