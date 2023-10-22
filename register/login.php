<?php
include('server.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="style.css">
    <style>
        form {
            width: 30%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #b8c4de;
            background: white;
            border-radius: 0px 0px 10px 10px;
        }
    </style>

</head>

<body>
    <br /><br /><br /><br />
    <div class="header">
        <h2>เว็บแอปพลิเคชันสำหรับมาตรฐานฟาร์มแพะนม</h2>

    </div>

    <form action="login_db.php" method="post">
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
            <label for="username">ผู้ใช้ระบบ</label>
            <input type="text" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">รหัสผ่าน</label>
            <input type="password" name="password">
        </div>

        <div class="input-group">
            <button type="submid" name="login_user" class="btn">เข้าสู่ระบบ</button>
        </div>
        <p>สมัครงานใช้เว็บได้ที่นี่ >> <a href="register.php">สมัครผู้ใช้งาน</a></p>

    </form>



</body>

</html>