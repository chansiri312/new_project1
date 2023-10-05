<?php
session_start();
include('server.php');
$errors = array();



if (isset($_POST['sub_chemi'])) {
  
  $chemicals = mysqli_real_escape_string($conn, $_POST['chemicals']);
 
 


  if (count($errors) == 0) {
    $password = md5($password);

    $sql = "INSERT INTO chemical ( chemicals ) 
            VALUES('$chemicals') ";
    mysqli_query($conn, $sql);



    header('location: admin_data_chemical.php');
  } else {
    array_push($errors, "Username or Email already exists ");
    $_SESSION['error'] = "Username or Email already exists";
    header("location: register.php");
  }
}

$sql = "DELETE FROM chemical WHERE chemicals = '" . $_GET['CusID'] . "'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("location: admin_data_chemical.php");
} else {
  echo "Error deleting record: " . $conn->error;
}
