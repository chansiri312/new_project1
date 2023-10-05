<?php
session_start();
include('server.php');
$errors = array();



if (isset($_POST['sub_datamanag'])) {
  $GoatNumber = mysqli_real_escape_string($conn, $_POST['GoatNumber']);
  $Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
  $MilkGoatBreed = mysqli_real_escape_string($conn, $_POST['MilkGoatBreed']);
  $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
  $Weight = mysqli_real_escape_string($conn, $_POST['Weight']);
  $Father = mysqli_real_escape_string($conn, $_POST['Father']);
  $Mother = mysqli_real_escape_string($conn, $_POST['Mother']);
  $birthday_milk = mysqli_real_escape_string($conn, $_POST['birthday_milk']);
  $Weight_milk = mysqli_real_escape_string($conn, $_POST['Weight_milk']);
  $Note = mysqli_real_escape_string($conn, $_POST['Note']);
  $con_name = mysqli_real_escape_string($conn, $_POST['con_name']);


  $sql = "INSERT INTO datamanagement (number , gender , breed , birthday , weight , father , mother , birthday_milk , weight_milk , note , recorder_name) 
            VALUES('$GoatNumber','$Gender','$MilkGoatBreed','$birthday','$Weight','$Father','$Mother','$birthday_milk','$Weight_milk','$Note','$con_name') ";
  mysqli_query($conn, $sql);

  if ($sql) {
    echo "<script type='text/javascript'>";
    echo "alert('edit Success');";
    echo "window.location = 'data_Management.php'; ";
    echo "</script>";
  } else {
    array_push($errors, "Username or Email already exists ");
    $_SESSION['error'] = "Username or Email already exists";
    header("location: register.php");
  }
}

{
$sql = "DELETE FROM datamanagement WHERE id = '" . $_GET['CusID'] . "'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("location: data_Management.php");
} else {
  echo "Error deleting record: " . $conn->error;
}
}

