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
    <title>แบบบันทึกประวัติบุคลากร</title>
    <style>
        .mindphp {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <div class="p-3 mb-2 bg-success text-white">
        <h3 align="center">แบบบันทึกประวัติบุคลากร</h3>
        <div style="background-color: rgb(133, 191, 165); width: 100%; height:100vh; border-radius: 24px; padding: 20px 18px 30px 18px;" class="mx-auto align-self-center">
            <form action="workmandb.php" method="post">
                <div class="row">

                    <div class="col-md-1">
                        <label for="gen" class="form-label">คำนำหน้าชื่อ</label>
                        <select name="gen" class="form-select">
                            <option>นาย</option>
                            <option>นาง</option>
                            <option>นางสาว</option>
                        </select>
                    </div>

                    <div class="col">
                        <label for="name" class="form-label">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" name="name" />
                    </div>


                    <div class="col-md-2">
                        <label for="old" class="form-label">อายุ</label>
                        <input type="date" class="form-control" name="old" />
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="educational" class="form-label">วุฒิการศึกษา</label>
                        <select name="educational" class="form-select" required>
                            <option value=""> วุฒิการศึกษา </option>

                            <?php

                            $strSQL = "SELECT * FROM education ORDER BY education ASC";

                            $objQuery = mysqli_query($conn, $strSQL);

                            while ($objResuut = mysqli_fetch_array($objQuery)) {

                            ?>

                                <option value="<?php echo $objResuut["education"]; ?>"><?php echo $objResuut["education"] ?></option>

                            <?php

                            }

                            ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="date_job" class="form-label">วันที่เข้าทำงาน</label><br />
                        <input type="date" class="form-control" name="date_job" />
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="name_train" class="form-label">ข้อมูลเรื่องที่ฝึกอบรม</label>
                        <input type="text" class="form-control" name="name_train" />
                    </div>

                    <div class="col-md-6">
                        <label for="date_train">ข้อมูลวันที่ฝึกอบรม</label><br />
                        <input type="date" class="form-control" name="date_train" />
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="time_train" class="form-label">ข้อมูลระยะเวลาในการฝึกอบรม</label>
                        <input type="text" class="form-control" name="time_train" />
                    </div>

                    <div class="col-md-6">
                        <label for="location_train" class="form-label">ข้อมูลสถานที่ฝึกอบรม</label>
                        <input type="text" class="form-control" name="location_train" />
                    </div>
                </div>


                <div class="col-md-6">
                    <label for="assessor" class="form-label">ข้อมูลผู้จัดการฟาร์ม/ผู้ประเมินผล</label>
                    <input type="text" class="form-control" name="assessor" />
                </div>


                <div class="mindphp">
                    <label for="con_name" class="form-label">ลงชื่อเจ้าของฟาร์ม</label>
                    <select name="con_name" class="form-select">
                        <option><?php echo $_SESSION['username']; ?></option>
                    </select>
                </div>
                <br />


                <div class="input-group">
                    <button type="submid" name="sub_work" class="btn btn-success">บันทึกข้อมูล</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div>

                <br />

            </form>
            <a href="data_workman.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
        </div>
    </div>

</body>

</html>