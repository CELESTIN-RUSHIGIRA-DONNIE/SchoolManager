<?Php
include('includes/header.php');
?>

<?php
    if (isset($_GET['id'])) {
        $student_id = $_GET['id'];
        $query = "SELECT * FROM student WHERE id='$student_id'";
        $query_run = mysqli_query($con, $query);
        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $row) 
            {
            ?>
                <div class="container-fluid px-4">
                    <h4 class="mt-4">Student</h4>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="student.php">View Student</a></li>
                        <li class="breadcrumb-item active"><?= $row['fname'] . ' ' . $row['lname'] ?></li>
                    </ol>
                    
                    <div class="row" style="display: flex;justify-content:space-between">
                        <div class="col-sm-5">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-center"><?= $row['fname'] . ' ' . $row['lname'] ?>
                                    </h6>
                                </div>
                                <div class="card-body text-center">
                                    <img src="uploads/<?= $row['image']; ?>" width="250px" height="250px" alt="<?= $row['fname']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card">
                                <P>Promotion : <?= $row['promotion_id'] ?></P>
                                <P>Parent Name : <?= $row['parent_name'] ?></P>
                                <P>Parent Phone : <?= $row['parent_phone'] ?></P>
                                <P>Adresse mail : <?= $row['email'] ?></P>
                                <P>NAtionality : <?= $row['nationality'] ?></P>
                                <P>adresse : <?= $row['adress'] ?></P>
                                <P>Phone number : <?= $row['mobile'] ?></P>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    
                </div>
            <?php
            }
        }
    }
?>



<?Php
include('includes/footer.php');
include('includes/scripts.php');
?>