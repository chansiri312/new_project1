<?php
session_start();
include('server.php');
$errors = array();



if (isset($_POST['sub_add'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
  $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
  $ืname = mysqli_real_escape_string($conn, $_POST['name']);
  $userlevel = mysqli_real_escape_string($conn, $_POST['userlevel']);


  if (empty(($password_1))) {
    array_push($errors, "Password is required");
  }

  if ($password_1 != $password_2) {
    array_push($errors, "รหัสไม่ตรงกัน");
  }


  if (count($errors) == 0) {
    $password = md5($password1);

    $sql = "INSERT INTO user (username , password , name , userlevel ) 
            VALUES('$username','$password','$name','$userlevel') ";
    mysqli_query($conn, $sql);


    header('location: admin_data_user.php');
  } else {
    array_push($errors, "Username or Email already exists ");
    $_SESSION['error'] = "Username or Email already exists";
    header("location: register.php");
  }
}

$sql = "DELETE FROM user WHERE id = '" . $_GET['CusID'] . "'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("location: admin_data_user.php");
} else {
  echo "Error deleting record: " . $conn->error;
}
