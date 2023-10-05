<?php
include('server.php');
session_start();


$editID = mysqli_real_escape_string($conn, $_GET['editID']);


$query = "select * from farmaccount where id = '$editID' "; //คำสั่งให้เลือกข้อมูลจาก TABLE ชื่อ tbl_member โดยเรียงจาก member_id และให้เรียงลำดับจากมากไปน้อยคือ DESC
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
            <form class="row g-3" action="farm_ac_editdb.php" method="post">

                

                <div class="col-md-6">
                    <label for="birthday">วัน/เดือน/ปี(เกิด)</label><br />
                    <input type="date" class="form-control" name="birthday" value="<?php echo $row1['birthday']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="Entrances" class="form-label">ข้อมูลจำนวนเข้า</label>
                    <input type="number" class="form-control" name="Entrances" value="<?php echo $row1['entrances']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="Exits" class="form-label">ข้อมูลจำนวนออก</label>
                    <input type="number" class="form-control" name="Exits" value="<?php echo $row1['exits']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="Loss" class="form-label">ข้อมูลจำนวนการสูญเสีย</label>
                    <input type="number" class="form-control" name="Loss" value="<?php echo $row1['loss']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="Happen" class="form-label">ข้อมูลจำนวนแพะลูกเกิด</label>
                    <input type="number" class="form-control" name="Happen" value="<?php echo $row1['happen']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="Milking" class="form-label">ข้อมูลจำนวนแม่แพะรีดนม</label>
                    <input type="number" class="form-control" name="Milking" value="<?php echo $row1['milking']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="Sick" class="form-label">ข้อมูลจำนวนป่วย</label>
                    <input type="number" class="form-control" name="Sick" value="<?php echo $row1['sick']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="Total" class="form-label">ข้อมูลรวมทั้งหมด</label>
                    <input type="number" class="form-control" name="Total" value="<?php echo $row1['total']; ?>">
                </div>
                <div class="mindphp">
                    <label for="id">ไอดีแก้ไข</label><br />
                    <select name="id" class=" form-select">
                        <option><?php echo $row1['id']; ?></option>
                    </select>
                </div>
                <br />

                <div class="input-group">
                    <button type="submid" name="sub_farmaccount" class="btn btn-warning">แก้ไขข้อมูล</button>
                </div>


            </form><br />
            <a href="data_farmAccount.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>

</body>

</html>