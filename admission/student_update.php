<?php include('head.php');
include('dbcon.php');
$id = $_GET['v'];

$query = "select * from dashboard where id = '$id'";
$obj = mysqli_query($con,$query);
$data = mysqli_fetch_array($obj);

// converting username string to array
$name = $data['name'];
$str_arr_name = explode(' ',$name);

$email = $data['email'];

// converting education string to array
$education = $data['education'];
$str_arr_education = explode(',',$education);

// converting document's string to array
$doc = $data['document'];
$str_arr_doc = explode(',',$doc);
// echo "<pre>";
// print_r($str_arr_education);
// die;
$count = count($str_arr_doc);
?>
<div class="container_fluid ">
    <div class="container login-height shadow ">
        <div class="row p-4">
            <div class="col-md-7 d-flex flex-column justify-content-center">
                <div class="text-center p-3">
                    <img class="img-fluid" src="pictures/logo.png" alt="logo" height="300px" width="300px">
                </div>
                <div class="logo-desc">
                    <p class="logo-head">Is for <br><br><small><?php echo $_SESSION['email']; ?></small></p><br>
                    <p class="w-75 logo-subtext">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem minima vero necessitatibus id et? Nisi, et voluptatum architecto quae atque, sint , possimus amet rem quam, voluptatibus soluta similique asperiores, nihil praesentium ad nostrum libero.</p>
                </div>
            </div><!--logo with description end-->

            <div class="col-md-5 d-flex flex-column justify-content-center">
                <form class=" text-success login-form my-5 p-3 shadow " action="profile_update.php" method="POST" enctype="multipart/form-data">
                    <div class=" d-flex justify-content-center mb-4">
                        <div class="profile-container profile-image">
                            <img id="avtar" class="img-fluid profile-pic" onclick="profileclick()"
                                src="<?php echo $data['image']; ?>" name="image">
                            <input type="file" onchange="displayimage(this)" name="profileimage" id="profileimage"
                                style="display: none;">
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <label for="name"><i class="fas fa-user fa-lg me-3 fa-fw"></i></label>
                        <div class="input-group">
                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            <input class=" me-4 form-control" type="text" id="name" placeholder="First Name"
                                name="name[]" value="<?php echo $str_arr_name['0']; ?>" />
                            <input class=" form-control" type="text" id="name" placeholder="Last name" name="name[]"
                                value="<?php echo $str_arr_name['1']; ?>" />
                        </div>
                    </div>

                    <div class="d-sm-flex flex-sm-column d-lg-flex flex-lg-row align-items-center mb-4 ">
                        <div class=" input-group me-5">
                            <label for="dob"><i class="fas fa-lg fa-fw me-3 fa-birthday-cake"></i></label>
                            <input type="date" name="dob" id="dob" class=" form-control" placeholder="D.O.B"
                                value="<?php echo $data['dob']; ?>">
                        </div>
                        <br>
                        <div class="input-group">
                            <label class="me-2" for="gender"><i
                                    class="fas fa-lg fa-fw me-3 fa-venus-mars"></i></label>

                            <div id="gender" class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="m" value="Male" <?php 
                                        if($data['gender'] == 'Male'){
                                            echo "checked";
                                        }
                                    ?>>
                                <label class="form-check-label" for="m"><i class="fas fa-male"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="f" value="Female" <?php 
                                        if($data['gender'] == 'Female'){
                                            echo "checked";
                                        }
                                    ?>>
                                <label class="form-check-label" for="f"><i class="fas fa-female"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="o" value="Other" <?php 
                                        if($data['gender'] == 'Other'){
                                            echo "checked";
                                        }
                                    ?>>
                                <label class="form-check-label" for="o"><i
                                        class="fas fa-transgender-alt"></i></label>
                            </div>
                        </div>
                    </div>

                    <div class="d-sm-flex flex-sm-column d-lg-flex flex-lg-row align-items-center mb-4">
                        <div class="input-group me-5">
                            <label for="phone"><i class="fas fa-lg fa-fw me-3 fa-phone-alt"></i></label>
                            <input type="phone" id="phone" class="form-control" placeholder="Phone" name="phone"
                                value="<?php echo $data['phone']; ?>" />
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="email"><i class="fas fa-envelope fa-lg me-3 fa-fw"></i></label>
                            <input class=" form-control" type="email" id="email" class="form-control"
                                placeholder="Email" name="email" value="<?php echo $data['email']; ?>" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <label for="education"><i class="fas fa-lg fa-fw me-3 fa-university"></i></label>
                        <div id="education" class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="education[]" id="10th" value="10th" <?php 
                                    if(in_array('10th', $str_arr_education) ){
                                        echo "checked";
                                    }
                                ?>>
                            <label class="form-check-label" for="10th">10th</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="education[]" id="12th" value="12th" <?php 
                                        if(in_array('12th', $str_arr_education) ){
                                        echo "checked";
                                    }
                                ?>>
                            <label class="form-check-label" for="12th">12th</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="education[]" id="bca" value="BCA" <?php 
                                        if(in_array('BCA', $str_arr_education) ){
                                        echo "checked";
                                    }
                                    
                                ?>>
                            <label class="form-check-label" for="bca">BCA</label>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <label for="address"><i class="fas fa-lg fa-fw me-3 fa-map-marker-alt"></i></label>
                        <div class="form-outline flex-fill">
                            <textarea style="resize: none;" class="form-control" name="address" id="address"
                                cols="10" rows="1" placeholder="Address"><?php echo $data['address'];?></textarea>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <label for="city"><i class="fas fa-lg fa-fw me-3 fa-city"></i></label>
                        <div class=" input-group">
                            <input class=" me-4 form-control" type="text" id="city" placeholder="City" name="city"
                                value="<?php echo $data['city'];?>" />
                                        <br>
                            <select class="text-center form-control" name="state">
                                <option <?php 
                                        if($data['state'] == 'Madhya Pradesh'){
                                            echo "selected";
                                        }
                                    ?> value="Madhya Pradesh">Madhya Pradesh</option>
                                <option <?php 
                                        if($data['state'] == 'Uttar Pradesh'){
                                            echo "selected";
                                        }
                                    ?> value="Uttar Pradesh">Uttar Pradesh</option>
                                <option <?php 
                                        if($data['state'] == 'Telengana'){
                                            echo "selected";
                                        }
                                    ?> value="Telengana">Telengana</option>
                                <option <?php 
                                        if($data['state'] == 'Karnatka'){
                                            echo "selected";
                                        }
                                    ?> value="Karnatka">Karnatka</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <label class=" mb-4" for="document"><i
                                class="fas fa-lg fa-fw me-3 fa-file-upload"></i></label>
                        <div class="form-outline flex-fill">
                            <div class=" d-sm-flex flex-sm-column d-lg-flex flex-lg-row">
                                <label style="color: black;" class=" w-50">Want to remove all <?php echo $count;  ?> old files and
                                    upload new click on browse<input type="file" name="document[]"
                                        id="document" multiple></label>
                                <?php 
                                    for ($i=0; $i < $count; $i++) {
                                    ?>
                                    <br><br>
                                <i id="files" class="far fa-lg fa-fw fa-file-alt me-2 me-sm-0 "
                                    title="<?php echo $str_arr_doc[$i];  ?>"></i>
                                <?php
                                    }?>
                            </div>
                        </div>
                    </div>
                    <div class="small text-muted"><p>Upload your CV/Resume or any other relevant file. Max
                        file size 1 MB</p> 
                    </div>

                    <div class="modal-footer">
                        <button class=" btn text-success fw-bold logout" type="submit" class="btn">Save</button>
                    </div>
                </form>
            </div><!--form end-->
        </div>
    </div>
