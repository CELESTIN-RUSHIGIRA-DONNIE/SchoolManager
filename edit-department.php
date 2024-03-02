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
                <?php 
                    if(isset($_GET['id']))
                    {
                        $department_id = $_GET['id'];
                        $department = "SELECT * FROM department WHERE id ='$department_id'";
                        $department_run = mysqli_query($con, $department);

                        if(mysqli_num_rows($department_run) > 0)
                        {
                            $department_row = mysqli_fetch_array($department_run)
                                    
                            ?>
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                <input class="form-control" name="department_id" type="hidden" value="<?=$department_row['id']; ?>">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group local-forms">
                                                <label>Promotion</label>
                                                <?php
                                                            $faculty = "SELECT * FROM faculty WHERE status='0' ";
                                                            $faculty_run = mysqli_query($con,$faculty);
                                                            if(mysqli_num_rows($faculty_run) > 0)
                                                            {
                                                                ?>
                                                                <select name="faculty_id" required class="form-control">
                                                                    <option value="">--Select faculty--</option>
                                                                    <?php
                                                                        foreach($faculty_run as $facultyItem)
                                                                        {
                                                                        ?>
                                                                            <option value="<?= $facultyItem['id'] ?>"<?= $facultyItem['id'] == $department_row['faculty_id']? 'selected':'' ?>>
                                                                                <?= $facultyItem['name'] ?>
                                                                            </option>
                                                                        <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                    <h5>No category availlable</h5>
                                                                <?php
                                                            }
                                                        ?>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 local-forms">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control" name="name" type="text" value="<?=$department_row['name']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 local-forms">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input class="form-control" name="designation" type="text" value="<?=$department_row['designation']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 local-forms">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" type="text"><?=$department_row['description']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="status">Status</label>
                                            <input type="checkbox" name="status" <?= $department_row['status'] =='1'? 'checked':'' ?> width="70px" height="70px"/>
                                        </div>
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <button type="submit" name="update_department" class="btn btn-primary">Submit</button>
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