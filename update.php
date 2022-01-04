<?php
include_once 'libs/database.php';


        $update_id = $_POST['update_id'];
        $email = $_POST['email'];
        $name = $_POST['name'];

        $update = "UPDATE students SET fname='$name', email='$email' WHERE id='$update_id'";
        $result = $conn->query($update);

        if ($result) {
            echo 'Data update has been success.';
        }



?>