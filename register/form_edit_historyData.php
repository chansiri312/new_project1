<?php
include('server.php');
session_start();


$editID = mysqli_real_escape_string($conn, $_GET['editID']);


$query = "select * from historydata where id = '$editID' "; //คำสั่งให้เลือกข้อมูลจาก TABLE ชื่อ tbl_member โดยเรียงจาก member_id และให้เรียงลำดับจากมากไปน้อยคือ DESC
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

<div class="p-3 mb-2 bg-success text-white">
    <h3 align="center">แบบบันทึกข้อมูลประวัติการให้ผลผลิต(รายฟาร์ม)</h3>
    <div style="background-color: rgb(133, 191, 165); width: 100%; height: 90vh;  border-radius: 24px; padding: 20px 18px 30px 18px;" class="mx-auto align-self-center">
        <form action="history_editdb.php" method="post">
           

            <div class="row">
                <div class="col-md-6">
                    <label for="number" class="form-label">หมายเลขประจำตัว</label>
                    <input type="number" class="form-control" name="number" value="<?php echo $row1['number']; ?>">
                </div>



                <div class="col-md-6">
                    <label for="num_milk" class="form-label">ครั้งที่ชองการให้นม</label>
                    <input type="number" class="form-control" name="num_milk" value="<?php echo $row1['num_milk']; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="num_date_history" class="form-label">จำนวนวันให้ผลผลิต(วัน)</label>
                    <input type="number" class="form-control" name="num_date_history" value="<?php echo $row1['num_date_history']; ?>">
                </div>


                <div class="col-md-6">
                    <label for="milk" class="form-label">ปริมาณน้ำนม(Kg)</label>
                    <input type="number" class="form-control" name="milk" value="<?php echo $row1['milk']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="note" class="form-label">หมายเหตุ</label>
                    <input type="number" class="form-control" name="note" value="<?php echo $row1['note']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="mindphp">
                    <label for="id">ไอดีแก้ไข</label><br />
                    <select name="id" class=" form-select">
                        <option><?php echo $row1['id']; ?></option>
                    </select>
                </div>
            </div>
            <br />

            

            <div class="input-group">
                <button type="submid" class="btn btn-warning">แก้ไขข้อมูล</button>
            </div>

        </form><br />
            <a href="data_historyData.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
    </div>
</div>