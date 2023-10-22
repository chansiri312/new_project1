<?php 

    session_start();
    include ('server.php');
    $errors = array();

    if (isset($_POST['login_user'])){
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        if (empty($username)){
            array_push($errors,"Username is required");
        }
        if (empty($password)){
            array_push($errors,"Password is required");
        }

        if (count($errors) == 0){
            $password = md5($password);
            $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
            $result = mysqli_query($conn, $query);
            $objResult = mysqli_fetch_array($result);

            if (mysqli_num_rows($result) == 1){
                $_SESSION["username"] = $objResult["username"];
                $_SESSION["userlevel"] = $objResult["userlevel"];
    
                session_write_close();
                
                if($objResult["userlevel"] == "A")
                {
                    header("location:admin_page.php");
                }
                else
                {
                    header("location:index.php");
                }
            } else{
                array_push($errors,"Wrong username/password conbination");
                $_SESSION['error'] = "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง!!";
                header("location: login.php");
            }
        }

    }
?>