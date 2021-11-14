<?php include('head.php');
include('dbcon.php');
$em = $_SESSION['email'];
$query = "select * from dashboard where email = '$em'";
$obj = mysqli_query($con,$query);

?>
            

<div class="container">
            <div class="row p-5">
                <div class="col-md-12 login-height" style="overflow: scroll;">
                    <table class="table  table-bordered table-sm table-hover text-center" id="table">
                        <thead>
                            <tr class="">
                                <td colspan="14" class="fw-bold text-black-50 ">
                                    Filled Forms
                                </td>
                            </tr>
                            <tr class=" text-success">
                                <th>Id</th>
                                <th>Name</th>
                                <th>D.O.B</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Education</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Document's</th>
                                <th>Image</th>
                                <th></th>
                            </tr>
                        </thead>

                        <?php
                                
                                while ($data = mysqli_fetch_array($obj)) {
                                    ?>
                        <tbody>
                            <tr>
                                <td class=" fw-bold"><small><?php echo $data['id']; ?></small></td>
                                <td><small><?php echo $data['name']; ?></small></td>
                                <td><small><?php echo $data['dob']; ?></small></td>
                                <td><small><?php echo $data['gender']; ?></small></td>
                                <td><small><?php echo $data['phone']; ?></small></td>
                                <td><small><?php echo $data['email']; ?></small></td>
                                <td><small><?php echo $data['education']; ?></small></td>
                                <td><small><?php echo $data['address']; ?></small></td>
                                <td><small><?php echo $data['city']; ?></small></td>
                                <td><small><?php echo $data['state']; ?></small></td>
                                <td  class=" cell-width"><small><?php echo $data['document']; ?></small></td>
                                <td><small><img src="<?php echo $data['image']; ?>"
                                            style="height: 50px;width:50px;"></small></td>
                                <td>
                                    <div class="p-2 icons d-flex">
                                        <a href="student_update.php?v=<?php  echo $data['id']; ?>" type="submit"
                                            class="btn text-success"><i class="far fa-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                        <?php
                                }
                            ?>

                    </table>
                </div>
            </div>
        </div><!-- Employee's list table -->
<?php include('footer.php');?>