<?php
session_start();
include('server.php');
$errors = array();



if (isset($_POST['sub_medi'])) {
  $name_medicals = mysqli_real_escape_string($conn, $_POST['name_medicals']);
  


  if (count($errors) == 0) {

    $sql = "INSERT INTO medical ( name_medicals ) 
            VALUES('$name_medicals') ";
    mysqli_query($conn, $sql);



    header('location: admin_data_medical.php');
  } else {
    array_push($errors, "Username or Email already exists ");
    $_SESSION['error'] = "Username or Email already exists";
    header("location: register.php");
  }
}

$sql = "DELETE FROM medical WHERE name_medicals = '" . $_GET['CusID'] . "'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("location: admin_data_medical.php");
} else {
  echo "Error deleting record: " . $conn->error;
}
