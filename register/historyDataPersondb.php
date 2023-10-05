<?php
session_start();
include('server.php');
$errors = array();



if (isset($_POST['sub_hisperson'])) {
    $num1 = mysqli_real_escape_string($conn, $_POST['num1']);
    $num_milk = mysqli_real_escape_string($conn, $_POST['num_milk']);
    $recoder = mysqli_real_escape_string($conn, $_POST['recoder']);
    $style = mysqli_real_escape_string($conn, $_POST['style']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $milk_morning = mysqli_real_escape_string($conn, $_POST['milk_morning']);
    $milk_evening = mysqli_real_escape_string($conn, $_POST['milk_evening']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);
    $con_name = mysqli_real_escape_string($conn, $_POST['con_name']);


    if (count($errors) == 0) {

        $sql = "INSERT INTO historydataperson (num1,num_milk,recoder,style,date , number , milk_morning , milk_evening , tatal_milk , note , recorder_name) 
            VALUES('$num1','$num_milk','$recoder','$style','$date','$number','$milk_morning','$milk_evening','$milk_morning'+'$milk_evening','$note','$con_name') ";
        mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>";
        echo "alert('edit Success');";
        echo "window.location = 'data_historyDataPerson.php'; ";
        echo "</script>";
    } else {
        array_push($errors, "Username or Email already exists ");
        $_SESSION['error'] = "Username or Email already exists";
        header("location: register.php");
    }
}

$sql = "DELETE FROM historydataperson WHERE id = '" . $_GET['CusID'] . "'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("location: data_historyDataPerson.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
