<?php
include('server.php');
session_start();

$editID = mysqli_real_escape_string($conn, $_GET['editID']);

$query = "select * from workman where id = '$editID' "; //คำสั่งให้เลือกข้อมูลจาก TABLE ชื่อ tbl_member โดยเรียงจาก member_id และให้เรียงลำดับจากมากไปน้อยคือ DESC
//ประกาศตัวแปร sqli
$result = mysqli_query($conn, $query);
$row1 = mysqli_fetch_array($result);
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
            <form action="edit_workmandb.php" method="post">
               
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
                        <input type="text" class="form-control" name="name" value="<?php echo $row1['name']; ?>">
                    </div>


                    <div class="col-md-1">
                        <label for="old" class="form-label">อายุ</label>
                        <input type="text" class="form-control" name="old" value="<?php echo $row1['old']; ?>">
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
                        <input type="date" class="form-control" name="date_job" value="<?php echo $row1['date_job']; ?>">
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="name_train" class="form-label">ข้อมูลเรื่องที่ฝึกอบรม</label>
                        <input type="text" class="form-control" name="name_train" value="<?php echo $row1['name_train']; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="date_train">ข้อมูลวันที่ฝึกอบรม</label><br />
                        <input type="date" class="form-control" name="date_train" value="<?php echo $row1['date_train']; ?>">
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="time_train" class="form-label">ข้อมูลระยะเวลาในการฝึกอบรม</label>
                        <input type="text" class="form-control" name="time_train" value="<?php echo $row1['time_train']; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="location_train" class="form-label">ข้อมูลสถานที่ฝึกอบรม</label>
                        <input type="text" class="form-control" name="location_train" value="<?php echo $row1['location_train']; ?>">
                    </div>
                </div>


                <div class="col-md-6">
                    <label for="assessor" class="form-label">ข้อมูลผู้จัดการฟาร์ม/ผู้ประเมินผล</label>
                    <input type="text" class="form-control" name="assessor" value="<?php echo $row1['assessor']; ?>">
                </div>


                <div class="mindphp">
                    <label for="id">ไอดีแก้ไข</label><br />
                    <select name="id" class=" form-select">
                        <option><?php echo $row1['id']; ?></option>
                    </select>
                </div>
                <br />


                <div class="input-group">
                    <button type="submid" name="sub_work" class="btn btn-warning">แก้ไขข้อมูล</button>&nbsp;&nbsp;&nbsp;&nbsp;
                  
                </div>

                <br />

            </form>
            <a href="data_workman.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
        </div>
    </div>

</body>

</html>