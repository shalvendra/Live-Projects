<?php
include('dbcon.php');

$uname = $_POST['name'];
$name = implode(' ', $uname);
$dob = $_POST['dob'];
$gen = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$mail = "select email from dashboard where email = '$email'";
$emailcheck = mysqli_query($con,$mail);
$edu = $_POST['education'];
$education = implode(',', $edu);
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];



if(empty(array_filter($_FILES['document']['name'])) != true){
    $count = count($_FILES['document']['name']);
    for($i=0; $i<$count; $i++){
        $d_nam = $_FILES['document']['name'][$i];
        $d_size = $_FILES['document']['size'][$i];
        $d_tmp_name = $_FILES['document']['tmp_name'][$i];

        //uniqid
        $d_name = explode('.',$d_nam);
        $d_ext = strtolower(end($d_name));
        $new_doc_name = uniqid().'.'.$d_ext;
        $new_doc_address = "documents/" . $new_doc_name;

        if($d_ext == 'pdf' || $d_ext == 'docx' || $d_ext == 'doc' || $d_ext == 'txt'){
            if($d_size > 1000000){
                echo "per file size 1MB only";
            }
            else{
                if(move_uploaded_file($d_tmp_name,$new_doc_address)){
                }
                else{
                    echo "can't upload your file";
                }
            }
        }
        else{
            echo "document must be in pdf,docx,doc and txt type";
        }
        $docurl[] = $new_doc_address;
        $doc_url = implode(',',$docurl);
    }
}
 
// $image = $_FILES['profileimage'];
// echo "<pre>";
// print_r($image);
$pimg_name = $_FILES['profileimage']['name'];
$pimg_tmp_name = $_FILES['profileimage']['tmp_name'];
$f_size = $_FILES['profileimage']['size'];
$f_exten = explode(".",$pimg_name);
$f_ext = strtolower(end($f_exten));  // end will return last element from array, bhut saari file mai extension capital letter mai hota hai jisse dowara condition check karni padti hai
$f_newimg = uniqid(). '.' . $f_ext; // uniqid() generates uniquid by current time in micro seconds.
$pimg_url = "profileimages/" . $f_newimg;
if($f_ext == 'jpg'||$f_ext == 'png'||$f_ext == 'gif'){
    if($f_size >= 1000000){
        echo "can't upload more than 1 MB per document";
    }
    else{
        if(move_uploaded_file($pimg_tmp_name,$pimg_url)){
            // echo "<script>alert('image uploaded successfully');window.location.href = 'dashboard.php';</script>";
        }
    }
}
else{
    echo "<script>alert('you can upload jpg, png and gif only in profile picture');window.location.href = 'dashboard.php';</script>";
}
if(mysqli_num_rows($emailcheck)>0){
    echo "<script>alert('Email is already exist 😲');window.location.href = 'dashboard.php';</script>";
    }
else{
   $query = "insert into dashboard(name,dob,gender,phone,email,education,address,city,state,document,image)value('$name','$dob','$gen','$phone','$email','$education','$address','$city','$state','$doc_url','$pimg_url')";
    if(mysqli_query($con,$query)){
    echo "<script>alert('Record is inserted');window.location.href = 'student_profile.php';</script>";
    }
    else{
    echo "<script>alert('Not able to insert your record 😲');window.location.href = 'dashboard.php';</script>";
    }
}
?>

