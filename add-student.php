<?Php
include('includes/header.php');
?>

<div class="content container-fluid">
    
    <h4 class="mt-4">Student</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="student.php">Student</a></li>
        <li class="breadcrumb-item">add student</li>
    </ol>


    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary"> Add Student
                        <a href="student.php" class="btn btn-primary float-end btn-sm">
                            <i class="fas fa-sign-out-alt fa-fw"></i>
                        </a>
                    </h6>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms calendar-icon">
                                    <label>Mobile</label>
                                    <input class="form-control" name="mobile" type="text" placeholder="Your phone number">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Your mail adress">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Nationality</label>
                                    <input class="form-control" name="nationality" type="text" placeholder="Your Nationality">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Promotion</label>
                                    <?php
                                        $pro = "SELECT * FROM promotion WHERE status='0' ";
                                        $pro_run = mysqli_query($con, $pro);

                                        if (mysqli_num_rows($pro_run) > 0) {
                                        ?>
                                            <select name="promotion_id" required class="form-control">
                                                <option value="">--Select Promotion--</option>
                                                <?php
                                                foreach ($pro_run as $proitem) {
                                                ?>
                                                    <option value="<?= $proitem['id'] ?>"><?= $proitem['name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        <?php
                                        } else {
                                        ?>
                                            <h5>No category availlable</h5>
                                        <?php
                                        }
                                        ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Department</label>
                                    <?php
                                        $Prom = "SELECT * FROM department ";
                                        $Prom_run = mysqli_query($con, $Prom);

                                        if (mysqli_num_rows($Prom_run) > 0) {
                                        ?>
                                            <select name="department_id" required class="form-control">
                                                <option value="">--Select Faculty--</option>
                                                <?php
                                                foreach ($Prom_run as $Promitem) {
                                                ?>
                                                    <option value="<?= $Promitem['id'] ?>"><?= $Promitem['name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        <?php
                                        } else {
                                        ?>
                                            <h5>No category availlable</h5>
                                        <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 local-forms">
                                <div class="form-group">
                                    <label>Parent Name</label>
                                    <input class="form-control" name="parent_name" type="text" placeholder="Enter parent name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 local-forms">
                                <div class="form-group">
                                    <label>Parent phone number</label>
                                    <input class="form-control" name="parent_phone" type="number" placeholder="Enter parent number">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 local-forms">
                                <div class="form-group">
                                    <label>Adress</label>
                                    <textarea class="form-control" name="adress" type="text" placeholder="Your adress here"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Image </label>
                                    <input class="form-control" type="file" name="image" id="image">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" width="70px" height="70px"/>
                            </div>
                            <div class="col-12">
                                <div class="student-submit">
                                    <button type="submit" name="save_student" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?Php
include('includes/footer.php');
include('includes/scripts.php');
?>