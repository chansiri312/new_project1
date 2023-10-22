<?php
session_start();
include('server.php');
$errors = array();



if (isset($_POST['sub_chemical'])) {
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $name_medical = mysqli_real_escape_string($conn, $_POST['name_medical']);
  $buy_medical = mysqli_real_escape_string($conn, $_POST['buy_medical']);
  $use_medical = mysqli_real_escape_string($conn, $_POST['use_medical']);
  $name_chemical = mysqli_real_escape_string($conn, $_POST['name_chemical']);
  $buy_chemical = mysqli_real_escape_string($conn, $_POST['buy_chemical']);
  $use_chemical = mysqli_real_escape_string($conn, $_POST['use_chemical']);
  $note = mysqli_real_escape_string($conn, $_POST['note']);
  $con_name = mysqli_real_escape_string($conn, $_POST['con_name']);




  $query2 = "SELECT * FROM receivingchemicals where name_medical = '$name_medical' ";
  $result2 = mysqli_query($conn,$query2);


  echo $query2 ;


  if (count($errors) == 0) {

   

      $sql = "INSERT INTO receivingchemicals(date, name_medical , buy_medical , use_medical, total_medical , name_chemical , buy_chemical , use_chemical ,total_chemical, note , recorder_name ) 
      VALUES('$date','$name_medical','$buy_medical','$use_medical','$buy_medical' - '$use_medical','$name_chemical','$buy_chemical','$use_chemical','$buy_chemical'-'$use_chemical','$note','$con_name') ";
mysqli_query($conn, $sql);
header('location: data_receivingChemicals.php');

  


  } else {
    array_push($errors, "Username or Email already exists ");
    $_SESSION['error'] = "Username or Email already exists";
    header("location: register.php");
  }
}

$sql = "DELETE FROM receivingchemicals WHERE id = '" . $_GET['CusID'] . "'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("location: data_receivingChemicals.php");
} else {
  echo "Error deleting record: " . $conn->error;
}
