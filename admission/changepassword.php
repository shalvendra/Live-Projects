<?php
include('head.php');
include('dbcon.php');
include 'session.php';

$pass = $_POST['password'];
$email = $_SESSION['email'];
$passwordchanged = "password changed";
$passwordexist = "previous password is same as current password";
if(isset($pass)){
    $passw = "select password from user where email = '$email'";
    $exe = mysqli_query($con,$passw);
    $arr = mysqli_fetch_array($exe);
    if($pass == $arr['password']){
        $_SESSION['passwordexist'] = $passwordexist;
        echo '<script>window.location.href = "dashboard.php";</script>';
    }
    else{
        $query = "update user set password = '$pass' where email = '$email'";
        $_SESSION['passwordchanged'] = $passwordchanged;
        mysqli_query($con,$query);
        echo '<script>window.location.href = "dashboard.php";</script>';
    }
}
else{
    echo '<script>window.location.href = "dashboard.php";</script>';
}

?>