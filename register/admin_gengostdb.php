<?php
session_start();
include('server.php');
$errors = array();



if (isset($_POST['sub_addgengost'])) {
  $gengost = mysqli_real_escape_string($conn, $_POST['gengost']);
  


  if (count($errors) == 0) {

    $sql = "INSERT INTO gengost ( gen_gost ) 
            VALUES('$gengost') ";
    mysqli_query($conn, $sql);



    header('location: admin_data_gengoat.php');
  } else {
    array_push($errors, "Username or Email already exists ");
    $_SESSION['error'] = "Username or Email already exists";
    header("location: register.php");
  }
}

$sql = "DELETE FROM gengost WHERE gen_gost = '" . $_GET['CusID'] . "'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("location: admin_data_gengoat.php");
} else {
  echo "Error deleting record: " . $conn->error;
}
