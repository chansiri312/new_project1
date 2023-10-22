<?php
include('server.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>แบบบันทึกข้อมูลทะเบียนประวัติแพะนม</title>
    <style>
        .mindphp {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <div class="p-3 mb-2 bg-success text-white">
        <h3 align="center">เพิ่มข้อมูล</h3>
        <div style="background-color: rgb(133, 191, 165); width: 100%; height: 100vh;  border-radius: 24px; padding: 20px 18px 30px 18px;" class="mx-auto align-self-center">

            <form action="admin_adddb.php" method="post">
                <div class="row">

                    <div class="col-md-6">
                        <label for="username" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password1" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" name="password1" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password2" class="form-label">ยืนยันรหัสผ่าน</label>
                        <input type="password" class="form-control" name="password2" required>
                    </div>

                    <div class="col-md-6">
                        <label for="name" class="form-label">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mindphp">
                        <label for="userlevel" class="form-label">สถานะ</label>
                        <select name="userlevel" class="form-select" >
                            <option> M </option>
                        </select>
                    </div>
                </div>
   
                <br />
                <div class="input-group">
                    <button type="submid" name="sub_add" class="btn btn-success">บันทึกข้อมูล</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div><br />
            </form>
            <a href="admin_data_user.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
        </div>

    </div>
</body>

</html>