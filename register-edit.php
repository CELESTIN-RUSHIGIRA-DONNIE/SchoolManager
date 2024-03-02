<?Php
include('includes/header.php');
?>

<div class="content container-fluid">
    
    <h4 class="mt-4">Teacher</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Edit</li>
        <li class="breadcrumb-item">Edit teacher</li>
    </ol>


    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Basic Details</span></h5>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Teacher ID <span class="login-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Teacher ID">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Name <span class="login-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Gender <span class="login-danger">*</span></label>
                                    <select class="form-control select">
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms calendar-icon">
                                    <label>Date Of Birth <span class="login-danger">*</span></label>
                                    <input class="form-control datetimepicker" type="text" placeholder="DD-MM-YYYY">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Mobile <span class="login-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Phone">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Joining Date <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 local-forms">
                                <div class="form-group">
                                    <label>Qualification <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Joining Date">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Experience <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Experience">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" width="70px" height="70px"/>
                            </div>
                            <div class="col-12">
                                <div class="student-submit">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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