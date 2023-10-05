<?php
include('server.php');
session_start();


$editID = mysqli_real_escape_string($conn, $_GET['editID']);


$query = "select * from datamanagement where id = '$editID' "; //คำสั่งให้เลือกข้อมูลจาก TABLE ชื่อ tbl_member โดยเรียงจาก member_id และให้เรียงลำดับจากมากไปน้อยคือ DESC
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
    <title>แก้ไขข้อมูลทะเบียนประวัติแพะนม</title>
    <style>
        .mindphp {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <div class="p-3 mb-2 bg-success text-white">
        <h3 align="center">แก้ไขข้อมูลทะเบียนประวัติแพะนม</h3>
        <div style="background-color: rgb(133, 191, 165); width: 100%; height: 90vh;  border-radius: 24px; padding: 20px 18px 30px 18px;" class="mx-auto align-self-center">

            <form action="editdb.php" method="post" name="updateuser" id="updateuser">
                
                <div class="row">
                    <div class="col-md-6">
                        <label for="GoatNumber" class="form-label">หมายเลขแพะนม</label>
                        <input type="number" class="form-control" name="GoatNumber" value="<?php echo $row1['number']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="Gender" class="form-label">เพศ</label>
                        <select name="Gender" class="form-select">
                            <option selected>เลือกเพศ</option>
                            <option>เพศผู้</option>
                            <option>เพศเมีย</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="MilkGoatBreed" class="form-label">ชื่อพันธุ์แพะนม</label>
                        <select name="MilkGoatBreed" class="form-select">
                            <option selected>เลือกพันธุ์แพะนม</option>
                            <option>แพะพันธุ์ซาเนน(Saanen)</option>
                            <option>แพะพันธุ์อัลไพน์(Alpine)</option>
                            <option>แพะแองโกลนูเบียน(Anglo Nubian)</option>
                            <option>แพะพันธุ์ลาแมนซา(LaManchas)</option>
                            <option>แพะพันธุ์ทอกเก็นเบอร์(Toggenberg)</option>
                            <option>พันธุ์เหลาซาน(Loashan)</option>
                            <option>แพะพื้นเมือง(Native goats)</option>
                            <option>แพะลูกผสม(Mixed breed)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="birthday">วัน/เดือน/ปี(เกิด)</label><br />
                        <input type="date" class="form-control" name="birthday" value="<?php echo $row1['birthday']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="Weight" class="form-label">น้ำหนักแรกเกิด(Kg)</label>
                        <input type="textr" class="form-control" name="Weight" value="<?php echo $row1['weight']; ?> ">
                    </div>
                    <div class="col-md-6">
                        <label for="Father" class="form-label">หมายเลขพ่อ/ชื่อ</label>
                        <input type="text" class="form-control" name="Father" value="<?php echo $row1['father']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="Mother" class="form-label">หมายเลขแม่/ชื่อ</label>
                        <input type="text" class="form-control" name="Mother" value="<?php echo $row1['mother']; ?> ">
                    </div>
                    <div class="col-md-6">
                        <label for="birthday_milk">วัน/เดือน/ปี(หย่านม)</label><br />
                        <input type="date" class="form-control" name="birthday_milk" value="<?php echo $row1['birthday_milk']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="Weight_milk" class="form-label">น้ำหนักหย่านม(Kg)</label>
                        <input type="text" class="form-control" name="Weight_milk" value="<?php echo $row1['weight_milk']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="Note" class="form-label">หมายเหตุ</label>
                        <input type="text" class="form-control" name="Note" value="<?php echo $row1['note']; ?>">
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
                    <button type="submit" class="btn btn-warning btn-block">แก้ไขข้อมูล</button>
                </div><br />
            </form>
            <a href="data_Management.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
            
        </div>

</body>

</html>