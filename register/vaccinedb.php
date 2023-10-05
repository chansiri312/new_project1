<?php
session_start();
include('server.php');
$errors = array();



if (isset($_POST['sub_vacc'])) {
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $stall = mysqli_real_escape_string($conn, $_POST['stall']);
  $name_vaccine = mysqli_real_escape_string($conn, $_POST['name_vaccine']);
  $num_goat = mysqli_real_escape_string($conn, $_POST['num_goat']);
  $name_mediacal = mysqli_real_escape_string($conn, $_POST['name_mediacal']);
  $num_goat1 = mysqli_real_escape_string($conn, $_POST['num_goat1']);
  $examination = mysqli_real_escape_string($conn, $_POST['examination']);
  $operator = mysqli_real_escape_string($conn, $_POST['operator']);
  $controller = mysqli_real_escape_string($conn, $_POST['controller']);
  $con_name = mysqli_real_escape_string($conn, $_POST['con_name']);


  if (count($errors) == 0) {

    $sql = "INSERT INTO vaccine (date , stall , name_vaccine , num_goat , name_mediacal , num_gost1 , examination , operator , controller , recorder_name) 
            VALUES('$date','$stall','$name_vaccine','$num_goat','$name_mediacal','$num_goat1','$examination','$operator','$controller','$con_name') ";
    mysqli_query($conn, $sql);



    header('location: data_vaccine.php');
  } else {
    array_push($errors, "Username or Email already exists ");
    $_SESSION['error'] = "Username or Email already exists";
    header("location: register.php");
  }
}

$sql = "DELETE FROM vaccine WHERE id = '" . $_GET['CusID'] . "'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("location: data_vaccine.php");
} else {
  echo "Error deleting record: " . $conn->error;
}


