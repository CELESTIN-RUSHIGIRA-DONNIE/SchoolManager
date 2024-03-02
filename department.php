<?Php
include('includes/header.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Faculty</label>
                        <?php
                        $fac = "SELECT * FROM faculty WHERE status='0' ";
                        $fac_run = mysqli_query($con, $fac);

                        if (mysqli_num_rows($fac_run) > 0) {
                        ?>
                            <select name="faculty_id" required class="form-control">
                                <option value="">--Select Faculty--</option>
                                <?php
                                foreach ($fac_run as $facitem) {
                                ?>
                                    <option value="<?= $facitem['id'] ?>"><?= $facitem['name'] ?></option>
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

                    <div class="form-group">
                        <label>Department name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="designation" class="form-control checking_email" placeholder="Enter Designation" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" name="description" class="form-control" placeholder="Enter Description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" width="70px" height="70px">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save_department" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container-fluid px-4">
    <h4 class="mt-4">Register </h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Register</li>
        <li class="breadcrumb-item">add user</li>
    </ol>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary"> Admin profile
                <button type="button" class="btn btn-primary float-end btn-sm" data-toggle="modal" data-target="#addadminprofile">
                    <i class="fas fa-fw fa-plus"></i>
                </button>
            </h6>
        </div>

        <div class="card-body" id="department_table">

            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>faculty</th>
                            <th>name</th>
                            <th>designation</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM ListDepartment ";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $row) {
                        ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['faculty_name']; ?></td>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['designation']; ?></td>
                                    <td class="text-center">
                                            <a href="edit-department.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm "><i class="fas fa-fw fa-edit"></i></button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-danger btn-sm delete_department_btn" value="<?= $row['id']; ?>"><i class="fas fa-fw fa-trash"></i></button>
                                    </td>

                                </tr>
                            <?php

                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6">Not Record found</td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>



<?Php
include('includes/footer.php');
include('includes/scripts.php');
?>