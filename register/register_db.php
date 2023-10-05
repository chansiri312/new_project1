<?php
    session_start();
    include('server.php');
    $errors = array();

    if(isset($_POST['reg_user'])){
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn,$_POST['password_2']);
        $farmname = mysqli_real_escape_string($conn,$_POST['farmname']);
        $number_farm = mysqli_real_escape_string($conn,$_POST['number_farm']);
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $farm_number = mysqli_real_escape_string($conn,$_POST['farm_number']);
        $rode = mysqli_real_escape_string($conn,$_POST['rode']);
        $tumbon = mysqli_real_escape_string($conn,$_POST['tumbon']);
        $district = mysqli_real_escape_string($conn,$_POST['district']);
        $province = mysqli_real_escape_string($conn,$_POST['province']);
        $style = mysqli_real_escape_string($conn,$_POST['style']);
        $userlevel = mysqli_real_escape_string($conn,$_POST['userlevel']);


        if (empty(($username))){
            array_push($errors,"Username is required");
        }

        if (empty(($email))){
            array_push($errors,"Email is required");
        }

        if (empty(($password_1))){
            array_push($errors,"Password is required");
        }

        if ($password_1 != $password_2){
            array_push($errors,"รหัสไม่ตรงกัน");
        }

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email='$email' ";
        $query = mysqli_query($conn , $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result){ // if user exists
            if ($result['username'] === $username){
                array_push($errors,"Username already exists");
            }
            if ($result['email'] === $email){
                array_push($errors,"Email already exists");
            }


        }
        if (count($errors) == 0){
            $password = md5($password_1);

            $sql = "INSERT INTO user (username , email , password , farm_name, number_farm , name , farm_number , rode , tumbon , district , province , style , userlevel) 
            VALUES('$username','$email','$password','$farmname','$number_farm','$name','$farm_number','$rode','$tumbon','$district','$province','$style','$userlevel') ";
            mysqli_query($conn,$sql);
            

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');

        }else{
            array_push($errors,"Username or Email already exists ");
            $_SESSION['error'] = "Username or Email already exists";
            header("location: register.php");
        }
    }




?>