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

            <form action="maternalReproductiondb.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <label for="num1">หมายเลขประจำตัว <font color='red'>*</font></label><br />
                        <input type="number" class="form-control"  name="num1" required>
                    </div>

                    <div class="col-md-6">
                        <label for="gen" class="form-label">ชื่อพันธุ์แพะนม <font color='red'>*</font></label>
                        <select name="gen" class="form-select" required>
                            <option value="">  </option>

                            <?php

                            $strSQL = "SELECT * FROM gengost ORDER BY gen_gost ASC";

                            $objQuery = mysqli_query($conn, $strSQL);

                            while ($objResuut = mysqli_fetch_array($objQuery)) {

                            ?>

                                <option value="<?php echo $objResuut["gen_gost"]; ?>"><?php echo $objResuut["gen_gost"] ?></option>

                            <?php

                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="num_dad">หมายเลขพ่อ <font color='red'>*</font></label><br />
                        <input type="number" class="form-control"  name="num_dad" required>
                    </div>

                    <div class="col-md-6">
                        <label for="num_mom" class="form-label">หมายเลขแม่ <font color='red'>*</font></label>
                        <input type="number" class="form-control" name="num_mom" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="date">วัน/เดือน/ปี(ที่ผสมพันธุ์) <font color='red'>*</font></label><br />
                        <input type="date" class="form-control" id="birthday" name="date" required>
                    </div>

                    <div class="col-md-6">
                        <label for="name_dad" class="form-label">พ่อแพะที่ใช้ผสมพันธุ์ <font color='red'>*</font></label>
                        <input type="number" class="form-control" name="name_dad" required>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="old" class="form-label">อายุเมื่อผสมพันธุ์ <font color='red'>*</font></label>
                        <input type="number" class="form-control" name="old" required>
                    </div>

                    <div class="col-md-6">
                        <label for="birthdate" class="form-label">ข้อมูลกำหนดวันคลอด <font color='red'>*</font></label>
                        <input type="date" class="form-control" name="birthdate" required>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <label for="birthchild" class="form-label">น้ำหนักเมื่อผสมพันธุ์ <font color='red'>*</font></label>
                        <input type="text" class="form-control" name="birthchild" required>
                    </div>

                    <div class="col-md-6">
                        <label for="birthday">วัน/เดือน/ปี ลูกที่คลอด <font color='red'>*</font></label><br />
                        <input type="date" class="form-control" id="birthday" name="birthday" required>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="number" class="form-label">ข้อมูลหมายเลข <font color='red'>*</font></label>
                        <input type="number" class="form-control" name="number" required>
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
                        <label for="note" class="form-label">หมายเหตุ</label>
                        <input type="text" class="form-control" name="note" />
                    </div>
                </div>


                <div class="mindphp">
                    <label for="con_name" class="form-label">ลงชื่อเจ้าของฟาร์ม</label>
                    <select name="con_name" class="form-select">
                        <option><?php echo $_SESSION['username']; ?></option>
                    </select>
                </div><br />

                <div class="input-group">
                    <button type="submid" name="sub_mter" class="btn btn-success">บันทึกข้อมูล</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="reset" class="btn btn-warning">Reset</button>

                </div><br />

            </form>
            <a href="data_maternalReproduction.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
        </div>
    </div>
</body>

</html>