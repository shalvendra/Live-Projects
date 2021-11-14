<?php session_start(); include('header.php');include('model.php');?>
<div class="container_fluid">
    <div class="container login-height shadow">
        <div class="row p-4">

            <div class="col-md-8 ">
                <div class="text-center p-3">
                    <img class="img-fluid" src="pictures/logo.png" alt="logo" height="300px" width="300px">
                </div>
                <div class="logo-desc">
                    <p class="logo-head">Is for</p><br>
                    <p style="width: 75%;" class="logo-subtext">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem minima vero necessitatibus id et? Nisi, et voluptatum architecto quae atque, sint , possimus amet rem quam, voluptatibus soluta similique asperiores, nihil praesentium ad nostrum libero.</p>
                </div>
            </div><!--logo with description end-->

            <div class="col-md-4 d-flex flex-column justify-content-center">
                <?php
                    if( isset($_SESSION['emptylogindetails'])){
                        $error = $_SESSION['emptylogindetails'];
                        echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Error!</strong> $error.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                        unset($_SESSION['emptylogindetails']);
                    }
                    elseif(isset($_SESSION['emptypassword'])){
                        $error = $_SESSION['emptypassword'];
                        echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Error!</strong> $error.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                        unset($_SESSION['emptypassword']);
                    }
                    elseif(isset($_SESSION['invalidlogin'])){
                        $error = $_SESSION['invalidlogin'];
                        echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Error!</strong> $error.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                        unset($_SESSION['invalidlogin']);
                    }
                
                ?>
                <form class="p-4 shadow login-form" action="login.php" method="POST">
                    <div class="d-flex flex-row align-items-center mb-4">
                        <label for="email"><i class="fas text-success fa-envelope fa-lg me-3 fa-fw"></i></label>
                        <div class=" flex-fill">
                            <input type="email" id="email" class="form-control" placeholder="Email"
                                name="email" />
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                        <label for="password"><i class="fas text-success fa-lock fa-lg me-3 fa-fw"></i></label>
                        <div class=" flex-fill">
                            <input type="password" id="password" class="form-control" placeholder="Password"
                                name="password" />
                        </div>
                    </div>
                    <div class=" d-flex justify-content-md-between">
                        <button class="btn btn-success login-btn" type="submit">Login</button>
                        <form action="">
                        <small class=" mx-4">Create a <a href="#user_registration" data-bs-toggle="modal">new account</a> </small>
                        </form>
                    </div>
                </form>
            </div><!--form end-->
        </div>
    </div>
</div><!--login-form body end-->

<?php include('footer.php');?>