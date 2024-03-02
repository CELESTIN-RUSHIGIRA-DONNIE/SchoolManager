<?Php
include('includes/header.php');
?>

<div class="content container-fluid">
    
    <h4 class="mt-4">Teacher</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="teacher.php">Teacher</a></li>
        <li class="breadcrumb-item">Edit teacher</li>
    </ol>


    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow">
                <div class="card-body">
                 <?php 
                    if(isset($_GET['id']))
                    {
                        $teacher_id = $_GET['id'];
                        $teacher = "SELECT * FROM teacher WHERE id ='$teacher_id'";
                        $teacher_run = mysqli_query($con, $teacher);

                        if(mysqli_num_rows($teacher_run) > 0)
                        {
                            $teacher_row = mysqli_fetch_array($teacher_run)
                                    
                            ?>
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="teacher_id" value="<?= $teacher_row['id']; ?>">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Basic Details</span>
                                                <a href="teacher.php" class="btn btn-primary float-end">
                                                    <i class="fas fa-sign-out-alt fa-fw"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>First Name</label>
                                                <input type="text" name="fname" value="<?= $teacher_row['fname']; ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Last Name</label>
                                                <input type="text" name="lname" value="<?= $teacher_row['lname']; ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Gender</label>
                                                <select class="form-control select" name="gender">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms calendar-icon">
                                                <label>Mobile</label>
                                                <input class="form-control" name="number"value="<?= $teacher_row['mobile']; ?>" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Email</label>
                                                <input type="text" name="email"value="<?= $teacher_row['email']; ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Grade</label>
                                                <select class="form-control select" name="grade">
                                                    <option>Graduat</option>
                                                    <option>Licencie</option>
                                                    <option>Master</option>
                                                    <option>Doctorat</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Experiences years</label>
                                                <input class="form-control" type="number" value="<?= $teacher_row['experience']; ?>" name="experience">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Marital Status</label>
                                                <select class="form-control select" name="marital">
                                                    <option>Marier</option>
                                                    <option>Celibataire</option>
                                                    <option>Divorce</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Image </label>
                                                <input type="hidden" name="old_image" value="<?= $teacher_row['image']; ?>"/>
                                                <input type="file" name="image" id="image" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="status">Status</label>
                                            <input type="checkbox" name="status" <?= $teacher_row['status'] =='1'? 'checked':'' ?> width="70px" height="70px"/>
                                        </div>
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <button type="submit" name="update_teacher" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php                                    
                        }
                        else
                        {
                            ?>
                                <h4>No record Found</h4>
                            <?php
                        }
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?Php
include('includes/footer.php');
include('includes/scripts.php');
?>