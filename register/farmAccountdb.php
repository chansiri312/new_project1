<?php
session_start();
include('server.php');
$errors = array();

if (isset($_POST['sub_farmaccount'])) {
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $Entrances = mysqli_real_escape_string($conn, $_POST['Entrances']);
    $Exits = mysqli_real_escape_string($conn, $_POST['Exits']);
    $Loss = mysqli_real_escape_string($conn, $_POST['Loss']);
    $Happen = mysqli_real_escape_string($conn, $_POST['Happen']);
    $Milking = mysqli_real_escape_string($conn, $_POST['Milking']);
    $Sick = mysqli_real_escape_string($conn, $_POST['Sick']);
    $Total = mysqli_real_escape_string($conn, $_POST['Total']);
    $recorder_name = mysqli_real_escape_string($conn, $_POST['con_name']);



    if (count($errors) == 0) {

        $sql = "INSERT INTO farmaccount (birthday , entrances , exits , loss , happen , milking , sick , total , recorder_name ) 
            VALUES('$birthday','$Entrances','$Exits','$Loss','$Happen','$Milking','$Sick','$Entrances'-'$Exits'-'$Loss'+'$Happen'+'$Milking','$recorder_name') ";
        mysqli_query($conn, $sql);



        header('location: data_farmAccount.php');
        echo $sql;
    } else {
        array_push($errors, "Username or Email already exists ");
        $_SESSION['error'] = "Username or Email already exists";
        header("location: index.php");
    }
}

$sql = "DELETE FROM farmaccount WHERE id = '" . $_GET['CusID'] . "'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("location: data_farmAccount.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
