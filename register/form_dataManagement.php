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
    <title>แบบบันทึกข้อมูลทะเบียนประวัติแพะนม</title>
    <style>
        .mindphp {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <div class="p-3 mb-2 bg-success text-white">
        <h3 align="center">แบบบันทึกข้อมูลทะเบียนประวัติแพะนม</h3>
        <div style="background-color: rgb(133, 191, 165); width: 100%; height: 100vh;  border-radius: 24px; padding: 20px 18px 30px 18px;" class="mx-auto align-self-center">

            <form action="dataManagementdb.php" method="post">
                <div class="row">

                    <div class="col-md-6">
                        <label for="GoatNumber" class="form-label">หมายเลขแพะนม</label>
                        <input type="number" class="form-control" name="GoatNumber" required>
                    </div>

                    <div class="col-md-6">
                        <label for="Gender" class="form-label">เพศ</label>
                        <select name="Gender" class="form-select" required>
                            <option selected>เลือกเพศ</option>
                            <option>เพศผู้</option>
                            <option>เพศเมีย</option>
                        </select>
                    </div>

                </div><br />
                <div class="row">

                    <div class="col-md-6">
                        <label for="MilkGoatBreed" class="form-label">ชื่อพันธุ์แพะนม</label>
                        <select name="MilkGoatBreed" class="form-select" required>
                            <option value=""> เลือกพันธุ์แพะนม </option>

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

                    <div class="col-md-6">
                        <label for="birthday">วัน/เดือน/ปี(เกิด)</label><br />
                        <input type="date" class="form-control" name="birthday" required>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="Weight" class="form-label">น้ำหนักแรกเกิด(Kg)</label>
                        <input type="textr" class="form-control" name="Weight" required>
                    </div>

                    <div class="col-md-6">
                        <label for="Father" class="form-label">หมายเลขพ่อ/ชื่อ</label>
                        <input type="text" class="form-control" name="Father" required>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="Mother" class="form-label">หมายเลขแม่/ชื่อ</label>
                        <input type="text" class="form-control" name="Mother" required>
                    </div>

                    <div class="col-md-6">
                        <label for="birthday_milk">วัน/เดือน/ปี(หย่านม)</label><br required>
                        <input type="date" class="form-control" name="birthday_milk">
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <label for="Weight_milk" class="form-label">น้ำหนักหย่านม(Kg)</label>
                        <input type="text" class="form-control" name="Weight_milk" required>
                    </div>

                    <div class="col-md-6">
                        <label for="Note" class="form-label">หมายเหตุ</label>
                        <input type="text" class="form-control" name="Note">
                    </div>
                </div>
                <div class="mindphp">
                    <label for="con_name" class="mindphp">ลงชื่อเจ้าของฟาร์ม</label>
                    <select name="con_name" class="mindphp">
                        <option><?php echo $_SESSION['username']; ?></option>

                    </select>
                </div>
                <br />

                <div class="d-grid gap-3 col-5 mx-auto">
                    <button type="submid" name="sub_datamanag" class="btn btn-success">บันทึกข้อมูล</button>
                </div>
                <br />
                <div class="d-grid gap-3 col-5 mx-auto">
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div>
            </form>
            <br />
            <a href="data_Management.php">
                <div class="d-grid gap-3 col-5 mx-auto">
                    <button type="submid" class="btn btn-danger">ย้อนกลับ</button>
                </div>
            </a>
        </div>


    </div>
</body>

</html>