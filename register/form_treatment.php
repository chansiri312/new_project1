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
    <title>แบบบันทึกข้อมูลการรักษาโรค</title>
    <style>
        .mindphp {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <div class="p-3 mb-2 bg-success text-white">
        <h3 align="center">แบบบันทึกข้อมูลการรักษาโรค</h3>
        <div style="background-color: rgb(133, 191, 165); width: 100%; height: 100vh;  border-radius: 24px; padding: 20px 18px 30px 18px;" class="mx-auto align-self-center">
            <form action="treatmentdb.php" method="post">
                <div class="row">

                    <div class="col-md-6">
                        <label for="date">ข้อมูลวัน/เดือน/ปี</label><br />
                        <input type="date" class="form-control" id="birthday" name="date">
                    </div>

                    <div class="col-md-6">
                        <label for="number" class="form-label">ข้อมูลหมายเลขประจำตัว</label>
                        <input type="text" class="form-control" name="number" />
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="health" class="form-label">ข้อมูลข้อมูลสุขภาพ</label>
                        <input type="text" class="form-control" name="health" />
                    </div>

                    <div class="col-md-6">
                        <label for="gender" class="form-label">เพศ</label>
                        <select name="gender" class="form-select">
                            <option selected>เลือกเพศ</option>
                            <option>เพศผู้</option>
                            <option>เพศเมีย</option>
                        </select>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="treatment" class="form-label">ข้อมูลการรักษาและผลการรักษา</label>
                        <input type="text" class="form-control" name="treatment" />
                    </div>

                    <div class="col-md-6">
                        <label for="treat" class="form-label">ชื่อผู้รักษา</label>
                        <input type="text" class="form-control" name="treat" />
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="note" class="form-label">หมายเหตุ</label>
                        <input type="text" class="form-control" name="note" />
                    </div>
                </div>

                <div class="mindphp">
                    <label for="con_name" class="form-label">ลงชื่อเจ้าของฟาร์ม</label>
                    <select name="con_name" class="form-select">
                        <option><?php echo $_SESSION['username']; ?></option>
                    </select>
                </div><br />

                <div class="input-group">
                    <button type="submid" name="sub_treat" class="btn btn-success">บันทึกข้อมูล</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="reset" class="btn btn-warning">Reset</button>

                </div>
                <br />

            </form>
            <a href="data_treatment.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
        </div>
    </div>

</body>

</html>