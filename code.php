<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['save_faculty']))
{

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $status = mysqli_real_escape_string($con, $_POST['status'] == true ? '1' : '0');

    $name_query = "SELECT * FROM faculty WHERE name='$name' OR designation='$designation'";
    $name_query_run = mysqli_query($con, $name_query);

    if(mysqli_num_rows($name_query_run) > 0)
    {
        $_SESSION['status'] = "this faculty is already exist";
        $_SESSION['status_code'] = "error";
        header('Location: faculty.php'); 
    }
    else
    {
        $query = "INSERT INTO faculty (name, designation, description, status) VALUES ('$name', '$designation', '$description','$status')";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            $_SESSION['status'] = "Faculty added";
            $_SESSION['status_code'] = "success";
            header('Location: faculty.php');
        }
        else
        {
            $_SESSION['status'] = "Faculty not added";
            $_SESSION['status_code'] = "error";
            header('Location: faculty.php');
        }
    }

}
if(isset($_POST['save_department']))
{
    $faculty_id = mysqli_real_escape_string($con, $_POST['faculty_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $status = mysqli_real_escape_string($con, $_POST['status'] == true ? '1' : '0');


        $query ="INSERT INTO department (faculty_id,name,designation,description,status) VALUES ('$faculty_id','$name','$designation','$description','$status')";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            $_SESSION['status'] = "Department added";
            $_SESSION['status_code'] = "success";
            header('Location: department.php');
        }
        else
        {
            $_SESSION['status'] = "department not added";
            $_SESSION['status_code'] = "error";
            header('Location: department.php');
        }

}
if(isset($_POST['save_promotion']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);
    $status = mysqli_real_escape_string($con, $_POST['status'] == true ? '1' : '0');

    $name_query = "SELECT * FROM promotion WHERE name='$name' OR designation='$designation'";
    $name_query_run = mysqli_query($con, $name_query);

    if(mysqli_num_rows($name_query_run) > 0)
    {
        $_SESSION['status'] = "this promotion is already exist";
        $_SESSION['status_code'] = "warning";
        header('Location: promotion.php'); 
    }
    else
    {
        $query = "INSERT INTO promotion (name, designation, status) VALUES ('$name', '$designation','$status')";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            $_SESSION['status'] = "promotion added";
            $_SESSION['status_code'] = "success";
            header('Location: promotion.php');
        }
        else
        {
            $_SESSION['status'] = "department not added";
            $_SESSION['status_code'] = "error";
            header('Location: promotion.php');
        }
    }

}
if (isset($_POST['save_teacher'])) 
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $grade = $_POST['grade'];
    $experience = $_POST['experience'];
    $marital = $_POST['marital'];
    $status = $_POST['status'] == true ? '1' : '0';
    $image = $_FILES['image']['name'];

    //La deuxieme methode de limiter les extension.....
    $img_types = array('image/jpg', 'image/png', 'image/jpeg');
    $validate_img_extension = in_array($_FILES["image"]['type'], $img_types);
    
    if($validate_img_extension)
    {
    //rename this image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . '.' . $image_extension;

        $query = "INSERT INTO teacher (fname,lname,gender,mobile,email,grade,experience,marital_status,status,image) 
        VALUES('$fname','$lname','$gender','$number','$email','$grade','$experience','$marital','$status','$filename')";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $filename);
            $_SESSION['status'] = "Added successfully";
            $_SESSION['status_code'] = "success";
            header('Location: teacher.php');
            exit(0);
        } 
        else 
        {
            $_SESSION['status'] = "Teacher not addes";
            $_SESSION['status_code'] = "warning";
            header('Location: teacher.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Only like, .png, .jpg or .Jpeg";
        $_SESSION['status_code'] = "error";
        header('Location: teacher.php');
    }
}
if (isset($_POST['save_student'])) 
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $nationality = $_POST['nationality'];
    $promotion_id = $_POST['promotion_id'];
    $department_id = $_POST['department_id'];
    $parent_name = $_POST['parent_name'];
    $parent_phone = $_POST['parent_phone'];
    $adress = $_POST['adress'];
    $status = $_POST['status'] == true ? '1' : '0';
    $image = $_FILES['image']['name'];

    //La deuxieme methode de limiter les extension.....
    $img_types = array('image/jpg', 'image/png', 'image/jpeg');
    $validate_img_extension = in_array($_FILES["image"]['type'], $img_types);
    
    if($validate_img_extension)
    {
    //rename this image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . '.' . $image_extension;

        $query = "INSERT INTO student (promotion_id,department_id,fname,lname,gender,mobile,email,nationality,parent_name,parent_phone,adress,status,image) 
        VALUES('$promotion_id','$department_id','$fname','$lname','$gender','$mobile','$email','$nationality','$parent_name','$parent_phone','$adress','$status','$filename')";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $filename);
            $_SESSION['status'] = "Added successfully";
            $_SESSION['status_code'] = "success";
            header('Location: student.php');
            exit(0);
        } 
        else 
        {
            $_SESSION['status'] = "student not added";
            $_SESSION['status_code'] = "warning";
            header('Location: student.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "Only like, .png, .jpg or .Jpeg";
        $_SESSION['status_code'] = "error";
        header('Location: student.php');
    }
}


