<?php
session_start();
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

$id=$_GET['id'];



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
        <a class="text-light navbar-brand" href="index.php">
          <img src="362140860_841452967338701_8340761728124446768_n.png" alt="" width="50px" height="50px" class="d-inline-block align-text-">
          มาตรฐานฟาร์มแพะนม
        </a>
      </div>
      <p class="text-light">
        Welcome <strong><?php echo $_SESSION['username'] ?></strong>
      </p>
      <p><strong><a href="logoutdb.php" style="color: brown">Logout</a></strong></p>
      &nbsp;&nbsp;
    </nav>
  </div>
  <div class="row">
    <div class="col-md-3">
      <div class="card-body" style="width: 380px; height: 110vh ">
        <nav id="navbar-example3" class="navbar navbar-light bg-light flex-column align-items-stretch p-3">
          <nav class="nav nav-pills flex-column">
            <a class="nav-link" href="#item-1">Desdboard</a>
            <a class="nav-link" href="#item-2">การจัดการข้อมูลพื้นฐาน</a>
            <nav class="nav nav-pills flex-column">
              <a class="nav-link ms-3 my-1" href="data_Management_admin.php?id=<?php echo $id ?>">แบบบันทึกข้อมูลทะเบียนประวัติแพะนม</a>
              <a class="nav-link ms-3 my-1" href="data_historyData_admin.php?id=<?php echo $id ?>">แบบบันทึกข้อมูลประวัติการให้ผลผลิต(รายฟาร์ม)</a>
              <a class="nav-link ms-3 my-1" href="data_historyDataPerson.php">แบบบันทึกข้อมูลประวัติการให้ผลผลิต(รายตัว)</a>
              <a class="nav-link ms-3 my-1" href="data_maternalReproduction.php">แบบบันทึกข้อมูลการสืบพันธุ์ของแม่พันธุ์</a>
              <a class="nav-link ms-3 my-1" href="data_receivingChemicals.php">แบบบันทึกข้อมูลการการรับ-จ่ายเวชภัณฑ์และสารเคมี</a>
              <a class="nav-link ms-3 my-1" href="data_vaccine.php">แบบบันทึกข้อมูลการใช้วัคซีน-การถ่ายพยาธิ(ทั้งฝูง)</a>
              <a class="nav-link ms-3 my-1" href="data_treatment.php">แบบบันทึกข้อมูลการรักษาโรค</a>
              <a class="nav-link ms-3 my-1" href="data_farmAccount.php">แบบบันทึกข้อมูลบัญชีฟาร์ม</a>
              <a class="nav-link ms-3 my-1" href="data_workman.php">แบบบันทึกประวัติบุคลากร</a>
            </nav>
            <a class="nav-link" href="#item-3">ข้อมูลแพะนม</a>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="container">
        <div class="row">
          <div class="col col-sm-12">
            <div class="alert alert-primary" role="alert">
              <h4 align='center'>Dashboard</h4>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6 col-sm-3">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
              <div class="card-header">
                <ion-icon name="people-outline"></ion-icon>
                รายการ
              </div>
              <div class="card-body">
                <h5 class="card-title">จำนวน ตัว</h5>
                <p class="card-text">
                  <a href="https://devbanban.com/?p=4425" class="text-white" style="text-decoration: none;"> more detail...</a>
                </p>
              </div>
            </div>
          </div>

          <div class="col-6 col-sm-3">
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
              <div class="card-header">
                <ion-icon name="cart-outline"></ion-icon>
                รายการ
              </div>
              <div class="card-body">
                <h5 class="card-title">จำนวน ตัว</h5>
                <p class="card-text">
                  <a href="https://devbanban.com/?p=2867" class="text-white" style="text-decoration: none;"> more detail...</a>
                </p>
              </div>
            </div>
          </div>


          <div class="col-6 col-sm-3">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
              <div class="card-header">
                <ion-icon name="desktop-outline"></ion-icon>
                รายการ
              </div>
              <div class="card-body">
                <h5 class="card-title">จำนวน ตัว</h5>
                <p class="card-text">
                  <a href="https://devbanban.com/?p=4425" class="text-white" style="text-decoration: none;"> more detail...</a>
                </p>
              </div>
            </div>
          </div>

          <div class="col-6 col-sm-3">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
              <div class="card-header">
                <ion-icon name="cash-outline"></ion-icon>
                รายการ
              </div>
              <div class="card-body">
                <h5 class="card-title"> ตัว</h5>
                <p class="card-text">
                  <a href="https://devbanban.com/?p=2867" class="text-white" style="text-decoration: none;"> more detail...</a>
                </p>
              </div>
            </div>
          </div>
        </div> <!-- //row -->

        <div class="row">
          <div class="col-sm-12">

            <canvas id="myChart" height="100px"></canvas>
            <script>
              var ctx = document.getElementById("myChart").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: ['2022', '2021', '2020', '2019'],
                  datasets: [{
                    label: 'รายงานภาพรวม แยกตามปี (บาท)',
                    data: ['1000000', '2500000', '5000000', '3000000'],
                    backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                      'rgba(255,99,132,1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    yAxes: [{
                      ticks: {
                        beginAtZero: true
                      }
                    }]
                  }
                }
              });
            </script>

          </div>
        </div> <!-- //row -->
      </div> <!-- //container -->
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <!-- ionicon -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      <!--

      </nav>
    </div>
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