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
</head>

<body>
    <div class="p-3 mb-2 bg-success text-white">
        <h3 align="center">เพิ่มข้อมูลพันธุ์แพะนม</h3>
        <div style="background-color: rgb(133, 191, 165); width: 100%; height: 100vh;  border-radius: 24px; padding: 20px 18px 30px 18px;" class="mx-auto align-self-center">

            <form action="admin_gengostdb.php" method="post">
                <div class="row">

                    <div class="col-md-6">
                        <label for="gengost" class="form-label">ชื่อพันธุ์แพะ</label>
                        <input type="text" class="form-control" name="gengost" required>
                    </div>
                </div>
   
                <br />
                <div class="input-group">
                    <button type="submid" name="sub_addgengost" class="btn btn-success">บันทึกข้อมูล</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div><br />
            </form>
            <a href="admin_data_gengoat.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
        </div>

    </div>
</body>

</html>