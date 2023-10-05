<?php
session_start();
include('server.php');
$errors = array();



if (isset($_POST['sub_add'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $userlevel = mysqli_real_escape_string($conn, $_POST['userlevel']);
 


  if (count($errors) == 0) {
    $password = md5($password);

    $sql = "INSERT INTO user (username , password , userlevel ) 
            VALUES('$username','$password','$userlevel') ";
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
