<?Php
include('includes/header.php');
?>

<div class="container-fluid px-4">

    <h4 class="mt-4">Edit Promotion</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="promotion.php">Promotion</a></li>
        <li class="breadcrumb-item active">View & EDIT Promotion</li>
    </ol>

    <div class="row" style="display: flex;justify-content:space-between">
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
        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"> Add Promotion
                    </h6>
                </div>
                <div class="card-body" id="department_table">
                <?php 
                    if(isset($_GET['id']))
                    {
                        $promotion_id = $_GET['id'];
                        $promotion = "SELECT * FROM promotion WHERE id ='$promotion_id'";
                        $promotion_run = mysqli_query($con, $promotion);

                        if(mysqli_num_rows($promotion_run) > 0)
                        {
                            $promotion_row = mysqli_fetch_array($promotion_run)
                                    
                            ?>
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="promotion_id" value="<?= $promotion_row['id']; ?>">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group ">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" value="<?= $promotion_row['name']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" name="designation" class="form-control" value="<?= $promotion_row['designation']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="status">Status</label>
                                            <input type="checkbox" <?= $promotion_row['status'] =='1'? 'checked':'' ?> name="status" width="70px" height="70px" />
                                        </div>
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <button type="submit" name="update_promotion" class="btn btn-primary">Submit</button>
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