<?php
session_start();
include('server.php');
$errors = array();



if (isset($_POST['sub_supplies'])) {
  $medical_supplies = mysqli_real_escape_string($conn, $_POST['medical_supplies']);
  


  if (count($errors) == 0) {

    $sql = "INSERT INTO supplies ( medical_supplies ) 
            VALUES('$medical_supplies') ";
    mysqli_query($conn, $sql);



    header('location: admin_data_maternal.php');
  } else {
    array_push($errors, "Username or Email already exists ");
    $_SESSION['error'] = "Username or Email already exists";
    header("location: register.php");
  }
}

$sql = "DELETE FROM supplies WHERE medical_supplies = '" . $_GET['CusID'] . "'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("location: admin_data_maternal.php");
} else {
  echo "Error deleting record: " . $conn->error;
}
