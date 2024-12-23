<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Ajax CRUD</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body>

    <!--View Student Modal-->
    <div class="modal fade" id="ViewStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Student Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="id_view"></h4>
                    <h4 class="fname_view"></h4>
                    <h4 class="lname_view"></h4>
                    <h4 class="class_view"></h4>
                    <h4 class="section_view"></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Add Student Modal-->
    <div class="modal fade" id="Add_Student_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="error-message">

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="fname">First Name:</label>
                            <input type="text" id="fname" name="fname" class="form-control fname">
                        </div>
                        <div class="col-sm-6">
                            <label for="lname">Last Name:</label>
                            <input type="text" class="form-control lname">
                        </div>
                        <div class="col-sm-6">
                            <label for="class">Class</label>
                            <input type="text" id="class" name="class" class="form-control class">
                        </div>
                        <div class="col-sm-6">
                            <label for="section">Section</label>
                            <input type="text" id="section" name="section" class="form-control section">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary student_add_ajax">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!--Edit Student Modal-->
    <div class="modal fade" id="Edit_Student_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Student Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="" id="edit_id">
                        <div class="col-sm-12">
                            <div class="error-message">

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="fname">First Name:</label>
                            <input type="text" id="edit_fname" name="fname" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="lname">Last Name:</label>
                            <input type="text" id="edit_lname" class="form-control ">
                        </div>
                        <div class="col-sm-6">
                            <label for="class">Class</label>
                            <input type="text" id="edit_class" name="class" class="form-control ">
                        </div>
                        <div class="col-sm-6">
                            <label for="section">Section</label>
                            <input type="text" id="edit_section" name="section" class="form-control section">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary student_update_ajax">Update</button>
                </div>
            </div>
        </div>
    </div>
    <!--Table-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mx-auto">CRUD Application AJAX</h4>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add_Student_Modal">
                            <i class="fas fa-plus"></i> Add Student
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="message">

                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="studentdata">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS Bundle -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            getData();

            $(document).on("click", ".viewbtn", function() {
                var stu_id = $(this).closest('tr').find('.stu_id').text().trim();
                $.ajax({
                    type: "POST",
                    url: "ajax-crud/codes.php",
                    data: {
                        'checking_view': true,
                        'stu_id': stu_id,
                    },
                    success: function(response) {
                        $.each(response, function(key, studview) {

                            $('.id_view').text(studview['id']);
                            $('.fname_view').text(studview['fname']);
                            $('.lname_view').text(studview['lname']);
                            $('.class_view').text(studview['class']);
                            $('.section_view').text(studview['section']);
                        });
                        $('#ViewStudentModal').modal('show');
                    }
                });
            });


            $(document).on("click", ".editbtn", function() {
                var stu_id = $(this).closest('tr').find('.stu_id').text().trim();
                $.ajax({
                    type: "POST",
                    url: "ajax-crud/codes.php",
                    data: {
                        'checking_edit': true,
                        'stu_id': stu_id,
                    },
                    success: function(response) {
                        $.each(response, function(key, studedit) {
                            $('#edit_id').val(studedit['id']);
                            $('#edit_fname').val(studedit['fname']);
                            $('#edit_lname').val(studedit['lname']);
                            $('#edit_class').val(studedit['class']);
                            $('#edit_section').val(studedit['section']);
                        });
                        $('#Edit_Student_Modal').modal('show');
                    }
                });
            });

            // $(document).on("click", ".deletebtn", function() {
            //     var stu_id = $(this).closest('tr').find('.stu_id').text().trim();
            //     console.log(stu_id); // Check if stu_id is being retrieved correctly
            //     $.ajax({
            //         type: "POST",
            //         url: "ajax-crud/codes.php",
            //         data: {
            //             'checking_delete': true,
            //             'stu_id': stu_id,
            //         },
            //         success: function(response) {
            //             $('#Add_Student_Modal').modal('hide');
            //             $('.message').append(`
            //                 <div class="alert alert-success alert-dismissible fade show" role="alert">
            //                     <strong>Success!</strong> Student Deleted successfully.
            //                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //                 </div>
            //             `);
            //             $('.studentdata').html("");
            //             getData();
            //         }
            //     });
            // });


            $(document).on("click", ".deletebtn", function () {
    var stu_id = $(this).closest('tr').find('.stu_id').text().trim(); // Get the student ID
    
    // Trigger SweetAlert
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, make the AJAX call
            $.ajax({
                type: "POST",
                url: "ajax-crud/codes.php",
                data: {
                    'checking_delete': true,
                    'stu_id': stu_id,
                },
                success: function (response) {
                    // Display success message
                    Swal.fire({
                        title: "Deleted!",
                        text: response, // Response from PHP
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        // Optional: Reload the page or remove the row from the table
                        location.reload();
                    });
                },
                error: function (xhr, status, error) {
                    // Display error message
                    Swal.fire({
                        title: "Error!",
                        text: "Failed to delete the record.",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            });
        }
    });
});




            $('.student_add_ajax').click(function(e) {
                e.preventDefault();

                var fname = $('.fname').val();
                var lname = $('.lname').val();
                var stu_class = $('.class').val();
                var section = $('.section').val();

                if (fname != '' && lname != '' && stu_class != '' && section != '') {
                    $.ajax({
                        type: "POST",
                        url: "ajax-crud/codes.php",
                        data: {
                            'checking_add': true,
                            'fname': fname,
                            'lname': lname,
                            'class': stu_class,
                            'section': section,
                        },
                        success: function(response) {
                            $('#Add_Student_Modal').modal('hide');
                            $('.message').append(`
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Student added successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);
                            $('.studentdata').html("");
                            getData();
                            $('.fname').val("");
                            $('.lname').val("");
                            $('.class').val("");
                            $('.section').val("");
                        }
                    });
                } else {
                    $('.error-message').append('\
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                            <strong>Hey!</strong>Enter all the fields.\
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                        </div>\
                    ');
                }
            });

            $('.student_update_ajax').click(function(e) {
                e.preventDefault();

                var fname = $('#edit_fname').val();
                var lname = $('#edit_lname').val();
                var stu_class = $('#edit_class').val();
                var section = $('#edit_section').val();
                var stud_id = $('#edit_id').val();
                if (fname != '' && lname != '' && stu_class != '' && section != '') {
                    $.ajax({
                        type: "POST",
                        url: "ajax-crud/codes.php",
                        data: {
                            'checking_update': true,
                            'stu_id': stud_id,
                            'fname': fname,
                            'lname': lname,
                            'class': stu_class,
                            'section': section,
                        },
                        success: function(response) {
                            $('#Edit_Student_Modal').modal('hide');
                            $('.message').html('');
                            $('.message').append(`
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Student detail updated successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);
                            $('.studentdata').html("");
                            getData();

                            $('#edit_id').val("");
                            $('#edit_fname').val("");
                            $('#edit_lname').val("");
                            $('#edit_class').val("");
                            $('#edit_section').val("");
                        }
                    });
                } else {
                    $('.error-message').html('');
                    $('.error-message').append('\
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                            <strong>Hey!</strong>Enter all the fields.\
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                        </div>\
                    ');
                }
            });

        });

        function getData() {
            $.ajax({
                type: "GET",
                url: "ajax-crud/fetch.php",
                success: function(response) {
                    $.each(response, function(key, value) {
                        $('.studentdata').append(
                            '<tr>' +
                            '<td class="stu_id">' + value['id'] + '</td>' +
                            '<td>' + value['fname'] + '</td>' +
                            '<td>' + value['lname'] + '</td>' +
                            '<td>' + value['class'] + '</td>' +
                            '<td>' + value['section'] + '</td>\
                        <td>\
                            <button type="button" class="btn btn-info viewbtn">\
                                <i class="fas fa-eye"></i> \
                            </button>\
                            <button type="button" class="btn btn-warning editbtn">\
                                <i class="fas fa-edit"></i>\
                            </button>\
                            <button type="button" class="btn btn-danger deletebtn">\
                                    <i class="fas fa-trash-alt"></i>\
                            </button>\
                        </td>\
                    </tr>'
                        )
                    });
                }
            });
        }
    </script>
</body>

</html>