</div><!--login-form body end-->
<!-- <div class="container_fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-7"></div>
            <div class="col-md-5">
                <form class="my-5 p-1 shadow" action="profile_update.php" method="POST" enctype="multipart/form-data">

                    <div class=" d-flex justify-content-center mb-4">
                        <div class="profile-container profile-image">
                            <img id="avtar" class="img-fluid profile-pic" onclick="profileclick()"
                                src="<?php echo $data['image']; ?>" name="image">
                            <input type="file" onchange="displayimage(this)" name="profileimage" id="profileimage"
                                style="display: none;">
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <label for="name"><i class="fas fa-user fa-lg me-3 fa-fw"></i></label>
                        <div class="input-group">
                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            <input class=" me-4 form-control" type="text" id="name" placeholder="First Name"
                                name="name[]" value="<?php echo $str_arr_name['0']; ?>" />
                            <input class=" form-control" type="text" id="name" placeholder="Last name" name="name[]"
                                value="<?php echo $str_arr_name['1']; ?>" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <label for="password"><i class="fas fa-lock fa-lg me-3 fa-fw"></i></label>
                        <div class=" flex-fill">
                            <input type="password" id="password" class="form-control" placeholder="Password"
                                name="password" value="<?php echo $data['password']; ?>" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class=" input-group me-5">
                            <label for="dob"><i class="fas fa-lg fa-fw me-3 fa-birthday-cake"></i></label>
                            <input type="date" name="dob" id="dob" class=" form-control" placeholder="D.O.B"
                                value="<?php echo $data['dob']; ?>">
                        </div>

                        <div class="input-group">
                            <label class="me-2" for="gender"><i
                                    class="fas fa-lg fa-fw me-3 fa-venus-mars"></i></label>

                            <div id="gender" class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="m" value="Male" <?php 
                                        if($data['gender'] == 'Male'){
                                            echo "checked";
                                        }
                                    ?>>
                                <label class="form-check-label" for="m"><i class="fas fa-male"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="f" value="Female" <?php 
                                        if($data['gender'] == 'Female'){
                                            echo "checked";
                                        }
                                    ?>>
                                <label class="form-check-label" for="f"><i class="fas fa-female"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="o" value="Other" <?php 
                                        if($data['gender'] == 'Other'){
                                            echo "checked";
                                        }
                                    ?>>
                                <label class="form-check-label" for="o"><i
                                        class="fas fa-transgender-alt"></i></label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="input-group me-5">
                            <label for="phone"><i class="fas fa-lg fa-fw me-3 fa-phone-alt"></i></label>
                            <input type="phone" id="phone" class="form-control" placeholder="Phone" name="phone"
                                value="<?php echo $data['phone']; ?>" />
                        </div>

                        <div class="input-group">
                            <label for="email"><i class="fas fa-envelope fa-lg me-3 fa-fw"></i></label>
                            <input class=" form-control" type="email" id="email" class="form-control"
                                placeholder="Email" name="email" value="<?php echo $data['email']; ?>" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <label for="education"><i class="fas fa-lg fa-fw me-3 fa-university"></i></label>
                        <div id="education" class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="education[]" id="ba" value="BA" <?php 
                                    if(in_array('BA', $str_arr_education) ){
                                        echo "checked";
                                    }
                                ?>>
                            <label class="form-check-label" for="ba">BA</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="education[]" id="bca" value="BCA" <?php 
                                        if(in_array('BCA', $str_arr_education) ){
                                        echo "checked";
                                    }
                                ?>>
                            <label class="form-check-label" for="bca">BCA</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="education[]" id="bba" value="BBA" <?php 
                                        if(in_array('BBA', $str_arr_education) ){
                                        echo "checked";
                                    }
                                    
                                ?>>
                            <label class="form-check-label" for="bba">BBA</label>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <label for="address"><i class="fas fa-lg fa-fw me-3 fa-map-marker-alt"></i></label>
                        <div class="form-outline flex-fill">
                            <textarea style="resize: none;" class="form-control" name="address" id="address"
                                cols="10" rows="1" placeholder="Address"><?php echo $data['address'];?></textarea>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <label for="city"><i class="fas fa-lg fa-fw me-3 fa-city"></i></label>
                        <div class=" input-group">
                            <input class=" me-4 form-control" type="text" id="city" placeholder="City" name="city"
                                value="<?php echo $data['address'];?>" />

                            <select class="text-center form-control" name="state">
                                <option <?php 
                                        if($data['state'] == 'Madhya Pradesh'){
                                            echo "selected";
                                        }
                                    ?> value="Madhya Pradesh">Madhya Pradesh</option>
                                <option <?php 
                                        if($data['state'] == 'Uttar Pradesh'){
                                            echo "selected";
                                        }
                                    ?> value="Uttar Pradesh">Uttar Pradesh</option>
                                <option <?php 
                                        if($data['state'] == 'Telengana'){
                                            echo "selected";
                                        }
                                    ?> value="Telengana">Telengana</option>
                                <option <?php 
                                        if($data['state'] == 'Karnatka'){
                                            echo "selected";
                                        }
                                    ?> value="Karnatka">Karnatka</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <label class=" mb-4" for="document"><i
                                class="fas fa-lg fa-fw me-3 fa-file-upload"></i></label>
                        <div class="form-outline flex-fill">
                            <div class=" input-group">
                                <label class="me-5 w-50">Want to remove all <?php echo $count;  ?> old files and
                                    upload new click on browse<input class=" me-3" type="file" name="document[]"
                                        id="document" multiple></label>
                                <?php 
                                    for ($i=0; $i < $count; $i++) {
                                        // echo " " ;
                                        // echo $str_arr_doc[$i];
                                        // print_r($str_arr_doc[$i]);
                                    ?>
                                <i id="files" class="far fa-lg fa-fw fa-file-alt me-2"
                                    title="<?php echo $str_arr_doc[$i];  ?>"></i>
                                <?php
                                    }?>
                            </div>
                            <div class="small text-muted mt-2">Upload your CV/Resume or any other relevant file. Max
                                file size 1 MB</div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class=" btn fw-bold letter-space" type="submit" class="btn">Save</button>
                    </div>
                </form>
            </div>
           
        </div>
    </div>
</div> -->

<?php include('footer.php');?>