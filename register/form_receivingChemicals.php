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
            <form action="receivingChemicalsdb.php" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <label for="date">วัน/เดือน/ปี <font color='red'>*</font></label>
                        <input type="date" class="form-control" name="date" required>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col">
                        <label for="name_medical" class="form-label">ชื่อของเวชภัณฑ์ <font color='red'>*</font></label>
                        <select name="name_medical" class="form-select" required>
                            <option value="">  </option>
                            <?php

                            $strSQL = "SELECT * FROM supplies ORDER BY name_supplies ASC";

                            $objQuery = mysqli_query($conn, $strSQL);

                            while ($objResuut = mysqli_fetch_array($objQuery)) {

                            ?>

                                <option value="<?php echo $objResuut["name_supplies"]; ?>"><?php echo $objResuut["name_supplies"] ?></option>

                            <?php

                            }

                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="name_chemical" class="form-label">ชื่อสารเคมี <font color='red'>*</font></label>
                        <select name="name_chemical" class="form-select" required>
                            <option value="">  </option>

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
                    <div class="col">
                        <label for="buy_medical">จำนวนที่ซื้อ/ยกมา <font color='red'>*</font></label>
                        <input type="number" class="form-control" name="buy_medical" required>
                    </div>
                    <div class="col">
                        <label for="use_medical">จำนวนที่ใช้ <font color='red'>*</font></label>
                        <input type="number" class="form-control" name="use_medical" required>
                    </div>
                </div>
                <br />
                <div class="row">

                </div>
                <div class="row">
                    <div class="col">
                        <label for="use_chemical">ผู้บันทึก <font color='red'>*</font></label><br />
                        <input type="text" class="form-control" name="use_chemical" required>
                    </div>
                    <div class="col-md-6">
                        <label for="note" class="form-label">หมายเหตุ</label>
                        <input type="text" class="form-control" name="note">
                    </div>
                </div>





                <div class="mindphp">
                    <label for="con_name" class="form-label">ลงชื่อเจ้าของฟาร์ม</label>
                    <select name="con_name" class="form-select">
                        <option><?php echo $_SESSION['username']; ?></option>
                    </select>
                </div>
                <br />

                <div class="input-group">
                    <button type="submid" name="sub_chemical" class="btn btn-success">บันทึกข้อมูล</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="reset" class="btn btn-warning">Reset</button>

                </div>
                <br />

            </form>
            <a href="data_receivingChemicals.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
        </div>
    </div>


</body>

</html>