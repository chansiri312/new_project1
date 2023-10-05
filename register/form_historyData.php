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
    <title>แบบบันทึกข้อมูลประวัติการให้ผลผลิต(รายฟาร์ม)</title>
    <style>
        .mindphp {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <div class="p-3 mb-2 bg-success text-white">
        <h3 align="center">แบบบันทึกข้อมูลประวัติการให้ผลผลิต(รายฟาร์ม)</h3>
        <div style="background-color: rgb(133, 191, 165); width: 100%; height: 90vh;  border-radius: 24px; padding: 20px 18px 30px 18px;" class="mx-auto align-self-center">
            <form action="historyDatadb.php" method="post">

                <div class="row">
                    <div class="col-md-6">
                        <label for="number" class="form-label">หมายเลขประจำตัว</label>
                        <input type="number" class="form-control" name="number" />
                    </div>


                    <div class="col-md-6">
                        <label for="num_milk" class="form-label">ครั้งที่ชองการให้นม</label>
                        <input type="number" class="form-control" name="num_milk" />
                    </div>
                </div>
                <div class="row">


                    <div class="col-md-6">
                        <label for="num_date_history" class="form-label">จำนวนวันให้ผลผลิต(วัน)</label>
                        <input type="number" class="form-control" name="num_date_history" />
                    </div>

                    <div class="col-md-6">
                        <label for="milk" class="form-label">ปริมาณน้ำนม(Kg)</label>
                        <input type="number" class="form-control" name="milk" />
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="note" class="form-label">หมายเหตุ</label>
                        <input type="number" class="form-control" name="note" />
                    </div>
                </div>

                <div class="mindphp">
                    <label for="con_name" class="form-label">ลงชื่อเจ้าของฟาร์ม</label>
                    <select name="con_name" class="form-select">
                        <option><?php echo $_SESSION['username']; ?></option>
                    </select>
                </div><br />

                <div class="input-group">
                    <button type="submid" name="sub_his" class="btn btn-success">บันทึกข้อมูล</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="reset" class="btn btn-warning">Reset</button>

                </div><br />

            </form>
            <a href="data_historyData.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
        </div>
    </div>

</body>

</html>