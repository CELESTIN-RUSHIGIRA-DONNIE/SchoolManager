<?Php
include('includes/header.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="text" name="email" class="form-control checking_email" placeholder="Enter Designation" required>
                    </div>
                    <div class="form-group">
                        <label>Number</label>
                        <input type="text" name="number" class="form-control" placeholder="Enter Description" required>
                    </div>
                    <div class="form-group local-forms">
                        <label>UserType</label>
                        <select class="form-control select" name="usertype">
                            <option>user</option>
                            <option>admin</option>
                            <option>superAdmin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Upload Image</label>
                        <input type="file" name="image" id="image" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="description" class="form-control" placeholder="Enter password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" name="description" class="form-control" placeholder="Enter Description" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
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

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>image</th>
                            <th>Password</th>
                            <th>UserType</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM register";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $row) {
                        ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><a href="view-student.php"><?= $row['name']; ?></a></td>
                                    <td><?= $row['designation']; ?></td>
                                    <td><?= $row['description']; ?></td>
                                    <td>-----</td>
                                    <td class="text-center">
                                        <form action="register-edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="">
                                            <button type="submit" name="edit_btn" class="btn btn-primary btn-sm "><i class="fas fa-fw fa-edit"></i></button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <form action="code.php" method="post">
                                            <input type="hidden" name="delete_id" value="">
                                            <button type="submit" name="delete_btn" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></button>
                                        </form>
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