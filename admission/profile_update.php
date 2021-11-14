<?php 

include('dbcon.php');

$id = $_POST['id'];
$uname = $_POST['name'];
$name = implode(' ', $uname);
$dob = $_POST['dob'];
$gen = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$edu = $_POST['education'];
$education = implode(',', $edu);
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];

$empty = empty(array_filter($_FILES['document']['name'])) ;
if($empty == false){
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
            echo "document must be in pdf,docx,doc,txt type";
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
$pimg_url = "profileimages/" . $pimg_name;
move_uploaded_file($pimg_tmp_name,$pimg_url);

if($pimg_name == "" and $empty == true){  
    $query = "update dashboard set name = '$name', dob = '$dob', gender = '$gen', phone = '$phone', email='$email', education='$education', address = '$address', city = '$city', state = '$state' where id = '$id'";
    mysqli_query($con,$query);
    echo "<script>alert('Record is updated 😃');window.location.href = 'student_profile.php';</script>";
}
elseif($pimg_name != "" and $empty != true){
    $query = "update dashboard set name = '$name', dob = '$dob', gender = '$gen', phone = '$phone', email='$email', education='$education', address = '$address', city = '$city', state = '$state', document = '$doc_url', image = '$pimg_url' where id = '$id'";
    mysqli_query($con,$query);
    echo "<script>alert('Record is updated 😃');window.location.href = 'student_profile.php';</script>";
}
elseif(!($pimg_name == "")){ 
    $query = "update dashboard set name = '$name', dob = '$dob', gender = '$gen', phone = '$phone', email='$email', education='$education', address = '$address', city = '$city', state = '$state', image = '$pimg_url' where id = '$id'";
    mysqli_query($con,$query);
    echo "<script>alert('Record is updated 😃');window.location.href = 'student_profile.php';</script>";
}
else{
    $query = "update dashboard set name = '$name', dob = '$dob', gender = '$gen', phone = '$phone', email='$email', education='$education', address = '$address', city = '$city', state = '$state', document = '$doc_url'  where id = '$id'"; 
    mysqli_query($con,$query);
    echo "<script>alert('Record is updated 😃');window.location.href = 'student_profile.php';</script>";
}
?>