<?php 
include('head.php');
include('dbcon.php');
include('model.php');
$ema = $_SESSION['email'];
$quer = "select * from user where email = '$ema'";
$chec = mysqli_query($con, $quer);
$dataa = mysqli_fetch_array($chec);
?>

<div class="container_fluid pt-4">
    <div class="container login-height shadow">
        <div class="row p-4 ">
            <div class="col-md-8">
                <div class="text-center p-3">
                    <img class="img-fluid" src="pictures/logo.png" alt="logo" height="300px" width="300px">
                </div>
                <div class="logo-desc">
                <p class="logo-head">Is for <br><br><small><?php echo $_SESSION['email']; ?></small></p><br>
                    <p class="w-75 logo-subtext">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem
                        minima vero necessitatibus id et? Nisi, et voluptatum architecto quae atque, sint , possimus
                        amet rem quam, voluptatibus soluta similique asperiores, nihil praesentium ad nostrum libero.
                    </p>
                </div>
            </div>
            <!--logo with description end-->

            <!-- <div > -->
            <div class="col-md-4 d-flex flex-column justify-content-center">
                <?php 
                
                if( isset($_SESSION['passwordchanged'])){
                    echo "  <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>Success!</strong> Password changed successfully.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                    unset($_SESSION['passwordchanged']);
                }elseif( isset($_SESSION['passwordexist'])){
                        $error = $_SESSION['passwordexist'];
                    echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <strong>Error!</strong> $error.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                    unset($_SESSION['passwordexist']);
                }

                ?>
                <p class=" text-muted">Please select your registration form</p>   
                <button id='be' class="text-success fw-bold btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#signup">B.E</button>
                <button class="text-success fw-bold btn btn-outline-success my-3" disabled>MCA (disabled)</button>
                <form class=" input-group" action="changepassword.php" method="post">
                    <input class="form-control " type="text" name="password" value="<?php echo $dataa['password'] ?>">
                    <button class="text-success fw-bold btn btn-outline-success">Change Password</button>
                </form>
            </div>
            <!--form buttons end-->
            <!-- </div> -->
        </div>
    </div>
</div>
<!--login-form body end-->

<?php include('footer.php');?>
<?php 
    $em = $_SESSION['email'];
    $query = "select * from dashboard where email = '$em'";
    $obj = mysqli_query($con,$query);
    if(mysqli_num_rows($obj) > 0){
        echo "<script> button = document.getElementById('be');
        button.disabled = true;
        button.innerText = 'B.E filled';</script>";
    }                  
?>