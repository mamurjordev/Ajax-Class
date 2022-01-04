<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Day Two</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="success-msg">

                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0 card-title d-flex justify-content-between align-items-center">Student Lists
                                <button type="button" class="btn btn-primary" id="add-student-btn">
                                    Create
                                </button>
                            </h4>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" id="search-text" placeholder="search text.....">
                            <input type="text" class="form-control" id="text" placeholder="search text.....">
                            <table class="table table-sm">
                                <thead>
                                    <th>SL</th>
                                    <th>Student Name</th>
                                    <th>Student Email</th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="table-rows">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            var myModal = new bootstrap.Modal(document.getElementById('student-modal-form'), {
                keyboard: false
            })

            $('#add-student-btn').on('click', function() {
                myModal.show()
            })

            $(document).on('submit', 'form#student-form', function(e) {
                e.preventDefault()
                let data = new FormData(this);
                $.ajax({
                    url: 'save.php',
                    type: 'POST',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(response) {
                        $('#msg').append(`<div class="alert alert-success alert-dismissible fade      show"role="alert"> <strong>Success! </strong> ${response} <button type ="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"> </button> </div>`);

                        $('form#student-form')[0].reset();
                        student_get()
                        myModal.hide();
                    }
                });
            })

            function student_get() {
                $.ajax({
                    url: 'student-all.php',
                    type: 'GET',
                    success: function(response) {
                        $('#table-rows').html(response)
                    }
                });
            }

            student_get()

            $(document).on('click', '#delete-student', function() {
                let delete_id = $(this).attr('student_id');
                if (confirm('Are you sure delete?')) {
                    $.ajax({
                        url: 'delete.php',
                        type: 'GET',
                        data: {
                            delete_id: delete_id
                        },
                        success: function(response) {
                            student_get()
                            $('#success-msg').append('<span class="d-block alert alert-success">' + response + '</span>')
                        }
                    });
                } else {
                    alert('your data saved?')
                }

            })

            $(document).on('click', 'button#edit-student', function() {
                let edit_id = $(this).attr('student_id');
                if (edit_id) {
                    $.ajax({
                        url: 'edit.php',
                        type: 'GET',
                        data: {
                            edit_id: edit_id
                        },
                        success: function(response) {
                            $('#edit-modal-show').html(response)
                            let editModal = new bootstrap.Modal(document.getElementById('edit-student-form'), {
                                keyboard: false
                            })
                            editModal.show()
                        }
                    });
                }

            })

            $(document).on('submit', 'form#update-student-form', function(e) {
                e.preventDefault();
                let data = new FormData(this);
                $.ajax({
                    url: 'update.php',
                    type: 'POST',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(response) {
                        document.getElementById('edit-student-form').style.display = 'none';
                        document.querySelector('.modal-backdrop').style.display = 'none';
                        $('#success-msg').append('<span class="d-block alert alert-success">' + response + '</span>')
                        student_get()
                    }
                });
            })

            $(document).on('keyup click', '#search-text', function() {
                $('#text').val(($(this).val()))
            })

        });
    </script>
</body>

</html>

<div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="student-modal-form">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 card-title d-flex justify-content-between">Add New
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                    </h4>
                </div>
                <div class="card-body">
                    <div id="msg"></div>
                    <form id="student-form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" placeholder="Name" class="form-control form-control-sm">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" placeholder="Email" class="form-control form-control-sm">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="edit-modal-show">

</div>