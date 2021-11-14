<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap_css_jsp/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Admision</title>
    <style>
        .login-btn{
            border-radius: 50%;
        }
        .login-form{
            border-radius: 70px 10px !important;
        }
        .login-height{
            border-radius: 20px;
            margin-top: 75px;
            margin-bottom: 76px;
            border: 3px solid green;
        }
        .logo-head{
            font-size: 40px;
            font-weight: 600;
            color: #7ebb6b;
            font-family: 'Varela Round', sans-serif;
        }
        .logo-desc{
            line-height: 20px;
        }
        .logo-subtext{
            color: #757575;
            letter-spacing: .8px;
            text-align: justify;
        }
        .btn-outline-success:hover{
            color: white !important;
        }
        .logout{
            font-weight: 600;
            letter-spacing: .7px;
            font-family: 'Varela Round', sans-serif;
        }
        .profile-image{
         width: 20% ;
        }

        .profile-pic{
            display: block;
            width: 60%;
            margin: 10px auto;
            border-radius: 50%;
        }
        .profile-container{
            box-sizing: border-box;
            margin: -55px 0px 0px 0px ;
        }
        .table{
            margin-top: 139px;
            margin-bottom: 119px;
        }
    
        .cell-width{
            max-width: 50px !important;
            word-wrap: break-word
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-light bg-light fixed-top">
                <div class="col-md-2">
                    <a class="mx-3" href="dashboard.php" class="navbar-brand">
                        <img class="img-fluid" src="pictures/logo.png" alt="logo" width="70px" height="70px">
                    </a>
                </div>
            <div class="col-md-8">
                <p class="text-success text-center logout text-capitalize">Welcome <?php echo $_SESSION['username']; ?> 😄</p>
            </div>
            <div class="col-md-2 d-flex">
                <a href="student_profile.php" class="btn logout text-success">View Forms</a>
                <a href="logout.php" class="btn logout text-success">Logout</a>
            </div>
            </nav><!-- navbar end -->
        </div><!-- row end -->
    </div><!-- navbar container end -->

