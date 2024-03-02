<?Php
include('includes/header.php');
?>


<div class="container-fluid px-4">
    <h4 class="mt-4">Teacher</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Teacher</a></li>
        <li class="breadcrumb-item active">View Teacher</li>
    </ol>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary"> Admin profile
                <a href="add-teacher.php" class="btn btn-primary float-end btn-sm">
                    <i class="fas fa-fw fa-plus"></i>
                </a>
            </h6>
        </div>

        <div class="card-body" id="teacher_table">

            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Gender</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM teacher";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $row) {
                        ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td class="text-center">
                                        <img class="img-profile rounded-circle" src="uploads/<?= $row['image']; ?>" width="50px" height="50px" alt="<?= $row['fname']; ?>">
                                    </td>
                                    <td><?= $row['fname'] ?></td>
                                    <td><?= $row['mobile'] ?></td>
                                    <td><?= $row['gender'] ?></td>
                                    <td class="text-center">
                                        <a href="edit-teacher.php?id=<?=$row['id'];?>" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                                    </td>
                                    <td class="text-center">   
                                        <button type="submit" class="btn btn-danger btn-sm delete_teacher_btn" value="<?= $row['id']; ?>"><i class="fas fa-fw fa-trash"></i></button>
                                    </td>

                                </tr>
                            <?php

                            }
                        } else {
                            ?>
                            <tr class="bg-primary">
                                <td colspan="7" class="text-center text-white">Not Record found</td>
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