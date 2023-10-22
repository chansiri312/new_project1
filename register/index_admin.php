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
if (isset($_SESSION['userlevel']) == 'M') {
}

$id = $_GET['id'];

$sql1 = "select * from user  where username = '" . $_GET['id'] . "'";

$query1 = mysqli_query($conn, $sql1);
$result1 = mysqli_fetch_array($query1, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>

  <link rel="stylesheet" href="style.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body>
  <div class="dataMheader">
    <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #006E4D;">
      <div class="container-fluid">
        <a class="text-light navbar-brand" href="admin_page.php">
          <img src="362140860_841452967338701_8340761728124446768_n.png" alt="" width="50px" height="50px" class="d-inline-block align-text-">
          มาตรฐานฟาร์มแพะนม
        </a>
      </div>
      <p class="text-light">
        Welcome Admin <strong><?php echo $_SESSION['username'] ?></strong>
      </p>&nbsp;&nbsp;&nbsp;&nbsp;
      <p><strong><a href="logoutdb.php" style="color: brown">Logout</a></strong></p>
      &nbsp;&nbsp;
    </nav>
  </div>
  <div class="row">
    <div class="col-md-5">
      <div class="card-body" style="width: 380px; height: 110vh ">
        <nav id="navbar-example3" class="navbar navbar-light bg-light flex-column align-items-stretch p-3">
          <nav class="nav nav-pills flex-column">

            <a class="nav-link" href="#item-2">
              <font size="+2">จัดการข้อมูลฟาร์ม</font>
            </a>
            <nav class="nav nav-pills flex-column">
              <a class="nav-link ms-3 my-1" href="data_Management_admin.php?id=<?php echo $id ?>">
                <font size="+1" color="black">แบบบันทึกข้อมูลทะเบียนประวัติแพะนม</font>
              </a>
              <a class="nav-link ms-3 my-1" href="data_historyData_admin.php?id=<?php echo $id ?>">
                <font size="+1" color="black">แบบบันทึกข้อมูลประวัติการให้ผลผลิต(รายฟาร์ม)</font>
              </a>
              <a class="nav-link ms-3 my-1" href="data_historyDataPerson_admin.php?id=<?php echo $id ?>">
                <font size="+1" color="black">แบบบันทึกข้อมูลประวัติการให้ผลผลิต(รายตัว)</font>
              </a>
              <a class="nav-link ms-3 my-1" href="data_maternalReproduction_admin.php?id=<?php echo $id ?>">
                <font size="+1" color="black">แบบบันทึกข้อมูลการสืบพันธุ์ของแม่พันธุ์</font>
              </a>
              <a class="nav-link ms-3 my-1" href="data_receivingChemicals_admin.php?id=<?php echo $id ?>">
                <font size="+1" color="black">แบบบันทึกข้อมูลการการรับ-จ่ายเวชภัณฑ์และสารเคมี</font>
              </a>
              <a class="nav-link ms-3 my-1" href="data_vaccine_admin.php?id=<?php echo $id ?>">
                <font size="+1" color="black">แบบบันทึกข้อมูลการใช้วัคซีน-การถ่ายพยาธิ(ทั้งฝูง)</font>
              </a>
              <a class="nav-link ms-3 my-1" href="data_treatment_admin.php?id=<?php echo $id ?>">
                <font size="+1" color="black">แบบบันทึกข้อมูลการรักษาโรค</font>
              </a>
              <a class="nav-link ms-3 my-1" href="data_farmAccount_admin.php?id=<?php echo $id ?>">
                <font size="+1" color="black">แบบบันทึกข้อมูลบัญชีฟาร์ม</font>
              </a>
              <a class="nav-link ms-3 my-1" href="data_workman_admin.php?id=<?php echo $id ?>">
                <font size="+1" color="black">แบบบันทึกประวัติบุคลากร</font>
              </a>
            </nav>

      </div>
    </div>


    <div class="col-md-6" align="3">
       <img src="../register/images/_103204377_mediaitem103204376.jpg">

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