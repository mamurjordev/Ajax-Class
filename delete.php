<?php

include_once 'libs/database.php';

if(isset($_GET['delete_id'])){
    $deleteId = $_GET['delete_id'];

    $delete = "DELETE FROM students WHERE id='$deleteId'";
    $result = $conn->query($delete);
    if ($result) {
        echo 'Delete has been success.';
    }
}




?>