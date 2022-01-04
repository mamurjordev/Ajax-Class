<?php
    include_once 'libs/database.php';



    if (isset($_GET['edit_id'])) {

        $output = '';
        $editId = $_GET['edit_id'];

        $edit = "SELECT * FROM students WHERE id='$editId'";
        $result = $conn->query($edit);

        while($row = $result->fetch_assoc()){

            $output .= '
            <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="edit-student-form">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0 card-title d-flex justify-content-between">Edit
                                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div id="msg"></div>
                                <form id="update-student-form">
                                    <input type="hidden" name="update_id" value="'.$row['id'].'">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" value="'.$row['fname'].'" placeholder="Name" class="form-control form-control-sm">
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email" value="'.$row['email'].'" placeholder="Email" class="form-control form-control-sm">
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" name="update" class="btn btn-sm btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

        }

        echo $output;

        $conn->close();
    }

?>