<?php
session_start();
include('server.php');
$errors = array();



if (isset($_POST['sub_mter'])) {

    $num1 = mysqli_real_escape_string($conn, $_POST['num1']);
    $gen = mysqli_real_escape_string($conn, $_POST['gen']);
    $num_dad = mysqli_real_escape_string($conn, $_POST['num_dad']);
    $num_mom = mysqli_real_escape_string($conn, $_POST['num_mom']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $name_dad = mysqli_real_escape_string($conn, $_POST['name_dad']);
    $old = mysqli_real_escape_string($conn, $_POST['old']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $birthchild = mysqli_real_escape_string($conn, $_POST['birthchild']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);
    $con_name = mysqli_real_escape_string($conn, $_POST['con_name']);


    if (count($errors) == 0) {

        $sql = "INSERT INTO maternalreproduction (num1,gen,num_dad,num_mom,date , name_dad , old , birthdate , birthchild , birthday , number , gender , note , recorder_name) 
            VALUES('$num1','$gen','$num_dad','$num_mom','$date','$name_dad','$old','$birthdate','$birthchild','$birthday','$number','$gender','$note','$con_name') ";

        $result = mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>";
        echo "alert('Add Success');";
        echo "window.location = 'data_maternalReproduction.php'; ";
        echo "</script>";
    } else {
        array_push($errors, "Username or Email already exists ");
        $_SESSION['error'] = "Username or Email already exists";
        header("location: register.php");
    }
}

$sql = "DELETE FROM maternalreproduction WHERE id = '" . $_GET['CusID'] . "'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("location: data_maternalReproduction.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
