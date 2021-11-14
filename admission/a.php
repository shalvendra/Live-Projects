<?php include('head.php');
include('dbcon.php');
$em = $_SESSION['email'];
$query = "select * from dashboard where email = '$em'";
$obj = mysqli_query($con,$query);
if(mysqli_num_rows($obj) > 0){
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button style=" margin-top:100px" id="be">
    hhh
    </button>
</body>
<script> button = document.getElementById('be');
    button.disabled = true;
    button.innerText = 'BE filled';</script>
</html>