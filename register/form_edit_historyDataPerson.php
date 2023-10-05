<?php
include('server.php');
session_start();


$editID = mysqli_real_escape_string($conn, $_GET['editID']);


$query = "select * from historydataperson where id = '$editID' "; //คำสั่งให้เลือกข้อมูลจาก TABLE ชื่อ tbl_member โดยเรียงจาก member_id และให้เรียงลำดับจากมากไปน้อยคือ DESC
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
    <title>แบบบันทึกข้อมูลประวัติการให้ผลผลิต(รายตัว)</title>
    <style>
        .mindphp {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <div class="p-3 mb-2 bg-success text-white">
        <h3 align="center">แบบบันทึกข้อมูลประวัติการให้ผลผลิต(รายตัว)</h3>
        <div style="background-color: rgb(133, 191, 165); width: 100%; height: 90vh;  border-radius: 24px; padding: 20px 18px 30px 18px;" class="mx-auto align-self-center">
            <form action="historyDataPerson_editdb.php" method="post">

               
                <div class="col-md-6">
                    <label for="date">วัน/เดือน/ปี</label><br />
                    <input type="date" class="form-control" name="date" value="<?php echo $row1['date']; ?>">
                </div>



                <div class="col-md-12">
                    <label for="number" class="form-label">ข้อมูลหมายเลขแพะ</label>
                    <input type="number" class="form-control" name="number" value="<?php echo $row1['number']; ?>">
                </div>
                <h3 align="center">ปริมาณของน้ำนม(Kg)</h3>
                <div class="row">

                    <div class="col-md-6">
                        <label for="milk_morning" class="form-label">ข้อมูลปริมาณน้ำนมช่วงเช้า</label>
                        <input type="number" class="form-control" name="milk_morning" value="<?php echo $row1['milk_morning']; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="milk_evening" class="form-label">ข้อมูลปริมาณน้ำนมช่วงเย็น</label>
                        <input type="number" class="form-control" name="milk_evening" value="<?php echo $row1['milk_evening']; ?>">
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
                </div><br />


                <div class="input-group">
                    <button type="submid" class="btn btn-warning">แก้ไขข้อมูล</button>
                </div>
                

            </form><br />
            <a href="data_historyDataPerson.php"><button type="submid" class="btn btn-danger">ย้อนกลับ</button></a>
        </div>
    </div>

</body>

</html>