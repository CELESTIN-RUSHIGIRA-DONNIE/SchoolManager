<?Php
include('includes/header.php');
?>

<div class="container-fluid px-4">

    <h4 class="mt-4">Promotion</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Promotion</a></li>
        <li class="breadcrumb-item active">View & Add Promotion</li>
    </ol>

    <div class="row" style="display: flex;justify-content:space-between">
        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"> Add Promotion
                    </h6>
                </div>
                <div class="card-body" id="department_table">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group ">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" name="designation" class="form-control" placeholder="Your mail adress">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" width="70px" height="70px" />
                            </div>
                            <div class="col-12">
                                <div class="student-submit">
                                    <button type="submit" name="save_promotion" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary"> Promotion view
                    </h6>
                </div>

                <div class="card-body" id="promotion_table">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="myTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = "SELECT * FROM promotion";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                                ?>

                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['designation']; ?></td>
                                    <td class="text-center">
                                        <a href="edit-promotion.php?id=<?=$row['id'];?>" class="btn btn-primary btn-sm "><i class="fas fa-fw fa-edit"></i></a>
                                    </td>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-danger btn-sm delete_promotion_btn" value="<?= $row['id']; ?>"><i class="fas fa-fw fa-trash"></i></button>
                                        
                                    </td>

                                </tr>
                                <?php

                                    }
                                } else {
                                ?>
                                <tr>
                                    <td colspan="6" class="text-center">Not Record found</td>
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
    </div>

</div>

<?Php
include('includes/footer.php');
include('includes/scripts.php');