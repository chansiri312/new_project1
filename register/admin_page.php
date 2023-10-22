<?php

session_start();

if ($_SESSION['username'] == "") {

    echo "Please Login!";

    exit();
}



if ($_SESSION['userlevel'] != "A") {

    echo "This page for Admin only!";

    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>

    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body>
    <div class="dataMheader">
        <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #006E4D;">
            <div class="container-fluid">
                <a class="text-light navbar-brand" href="index_admin.php" >
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



    <div class="card-body" style="width: 380px; height: 110vh ">
    <nav id="navbar-example3" class="navbar navbar-light bg-light flex-column align-items-stretch p-3">
        <nav class="nav nav-pills flex-column">
          
          <a class="nav-link" href="#item-2"><font size="+2">จัดการข้อมูลเบื้องต้น</font></a>
          <nav class="nav nav-pills flex-column">
            <a class="nav-link ms-3 my-1" href="admin_data_user.php"
              ><font size="+1" color="black">ผู้ใช้งานระบบ</font></a
            ><a class="nav-link ms-3 my-1" href="admin_data_admin.php"
              ><font size="+1" color="black">ผู้ดูแลระบบ</font></a
            >
            <a class="nav-link ms-3 my-1" href="admin_data_gengoat.php"
              ><font size="+1" color="black">พันธุ์แพะนม</font></a
            >
            <a class="nav-link ms-3 my-1" href="admin_data_chemical.php"
              ><font size="+1" color="black">สารเคมี</font></a
            >
            <a class="nav-link ms-3 my-1" href="admin_data_maternal.php"
              ><font size="+1" color="black">ยาเวชภัณฑ์</font></a
            >
            <a class="nav-link ms-3 my-1" href="admin_data_medical.php"
              ><font size="+1" color="black">ยาถ่ายพยาธิ</font></a
            >
            <a class="nav-link ms-3 my-1" href="admin_data_vaccine.php"
              ><font size="+1" color="black">วัคซีน</font></a
            >
          </nav>
          
        </nav>
      </div>
    </nav>


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

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>