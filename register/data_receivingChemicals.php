<?php
session_start();
include('server.php');
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location:login.php');
}

if (isset($_GET['login'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('localhost:login.php');
}

$sql = "select * from receivingchemicals  where recorder_name = '" . $_SESSION['username'] . "'";


$result = $conn->query($sql);


$sql1 = "select * from user  where username = '" . $_SESSION['username'] . "'";

$query1 = mysqli_query($conn, $sql1);
$result1 = mysqli_fetch_array($query1, MYSQLI_ASSOC);





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
    <div class="dataMheader">
        <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #006E4D;">
            <div class="container-fluid">
                <a class=" text-light navbar-brand" href="index.php">
                    <img src="362140860_841452967338701_8340761728124446768_n.png" alt="" width="50px" height="50px" class="d-inline-block align-text-">
                    มาตรฐานฟาร์มแพะนม
                </a>
            </div>
            <p class="text-light">
                Welcome <strong><?php echo $result1['farm_name'] ?></strong>
            </p>
            <p><strong><a href="logoutdb.php" style="color: brown">Logout</a></strong></p>
            &nbsp;&nbsp;
        </nav>
    </div>

    <div class="homecontent">
        <div class="row">
            <br />
            <div class="col">
                <div class="card-body-data " style="height:100vh; background :#9ACFBB">
                    <div class="container">
                        <br />
                        <div class="card ">
                            <i class="fa fa-align-center" aria-hidden="true">
                                <h1>ข้อมูลการรับ-จ่ายเวชภัณฑ์และสารเคมี</h1>
                            </i>
                            <br />

                            <div class="row">
                                <div class="col">
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="form_receivingChemicals.php"><button type="submid" class="btn btn-success">เพิ่มข้อมูล</button></a>
                                    &nbsp;&nbsp;
                                    <a href="index.php"><button type="submid" class="btn btn-success">ย้อนกลับ</button></a>
                                </div>
                            </div>
                            <br /><br />

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ลำดับที่</th>
                                        <th scope="col">วันที่ซื้อ</th>
                                        <th scope="col">ชื่อเวชภัณฑ์</th>
                                        <th scope="col">จำนวน</th>
                                        <th scope="col">คงเหลือ เวชภัณฑ์</th>
                                        <!-- <th scope="col">ชื่อสารเคมี</th>
                                        <th scope="col">จำนวน</th>
                                        <th scope="col">คงเหลือ สารเคมี</th> -->
                                        <th scope="cpl">จัดการ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $item = 1;
                                    while ($row = $result->fetch_assoc()) : 
                                        // $sql="buy_medical" -"use_medical" ;
                                        // $result=mysqli_query($conn ,$sql);
                                        // echo $row[$sql];?>
                                        
                                        <tr>
                                            <td><?php echo $item ?></td>
                                            <td><?php echo $row['date']; ?></td>

                                            <td><?php echo $row['name_medical']; ?></td>
                                            <td><?php echo $row['buy_medical']; ?></td>
                                            <td><?php echo $row['total_medical']; ?></td>
                                            <!-- <td><?php echo $row['name_chemical']; ?></td>
                                            <td><?php echo $row['buy_chemical']; ?></td>
                                            <td><?php echo $row['total_chemical']; ?></td> -->




                                            <td>

                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id'] ?>">
                                                    รายละเอียด
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการรับ-จ่ายเวชภัณฑ์และสารเคมี</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <p5>วัน/เดือน/ปี : <?php echo $row['date'] ?></p5>
                                                                    <p5>ชื่อเวชภัณฑ์ : <?php echo $row['name_medical'] ?></p5>
                                                                    <p5>จำนวนที่ซื้อ : <?php echo $row['buy_medical'] ?> </p5>
                                                                    <p5>จำนวนที่ใช้ : <?php echo $row['use_medical'] ?> </p5>
                                                        
                                                                    <p5>คงเหลือ : <?php echo $row['total_medical'] ?> </p5>
                                                                    <p5>ชื่อสารเคมี : <?php echo $row['name_chemical'] ?> </p5>

                                                                    <p5>จำนวนที่ซื้อ : <?php echo $row['buy_chemical'] ?> </p5>
                                                                    <p5>จำนวนที่ใช้ : <?php echo $row['use_chemical'] ?> </p5>
                                                                    <p5>คงเหลือ : <?php echo $row['total_chemical'] ?> </p5>
                                                                    <p5>หมายเหตุ : <?php echo $row['note'] ?> </p5>

                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href='form_edit_receivingChemicals.php?editID=<?php echo $row["id"]; ?>'>
                                                    <button type="submit" class="btn btn-secondary btn-block">แก้ไขข้อมูล</button></a>&nbsp;&nbsp;
                                                <a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='receivingChemicalsdb.php?CusID=<?php echo $row["id"]; ?>';}">
                                                    <button type="submit" class="btn btn-danger ">ลบข้อมูล</button></a>
                                            </td>

                                        </tr>
                                        <?php $item++; ?>

                                    <?php endwhile ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- notification message -->
    <!-- <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>

                </h3>

            </div> -->

    <!-- <?php endif ?> -->



    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>