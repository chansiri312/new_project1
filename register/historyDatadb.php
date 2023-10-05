<?php
session_start();
include('server.php');
$errors = array();



if (isset($_POST['sub_his'])) {
  $number = mysqli_real_escape_string($conn, $_POST['number']);
  $num_milk = mysqli_real_escape_string($conn, $_POST['num_milk']);
  $num_date_history = mysqli_real_escape_string($conn, $_POST['num_date_history']);
  $milk = mysqli_real_escape_string($conn, $_POST['milk']);
  $note = mysqli_real_escape_string($conn, $_POST['note']);
  $con_name = mysqli_real_escape_string($conn, $_POST['con_name']);


  if (count($errors) == 0) {

    $sql = "INSERT INTO historydata (number , num_milk , num_date_history , milk , note ,  recorder_name) 
            VALUES('$number','$num_milk','$num_date_history','$milk','$note','$con_name') ";
    mysqli_query($conn, $sql);

    header('location: data_historyData.php');
  } else {
    array_push($errors, "Username or Email already exists ");
    $_SESSION['error'] = "Username or Email already exists";
    header("location: register.php");
  }
}

$sql = "DELETE FROM historydata WHERE id = '" . $_GET['CusID'] . "'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("location: data_historyData.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

?>
