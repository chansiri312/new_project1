<?php
include('server.php');
session_start();


$editID = mysqli_real_escape_string($conn, $_GET['editID']);


$query = "select * from maternalreproduction where id = '$editID' "; //คำสั่งให้เลือกข้อมูลจาก TABLE ชื่อ tbl_member โดยเรียงจาก member_id และให้เรียงลำดับจากมากไปน้อยคือ DESC
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
    <title>แบบบันทึกข้อมูลการสืบพันธุ์ของแม่พันธุ์</title>
    <style>
        .mindphp {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <div class="p-3 mb-2 bg-success text-white">
        <h3 align="center">แบบบันทึกข้อมูลการสืบพันธุ์ของแม่พันธุ์</h3>
        <div style="background-color: rgb(133, 191, 165); width: 100%; height: 100vh;  border-radius: 24px; padding: 20px 18px 30px 18px;" class="mx-auto align-self-center">

            <form action="edit_maternalReproductiondb.php" method="post">

               
                <div class="row">
                    <div class="col-md-6">
                        <label for="date">วัน/เดือน/ปี(ที่ผสมพันธุ์)</label><br />
                        <input type="date" class="form-control" id="birthday" name="date" value="<?php echo $row1['date']; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="name_dad" class="form-label">ชื่อพ่อแพะที่ใช้ผสมพันธุ์</label>
                        <input type="number" class="form-control" name="name_dad" value="<?php echo $row1['name_dad']; ?>">
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="old" class="form-label">อายุเมื่อผสมพันธุ์</label>
                        <input type="number" class="form-control" name="old" value="<?php echo $row1['old']; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="birthdate" class="form-label">น้ำหนักเมื่อผสมพันธุ์</label>
                        <input type="text" class="form-control" name="birthdate" value="<?php echo $row1['birthdate']; ?>">
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <label for="birthchild" class="form-label">กำหนดวันคลอด</label>
                        <input type="text" class="form-control" name="birthchild" value="<?php echo $row1['birthchild']; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="birthday">วัน/เดือน/ปี ลูกที่คลอด</label><br />
                        <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $row1['birthday']; ?>">
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="number" class="form-label">ข้อมูลหมายเลข</label>
                        <input type="number" class="form-control" name="number" value="<?php echo $row1['number']; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="gender" class="form-label">เพศ</label>
                        <select name="gender" class="form-select" value="<?php echo $row1['gender']; ?>">
                            <option selected>เลือกเพศ</option>
                            <option>เพศผู้</option>
                            <option>เพศเมีย</option>
                        </select>
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
                    <button type="submid" name="sub_mter" class="btn btn-warning">แก้ไขข้อมูล</button>
                </div>

            </form><br />
            <a href="data_maternalReproduction.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
        </div>
    </div>
</body>

</html>