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


$sql = "select * from user where userlevel ='A' ";
$result = $conn->query($sql);

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
                <a class="text-light navbar-brand" href="index.php">
                    <img src="362140860_841452967338701_8340761728124446768_n.png" alt="" width="50px" height="50px" class="d-inline-block align-text-">
                    มาตรฐานฟาร์มแพะนม
                </a>
            </div>
            <p>
                Welcome Admin <strong><?php echo $_SESSION['username'] ?></strong>
            </p>
            <p><strong><a href="logoutdb.php" style="color: brown">Logout</a></strong></p>
            &nbsp;&nbsp;
        </nav>
    </div>
    <div class="dataMheader">


        <div class="row">
            <br />
            <div class="col">
                <div class="card-body-data " style="height:100vh; background :#9ACFBB">
                    <div class="container">
                        <br />
                        <div class="card ">
                            <i class="fa fa-align-center" aria-hidden="true">
                                <h1>รายการข้อมูล ผู้ใช้งานระบบ</h1>
                            </i>
                            <br />
                            <div class="row">
                                <div class="col">
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="admin_add_user.php"><button type="submid" class="btn btn-success">เพิ่มข้อมูล</button></a>
                                    &nbsp;&nbsp;
                                    <a href="admin_page.php"><button type="submid" class="btn btn-success">ย้อนกลับ</button></a>
                                </div>
                            </div>
                            <br /><br />

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col">user</th>
                                        <th scope="col">เลขทะเบียนฟาร์ม</th>
                                        <th scope="col">ชื่อเจ้าของฟาร์ม</th>
            
                                        <th scope="col">จัดการ</th>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()) : ?>
                                        <tr>
                                            

                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['number_farm']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            
                                            <td><a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='admin_adddb.php?CusID=<?php echo $row["id"]; ?>';}">
                                                    <button type="submit" class="btn btn-danger">ลบข้อมูล</button></a>
												
												&nbsp;&nbsp;
                                                    
                                                <a href='index_admin.php?id=<?php echo $row['username']; ?>'><button type="submid" class="btn btn-success">ดูข้อมูล</button></a>
                                                    
                                            </td>

                                        </tr>

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

<?php endif ?>



</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>