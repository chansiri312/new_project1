<?php
session_start();
include('server.php');
$errors = array();



if (isset($_POST['sub_treat'])) {
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $number = mysqli_real_escape_string($conn, $_POST['number']);
  $health = mysqli_real_escape_string($conn, $_POST['health']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $treatment = mysqli_real_escape_string($conn, $_POST['treatment']);
  $treat = mysqli_real_escape_string($conn, $_POST['treat']);
  $note = mysqli_real_escape_string($conn, $_POST['note']);
  $con_name = mysqli_real_escape_string($conn, $_POST['con_name']);


  if (count($errors) == 0) {

    $sql = "INSERT INTO treatment (date , number , health , gender , treatment , treat , note , recorder_name) 
            VALUES('$date','$number','$health','$gender','$treatment','$treat','$note','$con_name') ";
    mysqli_query($conn, $sql);



    header('location: data_treatment.php');
  } else {
    array_push($errors, "Username or Email already exists ");
    $_SESSION['error'] = "Username or Email already exists";
    header("location: register.php");
  }
}

$sql = "DELETE FROM treatment WHERE id = '" . $_GET['CusID'] . "'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("location: data_treatment.php");
} else {
  echo "Error deleting record: " . $conn->error;
}


