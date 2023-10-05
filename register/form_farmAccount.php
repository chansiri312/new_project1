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
    <title>แบบบันทึกข้อมูลบัญชีฟาร์ม</title>
    <style>
        .mindphp {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <div class="p-3 mb-2 bg-success text-white">
        <h3 align="center">แบบบันทึกข้อมูลบัญชีฟาร์ม</h3>
        <div style="background-color: rgb(133, 191, 165); width: 100%; height: 90vh;  border-radius: 24px; padding: 20px 18px 30px 18px;" class="mx-auto align-self-center">
            <form class="row g-3" action="farmAccountdb.php" method="post">

                <div class="col-md-6">
                    <label for="birthday">วัน/เดือน/ปี(เกิด)</label><br />
                    <input type="date" class="form-control" name="birthday">
                </div>

                <div class="col-md-6">
                    <label for="Entrances" class="form-label">ข้อมูลจำนวนเข้า</label>
                    <input type="number" class="form-control" name="Entrances" />
                </div>

                <div class="col-md-6">
                    <label for="Exits" class="form-label">ข้อมูลจำนวนออก</label>
                    <input type="number" class="form-control" name="Exits" />
                </div>

                <div class="col-md-6">
                    <label for="Loss" class="form-label">ข้อมูลจำนวนการสูญเสีย</label>
                    <input type="number" class="form-control" name="Loss" />
                </div>

                <div class="col-md-6">
                    <label for="Happen" class="form-label">ข้อมูลจำนวนแพะไม่ให้นม</label>
                    <input type="number" class="form-control" name="Happen" />
                </div>

                <div class="col-md-6">
                    <label for="Milking" class="form-label">ข้อมูลจำนวนแม่แพะให้นม</label>
                    <input type="number" class="form-control" name="Milking" />
                </div>

                <div class="col-md-6">
                    <label for="Sick" class="form-label">ข้อมูลจำนวนป่วย</label>
                    <input type="number" class="form-control" name="Sick" />
                </div>

                <div class="mindphp">
                    <label for="con_name" class="form-label">ลงชื่อเจ้าของฟาร์ม</label>
                    <select name="con_name" class="form-select">
                        <option><?php echo $_SESSION['username']; ?></option>

                    </select>
                </div><br />

                <div class="input-group">
                    <button type="submid" name="sub_farmaccount" class="btn btn-success">บันทึกข้อมูล</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="reset" class="btn btn-warning">Reset</button>

                </div>

            </form><br />
            <a href="data_farmAccount.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
        </div>
    </div>

</body>

</html>