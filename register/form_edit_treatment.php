<?php
include('server.php');
session_start();


$editID = mysqli_real_escape_string($conn, $_GET['editID']);


$query = "select * from treatment where id = '$editID' "; //คำสั่งให้เลือกข้อมูลจาก TABLE ชื่อ tbl_member โดยเรียงจาก member_id และให้เรียงลำดับจากมากไปน้อยคือ DESC
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
    <title>แบบบันทึกข้อมูลการรักษาโรค</title>
    <style>
        .mindphp {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <div class="p-3 mb-2 bg-success text-white">
        <h3 align="center">แบบบันทึกแก้ไขข้อมูลการรักษาโรค</h3>
        <div style="background-color: rgb(133, 191, 165); width: 100%; height: 100vh;  border-radius: 24px; padding: 20px 18px 30px 18px;" class="mx-auto align-self-center">
            <form action="edit_treatmentdb.php" method="post">
              
                <div class="row">

                    <div class="col-md-6">
                        <label for="date">ข้อมูลวัน/เดือน/ปี</label><br />
                        <input type="date" class="form-control" id="birthday" name="date" value="<?php echo $row1['date']; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="number" class="form-label">ข้อมูลหมายเลขประจำตัว</label>
                        <input type="text" class="form-control" name="number" value="<?php echo $row1['number']; ?>">
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="health" class="form-label">ข้อมูลข้อมูลสุขภาพ</label>
                        <input type="text" class="form-control" name="health" value="<?php echo $row1['health']; ?>">
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
                        <input type="text" class="form-control" name="treatment" value="<?php echo $row1['treatment']; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="treat" class="form-label">ชื่อผู้รักษา</label>
                        <input type="text" class="form-control" name="treat" value="<?php echo $row1['treat']; ?>">
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="note" class="form-label">หมายเหตุ</label>
                        <input type="text" class="form-control" name="note" value="<?php echo $row1['note']; ?>">
                    </div>
                </div>
                <div class="mindphp">
                    <label for="id">ไอดีแก้ไข</label><br />
                    <select name="id" class=" form-select">
                        <option><?php echo $row1['id']; ?></option>
                    </select>
                </div>

                <br />

                <div class="input-group">
                    <button type="submid" name="sub_treat" class="btn btn-warning">แก้ไขข้อมูล</button>&nbsp;&nbsp;&nbsp;&nbsp;


                </div>
                
                <br />

            </form>
            <a href="data_treatment.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
        </div>
    </div>

</body>

</html>