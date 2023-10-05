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


$sql = "select * from maternalreproduction where recorder_name = '" . $_SESSION['username'] . "'";
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
                <a class="text-light  navbar-brand" href="index.php">
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
    <?php
    ini_set('display_errors', 1);
    error_reporting(~0);

    $strKeyword = null;

    if (isset($_POST["txtKeyword"])) {
        $strKeyword = $_POST["txtKeyword"];


        $sql = "SELECT * FROM maternalreproduction WHERE num1 LIKE '%" . $strKeyword . "%' ";

        $query = mysqli_query($conn, $sql);
    } else {


        $sql = "select * from maternalreproduction  where recorder_name = '" . $_SESSION['username'] . "'";

        $query = mysqli_query($conn, $sql);
    }
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
                                <h1>ข้อมูลการสืบพันธุ์ของแม่พันธุ์</h1>
                            </i>
                            <br />
                            <table width="700" border="0">
                                <tr>
                                    <th width="92"> <a href="form_maternalReproduction.php"><button type="submid" class="btn btn-success">เพิ่มข้อมูล</button></a></th>
                                    <th width="116"><a href="index.php"><button type="submid" class="btn btn-success">ย้อนกลับ</button>
                                        </a></th>


                                    <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                                        <th width="380">หมายเลขประจำตัว
                                            <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword; ?>">
                                            <input type="submit" value="ค้นหา">
                                        </th>
                                    </form>
                                    <th align="rigth">
                                        <font face="cordia new" size="+2">
                                            <a href="pdf_maternalReproduction.php?num1=<?php echo $strKeyword; ?>" target="blank">
                                                <img src="images/pdf-pic.png" width="36" height="37" /></a>
                                        </font>
                                    </th>
                                </tr>

                            </table>

                            <?php

                            ?>
                            <br /><br />
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ลำดับที่</th>
                                        <th scope="col">หมายเลขประจำตัว</th>
                                        <th scope="col">วัน/เดือน/ปี ที่ผสมพันธุ์</th>
                                        <th scope="col">พ่อพันธุ์ีที่ใช้ผสม</th>
                                        <th scope="col">อายุเมื่อผสมพันธุ์</th>
                                        <th scope="cpl">จัดการ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $item = 1;
                                    while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>
                                        <tr>
                                            <td><?php echo $item ?></td>
                                            <td><?php echo $result['num1']; ?></td>
                                            <td><?php echo $result['date']; ?></td>
                                            <td><?php echo $result['name_dad']; ?></td>
                                            <td><?php echo $result['old']; ?></td>



                                            <td>

                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $result['id'] ?>">
                                                    รายละเอียด
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal<?php echo $result['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการสืบพันธุ์ของแม่พันธุ์</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <p5>หมายเลขประจำตัว : <?php echo $result['num1'] ?></p5>
                                                                    <p5>พันธุ์ : <?php echo $result['gen'] ?></p5>
                                                                    <p5>หมายเลขพ่อ : <?php echo $result['num_dad'] ?></p5>
                                                                    <p5>หมายเลขแม่ : <?php echo $result['num_mom'] ?></p5>
                                                                    <p5>วัน/เดือน/ปี ที่ผสมพันธุ์ : <?php echo $result['date'] ?></p5>
                                                                    <p5>พ่อพันธุ์ีที่ใช้ผสม : <?php echo $result['name_dad'] ?></p5>
                                                                    <p5>อายุเมื่อผสมพันธุ์ : <?php echo $result['old'] ?> ปี</p5>
                                                                    <p5>น้ำหนักเมื่อผสมพันธุ์ : <?php echo $result['birthdate'] ?> กิโลกรัม</p5>
                                                                    <p5>กำหนดวันคลอด : <?php echo $result['birthchild'] ?> วัน</p5><br />
                                                                    <h5>ลูกที่เกิด </h5>
                                                                    <p5>วัน/เดือน/ปี : <?php echo $result['birthday'] ?> </p5>
                                                                    <p5>หมายเลข : <?php echo $result['number'] ?> </p5>
                                                                    <p5>เพศ : <?php echo $result['gender'] ?> </p5>
                                                                    <p5>หมายเหตุ : <?php echo $result['note'] ?> </p5>

                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href='form_edit_maternalReproduction.php?editID=<?php echo $result["id"]; ?>'>
                                                    <button type="submit" class="btn btn-secondary btn-block">แก้ไขข้อมูล</button></a>&nbsp;&nbsp;
                                                <a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='maternalReproductiondb.php?CusID=<?php echo $result["id"]; ?>';}">
                                                    <button type="submit" class="btn btn-danger ">ลบข้อมูล</button></a>
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