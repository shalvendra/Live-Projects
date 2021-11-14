<div class="modal fade" id="signup">
    <div class="modal-dialog model-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="" action="student_insert.php" method="POST" enctype="multipart/form-data">

                    <div class=" d-flex justify-content-center mb-4">
                        <div class="profile-container profile-image">
                            <img id="avtar" class="img-fluid profile-pic" onclick="profileclick()"
                                src="pictures/profile.png" name="image">
                            <input type="file" onchange="displayimage(this)" name="profileimage" id="profileimage"
                                style="display: none;">
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <label for="name"><i class="fas text-success fa-user fa-lg me-3 fa-fw"></i></label>
                        <div class="input-group">
                            <input class=" me-4 form-control" type="text" id="name" placeholder="First Name"
                                name="name[]" />
                            <input class=" form-control" type="text" id="name" placeholder="Last name" name="name[]" />
                        </div>
                    </div>

                    <div class="d-sm-flex flex-sm-column d-lg-flex flex-lg-row align-items-center mb-4">
                        <div class=" input-group me-5">
                            <label for="dob"><i class="fas text-success fa-lg fa-fw me-3 fa-birthday-cake"></i></label>
                            <input type="date" name="dob" id="dob" class=" form-control" placeholder="D.O.B"
                                value="date">
                        </div>
                        <br>
                        <div class="input-group">
                            <label class="me-2" for="gender"><i
                                    class="fas text-success fa-lg fa-fw me-3 fa-venus-mars"></i></label>

                            <div id="gender" class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="m" value="Male">
                                <label class="form-check-label" for="m"><i class="fas text-success fa-male"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="f" value="Female">
                                <label class="form-check-label" for="f"><i
                                        class="fas text-success fa-female"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="o" value="Other">
                                <label class="form-check-label" for="o"><i
                                        class="fas text-success fa-transgender-alt"></i></label>
                            </div>
                        </div>
                    </div>

                    <div class="d-sm-flex flex-sm-column d-lg-flex flex-lg-row align-items-center mb-4">
                        <div class="input-group me-5">
                            <label for="phone"><i class="fas text-success fa-lg fa-fw me-3 fa-phone-alt"></i></label>
                            <input type="phone" id="phone" class="form-control" placeholder="Phone" name="phone" />
                        </div>
                            <br>
                        <div class="input-group">
                            <label for="email"><i class="fas text-success fa-envelope fa-lg me-3 fa-fw"></i></label>
                            <input class=" form-control " type="email" id="email" class="form-control"
                                placeholder="Email" name="email" readonly value="<?php echo $_SESSION['email'];?>" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <label for="education"><i class="fas text-success fa-lg fa-fw me-3 fa-university"></i></label>
                        <div id="education" class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="education[]" id="10th" value="10th">
                            <label class="form-check-label" for="ba">10th</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="education[]" id="12th" value="12th">
                            <label class="form-check-label" for="bca">12th</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="education[]" id="bca" value="BCA">
                            <label class="form-check-label" for="bba">BCA</label>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <label for="address"><i class="fas text-success fa-lg fa-fw me-3 fa-map-marker-alt"></i></label>
                        <div class="form-outline flex-fill">
                            <textarea style="resize: none;" class="form-control" name="address" id="address" cols="10"
                                rows="1" placeholder="Address"></textarea>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <label for="city"><i class="fas text-success fa-lg fa-fw me-3 fa-city"></i></label>
                        <div class=" input-group">
                            <input class=" me-4 form-control" type="text" id="city" placeholder="City" name="city" />

                            <select class="text-center form-control" name="state">
                                <option selected>State</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Telengana">Telengana</option>
                                <option value="Karnatka">Karnatka</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <label class=" mb-4" for="document"><i
                                class="fas text-success fa-lg fa-fw me-3 fa-file-upload"></i></label>
                        <div class="form-outline flex-fill">
                            <input type="file" name="document[]" id="document" multiple>
                            <div class="small text-muted mt-2">Upload your marksheets or any other relevant file. Max
                                file size 5 MB</div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="text-success btn fw-bold letter-space" type="submit"
                            class="btn">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- course Registration Modal end-->


<div class="modal fade" id="user_registration">
    <div class="modal-dialog model-sm">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn-close btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="" action="user_registration.php" method="POST">
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="input-group">
                            <label for="name"><i class="fas text-success fa-user fa-lg me-3 fa-fw"></i></label>
                            <input class=" form-control" type="text" id="name" placeholder="Userame" name="name" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="input-group">
                            <label for="password"><i class="fas text-success fa-lock fa-lg me-3 fa-fw"></i></label>
                            <input type="password" id="password" class="form-control" placeholder="Password"
                                name="password" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="input-group">
                            <label for="email"><i class="fas text-success fa-envelope fa-lg me-3 fa-fw"></i></label>
                            <input class=" form-control" type="email" id="email" class="form-control"
                                placeholder="Email" name="email" />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="text-success btn fw-bold letter-space" type="submit"
                            class="btn">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- user Registration Modal end-->