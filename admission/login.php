<?php
session_start();
include('dbcon.php');

$email = $_POST['email'];
$pass = $_POST['password'];
$invalidlogin = "Invalid Email/Password";
$emptylogindetails = "Please enter Email/Password";
$emptypassword = " A password is required ";
    
    if ($email == "" && $pass == "") {
        $_SESSION['emptylogindetails'] = $emptylogindetails;
        echo '<script>window.location.href = "index.php";</script>';
    } elseif ($pass == "") {
        $_SESSION['emptypassword'] = $emptypassword;
        echo '<script>window.location.href = "index.php";</script>';
    } else {
        $query = "select * from user where email = '$email' and password = '$pass'";
        $check = mysqli_query($con, $query);
        $data = mysqli_fetch_array($check);
        if (mysqli_num_rows($check) > 0) {
            $_SESSION['username'] = $data['name'];
            $_SESSION['email'] = $data['email'];
            echo '<script>window.location.href = "dashboard.php";</script>';
        } else {
            $_SESSION['invalidlogin'] = $invalidlogin;
            echo '<script>window.location.href = "index.php";</script>';
        }
    }



?>