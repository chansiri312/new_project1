<?php
include('server.php');
session_start();


$editID = mysqli_real_escape_string($conn, $_GET['id']);


$query = "select * from user where id = '$editID' "; //คำสั่งให้เลือกข้อมูลจาก TABLE ชื่อ tbl_member โดยเรียงจาก member_id และให้เรียงลำดับจากมากไปน้อยคือ DESC
//ประกาศตัวแปร sqli
$result = mysqli_query($conn, $query);
$row1 = mysqli_fetch_array($result);

$sql1 = "select * from user  where username = '" . $_SESSION['username'] . "'";

$query1 = mysqli_query($conn, $sql1);
$result1 = mysqli_fetch_array($query1, MYSQLI_ASSOC);
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
        <h3 align="center">แก้ไขข้อมูลฟาร์ม</h3>
        <div style="background-color: rgb(133, 191, 165); width: 100%; height: 90vh;  border-radius: 24px; padding: 20px 18px 30px 18px;" class="mx-auto align-self-center">
            <form class="row g-3" action="personal_informationdb.php" method="post">

                <div class="col-md-6">
                    <label for="farm_name">ชื่อฟาร์ม</label><br />
                    <input type="text" class="form-control" name="farm_name" value="<?php echo $result1['farm_name']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">อีเมล</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $result1['email']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="number_farm" class="form-label">เลขทะเบียนฟาร์ม</label>
                    <input type="number" class="form-control" name="number_farm" value="<?php echo $result1['number_farm']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="name" class="form-label">ชื่อเจ้าของฟาร์ม</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $result1['name']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="farm_number" class="form-label">ฟาร์มเลขที่</label>
                    <input type="number" class="form-control" name="farm_number" value="<?php echo $result1['farm_number']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="rode" class="form-label">ถนน</label>
                    <input type="text" class="form-control" name="rode" value="<?php echo $result1['rode']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="tumbon" class="form-label">ตำบล</label>
                    <input type="text" class="form-control" name="tumbon" value="<?php echo $result1['tumbon']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="district" class="form-label">อำเภอ</label>
                    <input type="text" class="form-control" name="district" value="<?php echo $result1['district']; ?>">
                </div>
                <div class="col-md-6">
                    <label for="province" class="form-label">จังหวัด</label>
                    <input type="text" class="form-control" name="province" value="<?php echo $result1['province']; ?>">
                </div>
                <div class="mindphp">
                    <label for="id">ไอดีแก้ไข</label><br />
                    <select name="id" class=" form-select">
                        <option><?php echo $row1['id']; ?></option>
                    </select>
                </div>

                <br />

                <div class="input-group">
                    <button type="submid" name="sub_ed" class="btn btn-warning">แก้ไขข้อมูล</button>
                </div>


            </form><br />
            <a href="personal_information.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>

</body>

</html>