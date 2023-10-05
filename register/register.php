<?php
include('server.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="style.css">
    <style>
        .mindphp {
            visibility: hidden;
        }
    </style>


</head>

<body>
    <div class="header">
        <h2>สมัครผู้ใช้งานระบบ </h2>

    </div>

    <form action="register_db.php" method="post">
        <?php include('errors.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <div class="input-group">
            <label for="username">ชื่อผู้ใช้</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        <div class="input-group">
            <label for="password_1">รหัสผ่าน</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label for="password_2">ยืนยันรหัสผ่าน</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <label for="farmname">ชื่อฟาร์ม</label>
            <input type="text" name="farmname">
        </div>
        <div class="input-group">
            <label for="number_farm">เลขทะเบียนฟาร์ม</label>
            <input type="text" name="number_farm">
        </div>
        <div class="input-group">
            <label for="name">ชื่อเจ้าของฟาร์ม</label>
            <input type="text" name="name">
        </div>
        <div class="input-group">
            <label for="farm_number">ฟาร์มเลขที่</label>
            <input type="text" name="farm_number">
        </div>
        <div class="input-group">
            <label for="rode">ถนน</label>
            <input type="text" name="rode">
        </div>
        <div class="input-group">
            <label for="tumbon">ตำบล</label>
            <input type="text" name="tumbon">
        </div>
        <div class="input-group">
            <label for="district">อำเภอ</label>
            <input type="text" name="district">
        </div>
        <div class="input-group">
            <label for="province">จังหวัด</label>
            <input type="text" name="province">
        </div>
        <div class="col-md-6" >
            <label for="style" class="form-label">ลักษณะการเลี้ยง</label>
            <select name="style" class="form-select">

                <option>แบบขังคอก</option>
                <option>แบบปล่อย</option>

            </select>
        </div>
        <div class="mindphp" >
        <label for="userlevel">สถานะผู้ใช้</label>
            <input type="text" name="userlevel" value="M">

               
               

            </select>
        </div>


        <div class="input-group">
            <button type="submid" name="reg_user" class="btn">สมัคร</button>
        </div>
        <p>คุณเป็นสมาชิคแล้วใช่มั้ย ? <a href="login.php">เข้าสู่ระบบ</a></p>

    </form>



</body>

</html>