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

// $sql = "select * from datamanagement  where recorder_name = '" . $_SESSION['username'] . "'";


// $result = $conn->query($sql);




$sql1 = "select * from user  where username = '" . $_SESSION['username'] . "'";

$query1 = mysqli_query($conn, $sql1);
$result1 = mysqli_fetch_array($query1, MYSQLI_ASSOC);



if ($result1["userlevel"] == 'A') {
    header("location:data_Management_admin.php");
}




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
                ยินดีต้อนรับ <strong><?php echo $result1['farm_name']; ?></strong>
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
                                <h1>รายละเอียดฟาร์ม</h1>
                            </i>
                            <br />
                            <table width="300" border="0">
                                <tr>
                                    <th width="92"> <a href="form_edit_personal_information.php?id=<?php echo $result1["id"]; ?>'"><button type="submid" class="btn btn-success">แก้ไขข้อมูล</button></a></th>
                                    <th width="120"><a href="index.php"><button type="submid" class="btn btn-success">ย้อนกลับ</button></a></th>
                                </tr>

                            </table>
                            <br />





                            <?php

                            ?>
                            <br /><br />

                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <strong>
                                            <font size="+1"> ชื่อฟาร์ม :
                                        </strong> <?php echo $result1['farm_name']; ?></font>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <strong>
                                            <font size="+1"> อีเมล :
                                        </strong> <?php echo $result1['email']; ?></font>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <strong>
                                            <font size="+1"> เลขทะเบียนฟาร์ม :
                                        </strong> <?php echo $result1['number_farm']; ?></font>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <strong>
                                            <font size="+1"> ชื่อเจ้าของฟาร์ม :
                                        </strong> <?php echo $result1['name']; ?></font>
                                    </div>
                                </div>
                                <strong>
                                    <font size="+1"> ที่อยู่ฟาร์ม
                                </strong> </font>

                                <div class="row">
                                    <div class="col">
                                        <strong>
                                            <font size="+1"> ฟาร์มเลขที่ :
                                        </strong> <?php echo $result1['farm_number']; ?></font>
                                    </div>
                                    <div class="col">
                                        <strong>
                                            <font size="+1"> ถนน :
                                        </strong> <?php echo $result1['rode']; ?></font>
                                    </div>
                                    <div class="col">
                                        <strong>
                                            <font size="+1"> ตำบล :
                                        </strong> <?php echo $result1['tumbon']; ?></font>
                                    </div>


                                    <div class="col">
                                        <strong>
                                            <font size="+1"> อำเภอ :
                                        </strong> <?php echo $result1['district']; ?></font>
                                    </div>
                                    <div class="col">
                                        <strong>
                                            <font size="+1"> จังหวัด :
                                        </strong> <?php echo $result1['province']; ?></font>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
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

<?php endif ?>



</div>



<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>