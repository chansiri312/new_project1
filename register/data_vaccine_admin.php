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

$sql = "select * from vaccine  where recorder_name = '" . $_SESSION['username'] . "'";



$result = $conn->query($sql);


$sql1 = "select * from user  where username = '" . $_SESSION['username'] . "'";

$query1 = mysqli_query($conn, $sql1);
$result1 = mysqli_fetch_array($query1, MYSQLI_ASSOC);

$sql2 = "select * from user where userlevel ='M' ";
$result2 = $conn->query($sql2);


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
                <a class="text-light  navbar-brand" href="index.php">
                    <img src="362140860_841452967338701_8340761728124446768_n.png" alt="" width="50px" height="50px" class="d-inline-block align-text-">
                    มาตรฐานฟาร์มแพะนม
                </a>
            </div>
            <p class="text-light">
            Welcome Admin <strong><?php echo $_SESSION['username'] ?></strong>
            </p>
            <p><strong><a href="logoutdb.php" style="color: brown">Logout</a></strong></p>
            &nbsp;&nbsp;
        </nav>
    </div>
    <?php
    ini_set('display_errors', 1);
    error_reporting(~0);

    $strKeyword = null;

    if (isset($_POST["txtKeyword"])) {
        $strKeyword = $_POST["txtKeyword"];


        $sql = "SELECT * FROM vaccine WHERE number LIKE '%" . $strKeyword . "%' ";

        $query = mysqli_query($conn, $sql);
    } else


        $sql = "select * from vaccine  where recorder_name = '" . $_GET['id'] . "'";

    $query = mysqli_query($conn, $sql);
    //}
    ?>


<div class="homecontent">
        <div class="row">
            <br />
            <div class="col">
                <div class="card-body-data " style="height:100vh; background :#9ACFBB">
                    <div class="container">
                        <br />
                        <div class="card ">
                            <i class="fa fa-align-center" aria-hidden="true">
                                <h1>ข้อมูลการใช้วัคซีน-การถ่ายพยาธิ(ทั้งฝูง)</h1>
                            </i>
                            <br />
                            <table width="573" border="0">
                                <?php $row = $result2->fetch_assoc()  ?>


                                <tr>

                                    <th width="116"><a href="index_admin.php?id=<?php echo $row['username']; ?>"><button type="submid" class="btn btn-success">ย้อนกลับ</button>
                                        </a></th>





                                    <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                                        <th width="343">ชื่อวัคซีน
                                            <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword; ?>">
                                            <input type="submit" value="ค้นหา">
                                        </th>
                                    </form>
                                </tr>


                            </table>
                            

                            <?php

                            ?>
                            <br /><br />

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ลำดับที่</th>
                                        <th scope="col">วันที่</th>
                                        <th scope="col">ชื่อวัคซีน</th>
                                        <th scope="col">จำนวนแพะ</th>
                                        <th scope="col">ชื่อยาถ่ายพยาธิ</th>
                                        <th scope="col">จำนวนแพะ</th>

                                        <th scope="cpl">จัดการ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $item = 1;
                                     while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>
                                        <tr>
                                            <td><?php echo $item ?></td>
                                            <td><?php echo $row['date']; ?></td>

                                            <td><?php echo $row['name_vaccine']; ?></td>

                                            <td><?php echo $row['num_goat']; ?></td>
                                            <td><?php echo $row['name_mediacal']; ?></td>
                                            <td><?php echo $row['num_gost1']; ?></td>



                                            <td>

                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id'] ?>">
                                                    รายละเอียด
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการใช้วัคซีน-การถ่ายพยาธิ(ทั้งฝูง)</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <p5>วัน/เดือน/ปี : <?php echo $row['date'] ?></p5>
                                                                    <p5>คอก/ฝูง : <?php echo $row['stall'] ?></p5>
                                                                    <h5>การใช้วัคซีน </h5>
                                                                    <p5>ชื่อวัคซีน : <?php echo $row['name_vaccine'] ?> </p5>
                                                                    <p5>จำนวนแพะ : <?php echo $row['num_goat'] ?> ตัว</p5><br />

                                                                    <h5>การถ่ายพยาธิ </h5>
                                                                    <p5>ชื่อยา : <?php echo $row['name_mediacal'] ?> </p5>
                                                                    <p5>จำนวนแพะ : <?php echo $row['num_gost1'] ?> ตัว</p5><br />
                                                                    <p5>การตรวจโรคบรูเซลโลซีส : <?php echo $row['examination'] ?> </p5>
                                                                    <p5>ผู้ปฏิบัติงาน : <?php echo $row['operator'] ?> </p5>
                                                                    <p5>ผู้ควบคุม : <?php echo $row['controller'] ?> </p5>





                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </td>

                                        </tr>
                                        <?php $item++ ?>

                                    <?php } ?>

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