<?php
session_start();
include('server.php');
$errors = array();



if (isset($_POST['sub_vac'])) {
  
  $vaccine = mysqli_real_escape_string($conn, $_POST['vaccine']);
 
 


  if (count($errors) == 0) {

    $sql = "INSERT INTO name_vaccine ( vaccine ) 
            VALUES('$vaccine') ";
    mysqli_query($conn, $sql);



    header('location: admin_data_vaccine.php');
  } else {
    array_push($errors, "Username or Email already exists ");
    $_SESSION['error'] = "Username or Email already exists";
    header("location: register.php");
  }
}

$sql = "DELETE FROM name_vaccine WHERE vaccine = '" . $_GET['CusID'] . "'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("location: admin_data_vaccine.php");
} else {
  echo "Error deleting record: " . $conn->error;
}
