<?php
include('server.php');
session_start();

$editID = mysqli_real_escape_string($conn, $_GET['editID']);

$query = "select * from vaccine where id = '$editID' "; //คำสั่งให้เลือกข้อมูลจาก TABLE ชื่อ tbl_member โดยเรียงจาก member_id และให้เรียงลำดับจากมากไปน้อยคือ DESC
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
    <title>แบบบันทึกข้อมูลการใช้วัคซีน-การถ่ายพยาธิ(ทั้งฝูง)</title>
    <style>
        .mindphp {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <div class="p-3 mb-2 bg-success text-white">
        <h3 align="center">แบบบันทึกข้อมูลการใช้วัคซีน-การถ่ายพยาธิ(ทั้งฝูง)</h3>
        <div style="background-color: rgb(133, 191, 165); width: 100%; height: 100vh;  border-radius: 24px; padding: 20px 18px 30px 18px;" class="mx-auto align-self-center">
            <form action="edit_vaccinedb.php" method="post">
                <div class="row">

                    <div class="col-md-6">
                        <label for="date">ข้อมูลวัน/เดือน/ปี</label><br />
                        <input type="date" class="form-control" id="birthday" name="date" value="<?php echo $row1['date']; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="stall" class="form-label">ข้อมูลคอก/ฝูง</label>
                        <select name="stall" class="form-select" value="<?php echo $row1['stall']; ?>">
                            <option>คอก</option>
                            <option>ฝูง</option>
                        </select>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="name_vaccine" class="form-label">ข้อมูลชนิด/ชื่อวัคซีน</label>
                        <select name="name_vaccine" class="form-select" value="<?php echo $row1['name_vaccine']; ?>">
                            <option value=""> เลือกเวชภัณฑ์ </option>

                            <?php

                            $strSQL = "SELECT * FROM name_vaccine ORDER BY vaccine ASC";

                            $objQuery = mysqli_query($conn, $strSQL);

                            while ($objResuut = mysqli_fetch_array($objQuery)) {

                            ?>

                                <option value="<?php echo $objResuut["vaccine"]; ?>"><?php echo $objResuut["vaccine"] ?></option>

                            <?php

                            }

                            ?>
                        </select>

                    </div>

                    <div class="col-md-6">
                        <label for="num_goat" class="form-label">ข้อมูลจำนวนแพะนม(ตัว)</label>
                        <input type="number" class="form-control" name="num_goat" value="<?php echo $row1['num_goat']; ?>">
                    </div>
                </div><br />


                <h3 align="center">การถ่ายพยาธิ</h3>
                <div class="row">

                    <div class="col-md-6">
                        <label for="name_mediacal" class="form-label">ข้อมูลชนิด/ชื่อยา</label>
                        <select name="name_mediacal" class="form-select" value="<?php echo $row1['name_mediacal']; ?>">
                            <option value=""> เลือกยาถ่ายพยาธิ </option>

                            <?php

                            $strSQL = "SELECT * FROM medical ORDER BY name_medicals ASC";

                            $objQuery = mysqli_query($conn, $strSQL);

                            while ($objResuut = mysqli_fetch_array($objQuery)) {

                            ?>

                                <option value="<?php echo $objResuut["name_medicals"]; ?>"><?php echo $objResuut["name_medicals"] ?></option>

                            <?php

                            }

                            ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="num_gost1" class="form-label">ข้อมูลจำนวนแพะ(ตัว)</label>
                        <input type="text" class="form-control" name="num_gost1" value="<?php echo $row1['num_gost1']; ?>">
                    </div>
                </div>
                <br />


                <h3 align="center">การตรวจโรคบรูเซลโลซีล</h3>
                <div class="row">

                    <div class="col-md-6">
                        <label for="examination" class="form-label">ข้อมูลการตรวจโรคบรูเซลโลซีล</label>
                        <input type="text" class="form-control" name="examination" value="<?php echo $row1['examination']; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="operator" class="form-label">ชื่อผู้ปฏิบัติงาน</label>
                        <input type="text" class="form-control" name="operator" value="<?php echo $row1['operator']; ?>">
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="controller" class="form-label">ชื่อผู้ควบคุม</label>
                        <input type="text" class="form-control" name="controller" value="<?php echo $row1['controller']; ?>">
                    </div>
                </div>
                <div class="mindphp">
                    <label for="id">ไอดีแก้ไข</label><br />
                    <select name="id" class=" form-select">
                        <option><?php echo $row1['id']; ?></option>
                    </select>
                </div><br />


                <div class="input-group">
                    <button type="submid" name="sub_vacc" class="btn btn-warning">แก้ไขข้อมูล</button>

                </div>


            </form><br />
            <a href="data_vaccine.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
        </div>
    </div>

</body>

</html>