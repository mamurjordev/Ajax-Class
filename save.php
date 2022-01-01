<?php

    include_once 'libs/database.php';

    $email = $_POST['email'];
    $name = $_POST['name'];

    $insert = "INSERT INTO students (fname,email) VALUES ('$name','$email')";
    $result = $conn->query($insert);
    if ($result) {
       echo 'Data has been saved.';
    }

?>