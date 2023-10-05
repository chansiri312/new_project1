<?php
include('server.php');
session_start();

$editID = mysqli_real_escape_string($conn, $_GET['editID']);


$query = "select * from receivingchemicals where id = '$editID' "; //คำสั่งให้เลือกข้อมูลจาก TABLE ชื่อ tbl_member โดยเรียงจาก member_id และให้เรียงลำดับจากมากไปน้อยคือ DESC
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
    <title>แบบบันทึกข้อมูลการการรับ-จ่ายเวชภัณฑ์และสารเคมี</title>
    <style>
        .mindphp {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <div class="p-3 mb-2 bg-success text-white">
        <h3 align="center">แบบบันทึกข้อมูลการการรับ-จ่ายเวชภัณฑ์และสารเคมี</h3>
        <div style="background-color: rgb(133, 191, 165); width: 100%; height: 100vh;  border-radius: 24px; padding: 20px 18px 30px 18px;" class="mx-auto align-self-center">
            <form action="edit_receivingChemicalsdb.php" method="post">
                <div class="col-md-6">
                    <label for="date">วัน/เดือน/ปี</label><br />
                    <input type="date" class="form-control" id="birthday" name="date" value="<?php echo $row1['date']; ?>">
                </div>


                <div class="row">

                    <div class="col">
                        <label for="name_medical" class="form-label">ชื่อของเวชภัณฑ์</label>
                        <select name="name_medical" class="form-select" value="<?php echo $row1['name_medical']; ?>">
                            <option value=""> เลือกเวชภัณฑ์ </option>

                            <?php

                            $strSQL = "SELECT * FROM supplies ORDER BY medical_supplies ASC";

                            $objQuery = mysqli_query($conn, $strSQL);

                            while ($objResuut = mysqli_fetch_array($objQuery)) {

                            ?>

                                <option value="<?php echo $objResuut["medical_supplies"]; ?>"><?php echo $objResuut["medical_supplies"] ?></option>

                            <?php

                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="buy_medical">จำนวนที่ซื้อ/ยกมา</label><br />
                        <input type="number" class="form-control" name="buy_medical" value="<?php echo $row1['buy_medical']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="use_medical">จำนวนที่ใช้</label><br />
                        <input type="number" class="form-control" name="use_medical" value="<?php echo $row1['use_medical']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="name_chemical" class="form-label">ชื่อสารเคมี</label>
                        <select name="name_chemical" class="form-select" value="<?php echo $row1['name_chemical']; ?>">
                            <option value=""> เลือกสารเคมี </option>

                            <?php

                            $strSQL = "SELECT * FROM chemical ORDER BY chemicals ASC";

                            $objQuery = mysqli_query($conn, $strSQL);

                            while ($objResuut = mysqli_fetch_array($objQuery)) {

                            ?>

                                <option value="<?php echo $objResuut["chemicals"]; ?>"><?php echo $objResuut["chemicals"] ?></option>

                            <?php

                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="buy_chemical">จำนวนที่ซื้อ/ยกมา</label><br />
                        <input type="number" class="form-control" name="buy_chemical" value="<?php echo $row1['buy_chemical']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="use_chemical">จำนวนที่ใช้</label><br />
                        <input type="number" class="form-control" name="use_chemical" value="<?php echo $row1['use_chemical']; ?>">
                    </div>
                </div>


                <div class="col-md-6">
                    <label for="note" class="form-label">หมายเหตุ</label>
                    <input type="text" class="form-control" name="note" value="<?php echo $row1['note']; ?>">
                </div>

                <div class="mindphp">
                    <label for="id">ไอดีแก้ไข</label><br />
                    <select name="id" class=" form-select">
                        <option><?php echo $row1['id']; ?></option>
                    </select>
                </div>
                <br />

                <div class="input-group">
                    <button type="submid" name="sub_chemi" class="btn btn-warning">แก้ไขข้อมูล</button>
                </div>

            </form>
            <br />
            <a href="data_receivingChemicals.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
        </div>
    </div>

</body>

</html>