if(isset($_POST['delete_teacher_btn']))
{
    $teacher_id = mysqli_real_escape_string($con, $_POST['teacher_id']);

    $category_query ="SELECT * FROM teacher WHERE id='$teacher_id'";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM teacher WHERE id='$teacher_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);
    
    if($delete_query_run)
    {
        if(file_exists("uploads/".$image))
        {
            unlink("uploads/".$image);
        }
        //redirect("category.php", "category deleted");
        echo 200;
    }
    else
    {
        //redirect("category.php", "Category not delete");
        echo 500;
    }
}
if(isset($_POST['delete_student_btn']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $category_query ="SELECT * FROM student WHERE id='$student_id'";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM student WHERE id='$student_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);
    
    if($delete_query_run)
    {
        if(file_exists("uploads/".$image))
        {
            unlink("uploads/".$image);
        }
        //redirect("category.php", "category deleted");
        echo 200;
    }
    else
    {
        //redirect("category.php", "Category not delete");
        echo 500;
    }
}
if(isset($_POST['delete_faculty_btn']))
{
    $faculty_id = mysqli_real_escape_string($con, $_POST['faculty_id']);

    $delete_query = "DELETE FROM faculty WHERE id='$faculty_id'";
    $delete_query_run = mysqli_query($con, $delete_query);
    
    if($delete_query_run)
    {
        echo 200;
    }
    else
    {
        echo 500;
    }
}
if(isset($_POST['delete_department_btn']))
{
    $department_id = mysqli_real_escape_string($con, $_POST['department_id']);

    $delete_query = "DELETE FROM department WHERE id='$department_id'";
    $delete_query_run = mysqli_query($con, $delete_query);
    
    if($delete_query_run)
    {
        echo 200;
    }
    else
    {
        echo 500;
    }
}
if(isset($_POST['delete_promotion_btn']))
{
    $promotion_id = mysqli_real_escape_string($con, $_POST['promotion_id']);

    $delete_query = "DELETE FROM promotion WHERE id='$promotion_id'";
    $delete_query_run = mysqli_query($con, $delete_query);
    
    if($delete_query_run)
    {
        echo 200;
    }
    else
    {
        echo 500;
    }
}


if (isset($_POST['update_teacher']))
{ 
    $teacher_id = $_POST['teacher_id'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $grade = $_POST['grade'];
    $experience = $_POST['experience'];
    $marital = $_POST['marital'];

    $old_filename = $_POST['old_image'];
    $image = $_FILES['image']['name'];

    $update_filename = "";
    if ($image != NULL) {
        //rename this image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . '.' . $image_extension;

        $update_filename = $filename;
    } else {
        $update_filename = $old_filename;
    }

    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE teacher SET fname='$fname', lname='$lname',gender='$gender',mobile='$number',email='$email', Grade='$grade', experience='$experience', marital_status='$marital', image='$update_filename', status='$status' WHERE id='$teacher_id' ";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        if ($image != NULL) {
            if (file_exists('uploads/' . $old_filename)) {
                unlink("uploads/" . $old_filename);
            }
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $update_filename);
        }
        $_SESSION['status'] = "Updated successfully";
        $_SESSION['status_code'] = "success";
        header('Location: teacher.php');
        exit(0);
    } else {
        $_SESSION['status'] = "something is wrong";
        $_SESSION['status_code'] = "error";
        header('Location: teacher.php');
        exit(0);
    }
}
if (isset($_POST['update_student']))
{ 
    $student_id = $_POST['student_id'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $nationality = $_POST['nationality'];
    $promotion_id = $_POST['promotion_id'];
    $department_id = $_POST['department_id'];
    $parent_name = $_POST['parent_name'];
    $parent_phone = $_POST['parent_phone'];
    $adress = $_POST['adress'];

    $old_filename = $_POST['old_image'];
    $image = $_FILES['image']['name'];

    $update_filename = "";
    if ($image != NULL) {
        //rename this image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . '.' . $image_extension;

        $update_filename = $filename;
    } else {
        $update_filename = $old_filename;
    }

    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE student SET fname='$fname', lname='$lname',gender='$gender',mobile='$mobile',email='$email', nationality='$nationality', promotion_id='$promotion_id', department_id='$department_id', parent_name='$parent_name', parent_phone='$parent_phone', adress='$adress', image='$update_filename', status='$status' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        if ($image != NULL) {
            if (file_exists('uploads/' . $old_filename)) {
                unlink("uploads/" . $old_filename);
            }
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $update_filename);
        }
        $_SESSION['status'] = "Updated successfully";
        $_SESSION['status_code'] = "success";
        header('Location: student.php');
        exit(0);
    } else {
        $_SESSION['status'] = "something is wrong";
        $_SESSION['status_code'] = "error";
        header('Location: student.php');
        exit(0);
    }
}
if (isset($_POST['update_promotion'])) 
{
    $promotion_id = $_POST['promotion_id'];

    $promotion_name = $_POST['name'];
    $promotion_designation= $_POST['designation'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE promotion SET name='$promotion_name',designation='$promotion_designation',status='$status' WHERE id='$promotion_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) 
    {
        $_SESSION['status'] = "Updated successfully";
        $_SESSION['status_code'] = "success";
        header('Location: promotion.php'); 
    } else 
    {
        $_SESSION['status'] = "something is wrong";
        $_SESSION['status_code'] = "error";
        header('Location: promotion.php'); 
    }
}
if (isset($_POST['update_faculty'])) 
{
    $faculty_id = $_POST['faculty_id'];

    $faculty_name = $_POST['name'];
    $faculty_designation= $_POST['designation'];
    $faculty_description= $_POST['description'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE faculty SET name='$faculty_name',designation='$faculty_designation',description='$faculty_description',status='$status' WHERE id='$faculty_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) 
    {
        $_SESSION['status'] = "Updated successfully";
        $_SESSION['status_code'] = "success";
        header('Location: faculty.php'); 
    } else 
    {
        $_SESSION['status'] = "something is wrong";
        $_SESSION['status_code'] = "error";
        header('Location: faculty.php'); 
    }
}
if (isset($_POST['update_department'])) 
{
    $department_id = $_POST['department_id'];

    $faculty_id = $_POST['faculty_id'];
    $department_name = $_POST['name'];
    $department_designation= $_POST['designation'];
    $department_description= $_POST['description'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE department SET faculty_id='$faculty_id',name='$department_name',designation='$department_designation',description='$department_description',status='$status' WHERE id='$department_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) 
    {
        $_SESSION['status'] = "Updated successfully";
        $_SESSION['status_code'] = "success";
        header('Location: department.php'); 
    } else 
    {
        $_SESSION['status'] = "something is wrong";
        $_SESSION['status_code'] = "error";
        header('Location: department.php'); 
    }
}

?>