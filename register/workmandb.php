<?php
session_start();
include('server.php');
$errors = array();



if (isset($_POST['sub_work'])) {
    $gen = mysqli_real_escape_string($conn, $_POST['gen']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $old = mysqli_real_escape_string($conn, $_POST['old']);
    $educational = mysqli_real_escape_string($conn, $_POST['educational']);
    $date_job = mysqli_real_escape_string($conn, $_POST['date_job']);
    $name_train = mysqli_real_escape_string($conn, $_POST['name_train']);
    $date_train = mysqli_real_escape_string($conn, $_POST['date_train']);
    $time_train = mysqli_real_escape_string($conn, $_POST['time_train']);
    $location_train = mysqli_real_escape_string($conn, $_POST['location_train']);
    $assessor = mysqli_real_escape_string($conn, $_POST['assessor']);
    $con_name = mysqli_real_escape_string($conn, $_POST['con_name']);


    if (count($errors) == 0) {

        $sql = "INSERT INTO workman (gen , name , old , educational , date_job , name_train , date_train , time_train , location_train , assessor , recorder_name) 
            VALUES('$gen','$name','$old','$educational','$date_job','$name_train','$date_train','$time_train','$location_train','$assessor','$con_name') ";
        mysqli_query($conn, $sql);



        header('location: data_workman.php');
    } else {
        array_push($errors, "Username or Email already exists ");
        $_SESSION['error'] = "Username or Email already exists";
        header("location: register.php");
    }
}

$sql = "DELETE FROM workman WHERE id = '" . $_GET['CusID'] . "'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("location: data_workman.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
