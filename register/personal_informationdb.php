<?php
session_start();
include('server.php');
$errors = array();

    $id = $_POST['id'];
    $farm_name =  $_POST['farm_name'];
    $email =  $_POST['email'];
    $number_farm =  $_POST['number_farm'];
    $name =  $_POST['name'];
    $farm_number =  $_POST['farm_number'];
    $rode = $_POST['rode'];
    $tumbon =  $_POST['tumbon'];
    $district =  $_POST['district'];
    $province =  $_POST['province'];



    $sql = " UPDATE user SET farm_name = '$farm_name' , email = '$email', number_farm = '$number_farm', name = '$name'
 , farm_number = '$farm_number', rode ='$rode', tumbon = '$tumbon' , district ='$district', province ='$province'
   WHERE id = '$id' ";
    $result = mysqli_query($conn, $sql);



    if ($result){
        echo "<script type='text/javascript'>";
        echo"alert('edit Success');";
        echo"window.location = 'personal_information.php'; ";
        echo "</script>";
        }
        else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
        echo "<script type='text/javascript'>";
        echo "alert('error!');";
        echo"window.location = 'errors.php'; ";
        echo"</script>";
        }
    
