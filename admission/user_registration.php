<?php
session_start();
include('dbcon.php');

$uname = $_POST['name'];
$pass = $_POST['password'];
$email = $_POST['email'];
$existemail = "Email is already exist 😲";
$usersignupemptylogin = "please enter Name, Password and Email";
$usersignupemptyemail = "There were(s) error in your form: a email is required ";
$usersignupemptypassword = "There were(s) error in your form: a password is required ";
$usersignupaccountcreated = "Account is created login from email/password";

if(($email == "" && $pass == "")){
    $_SESSION['usersignupemptylogin'] = $usersignupemptylogin;
    echo "  <script>window.location.href = 'index.php';</script>";
}
elseif($pass == ""){
    $_SESSION['usersignupemptypassword'] = $usersignupemptypassword;
    echo "<script>window.location.href = 'index.php';</script>";
}
elseif($email == ""){
    $_SESSION['usersignupemptyemail'] = $usersignupemptyemail;
    echo "<script>window.location.href = 'index.php';</script>";
}
else{
    $mail = "select email from user where email = '$email'";
    $emailcheck = mysqli_query($con, $mail);

    if (mysqli_num_rows($emailcheck)>0) {
        $_SESSION['existemail'] = $existemail;
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        $query = "insert into user(name,password,email)value('$uname','$pass','$email')";
        if (mysqli_query($con, $query)) {
            $_SESSION['usersignupaccountcreated'] = $usersignupaccountcreated;
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Not able to create your account 😲');window.location.href = 'index.php';</script>";
        }
    }
}
?>