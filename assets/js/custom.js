$(document).ready(function(){
    $('.delete_teacher_btn').click(function(e){
        e.preventDefault();   
        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure?",
            text: "You need to delete really !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'teacher_id':id,
                        'delete_teacher_btn':true
                    },
                    success: function(response){
                        if(response == 200)
                        {
                            swal("Success", "Teacher deleted Successfully", "success");
                            $("#teacher_table").load(location.href + " #teacher_table");
                        }
                        else if(response == 500)
                        {
                            swal("error", "produit not deleted", "error");
                        }
                    }
                });
            }
          });
    });
    $('.delete_student_btn').click(function(e){
        e.preventDefault();   
        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure?",
            text: "You need to delete really !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'student_id':id,
                        'delete_student_btn':true
                    },
                    success: function(response){
                        if(response == 200)
                        {
                            swal("Success", "student deleted Successfully", "success");
                            $("#student_table").load(location.href + " #student_table");
                        }
                        else if(response == 500)
                        {
                            swal("error", "student not deleted", "error");
                        }
                    }
                });
            }
          });
    });
    $('.delete_faculty_btn').click(function(e){
        e.preventDefault();   
        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure?",
            text: "You need to delete really !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'faculty_id':id,
                        'delete_faculty_btn':true
                    },
                    success: function(response){
                        if(response == 200)
                        {
                            swal("Success", "faculty deleted Successfully", "success");
                            $("#faculty_table").load(location.href + " #faculty_table");
                        }
                        else if(response == 500)
                        {
                            swal("error", "faculty not deleted", "error");
                        }
                    }
                });
            }
          });
    });
    $('.delete_department_btn').click(function(e){
        e.preventDefault();   
        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure?",
            text: "You need to delete really !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'department_id':id,
                        'delete_department_btn':true
                    },
                    success: function(response){
                        if(response == 200)
                        {
                            swal("Success", "department deleted Successfully", "success");
                            $("#department_table").load(location.href + " #department_table");
                        }
                        else if(response == 500)
                        {
                            swal("error", "department not deleted", "error");
                        }
                    }
                });
            }
          });
    });
    $('.delete_promotion_btn').click(function(e){
        e.preventDefault();   
        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure?",
            text: "You need to delete really !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'promotion_id':id,
                        'delete_promotion_btn':true
                    },
                    success: function(response){
                        if(response == 200)
                        {
                            swal("Success", "promotion deleted Successfully", "success");
                            $("#promotion_table").load(location.href + " #promotion_table");
                        }
                        else if(response == 500)
                        {
                            swal("error", "promotion not deleted", "error");
                        }
                    }
                });
            }
          });
    });
})