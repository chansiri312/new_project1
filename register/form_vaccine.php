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
            <form action="vaccinedb.php" method="post">
                <div class="row">

                    <div class="col-md-6">
                        <label for="date">ข้อมูลวัน/เดือน/ปี <font color='red'>*</font></label><br />
                        <input type="date" class="form-control" id="birthday" name="date" required>
                    </div>

                    <div class="col-md-6">
                        <label for="stall" class="form-label">ข้อมูลคอก/ฝูง <font color='red'>*</font></label>
                        <select name="stall" class="form-select" required>
                            <option>คอก</option>
                            <option>ฝูง</option>
                        </select>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <label for="name_vaccine" class="form-label">ข้อมูลชนิด/ชื่อวัคซีน <font color='red'>*</font></label>
                        <select name="name_vaccine" class="form-select" required>
                            <option value="">  </option>

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
                        <label for="num_goat" class="form-label">ข้อมูลจำนวนแพะนม(ตัว) <font color='red'>*</font></label>
                        <input type="number" class="form-control" name="num_goat" />
                    </div>
                </div>
                


                <h3 align="center">การถ่ายพยาธิ</h3>
                <div class="row">

                    <div class="col-md-6">
                        <label for="name_mediacal" class="form-label">ข้อมูลชนิด/ชื่อยา <font color='red'>*</font></label>
                        <select name="name_mediacal" class="form-select" required>
                            <option value="">  </option>

                            <?php

                            $strSQL = "SELECT * FROM medical ORDER BY name_medical ASC";

                            $objQuery = mysqli_query($conn, $strSQL);

                            while ($objResuut = mysqli_fetch_array($objQuery)) {

                            ?>

                                <option value="<?php echo $objResuut["name_medical"]; ?>"><?php echo $objResuut["name_medical"] ?></option>

                            <?php

                            }

                            ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="num_goat1" class="form-label">ข้อมูลจำนวนแพะ(ตัว) <font color='red'>*</font></label>
                        <input type="text" class="form-control" name="num_goat1" required />
                    </div>
                   
                </div>
                <h3 align="center">การตรวจโรคบรูเซลโลซีล</h3>


                <div class="row">

                    <div class="col-md-6">
                        <label for="examination" class="form-label">ข้อมูลการตรวจโรคบรูเซลโลซีล <font color='red'>*</font></label>
                        <input type="text" class="form-control" name="examination" required />
                    </div>

                    <div class="col-md-6">
                        <label for="operator" class="form-label">ชื่อผู้ปฏิบัติงาน <font color='red'>*</font></label>
                        <input type="text" class="form-control" name="operator" required />
                    </div>
                </div>


                <div class="col-md-6">
                    <label for="controller" class="form-label">ชื่อผู้ควบคุม <font color='red'>*</font></label>
                    <input type="text" class="form-control" name="controller" required />
                </div>



                <div class="mindphp">
                    <label for="con_name" class="form-label">ลงชื่อเจ้าของฟาร์ม</label>
                    <select name="con_name" class="form-select">
                        <option><?php echo $_SESSION['username']; ?></option>
                    </select>
                </div>
                <br />

                <div class="input-group">
                    <button type="submid" name="sub_vacc" class="btn btn-success">บันทึกข้อมูล</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="reset" class="btn btn-warning">Reset</button>

                </div><br />

            </form>
            <a href="data_vaccine.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
        </div>
    </div>

</body>

</html>