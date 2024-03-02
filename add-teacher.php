<?Php
include('includes/header.php');
?>

<div class="content container-fluid">
    
    <h4 class="mt-4">Teacher</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="teacher.php">Teacher</a></li>
        <li class="breadcrumb-item">add teacher</li>
    </ol>


    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" name="fname" class="form-control" placeholder="Enter Name" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Last Name</label>
                                    <input type="text" name="lname" class="form-control" placeholder="Enter Name" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Gender</label>
                                    <select class="form-control select" name="gender" required>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms calendar-icon">
                                    <label>Mobile</label>
                                    <input class="form-control" name="number" type="text" placeholder="Your phone number" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Your mail adress" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Grade</label>
                                    <select class="form-control select" name="grade" required>
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
                                    <input class="form-control" type="number" name="experience" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Marital Status</label>
                                    <select class="form-control select" name="marital" required>
                                        <option>Marier</option>
                                        <option>Celibataire</option>
                                        <option>Divorce</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Image </label>
                                    <input class="form-control" type="file" name="image" id="image" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" width="70px" height="70px"/>
                            </div>
                            <div class="col-12">
                                <div class="student-submit">
                                    <button type="submit" name="save_teacher" class="btn btn-primary">Submit</button>
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